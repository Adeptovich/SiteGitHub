<?php
session_start();
require_once 'connectDB.php';
global $connect;

$email = $full_name = $blood_type = $factor = $vk = $password = NULL;
$salt = '!#%&(@$^';
$arrErr = [];
$arrErr['email'] = $arrErr['full_name'] = $arrErr['password'] = '';

$regular_full_name = "/^(([А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)|([A-Z][a-z]+\s[A-Z][a-z]+\s[A-Z][a-z]+))$/u";
$regular_password = '/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!"№;%:?*()@\#$^&])(?=.*\ )(?=.*\-)(?=.*\_).{6,})/';  // Xy12 -_+@   валидный   Yx21 _-+@


function DB_find_user($connect, $email){
    $query = "SELECT * FROM `users` WHERE `login` LIKE ?";

    $queryPrep = mysqli_prepare($connect, $query); // подготавливаем SQL запрос (защита от инъекций)
    mysqli_stmt_bind_param($queryPrep, 's', $email); // привязка переменных к парметрам
    mysqli_stmt_execute($queryPrep); // выполняем запрос return TRUE or FALSE
    $result = mysqli_stmt_get_result($queryPrep); // получаем результат запроса
    $user = mysqli_fetch_assoc($result); // помещаем строки в массив
    return $user;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['email'])){
        $email_pre = $_POST['email'];
        if(filter_var($email_pre, FILTER_VALIDATE_EMAIL)){
            $user = DB_find_user($connect, $email_pre);
            if(empty($user)){
                $email = $email_pre;
            }else{
                $arrErr['email'] = 'Пользователь с таким логином существует в Базе Данных!';
            }
        }else{
            $arrErr['email'] = 'Некорректный Email!';
        }
    }else{
        $arrErr['email'] = 'Введите Email!';
    }

    if(!empty($_POST['full_name'])){
        if(preg_match($regular_full_name, $_POST['full_name'])){
            $full_name = $_POST['full_name'];
        }else{
            $arrErr['full_name'] = 'Некорректные ФИО!';
        }
    }else{
        $arrErr['full_name'] = 'Введите ФИО!';
    }

    if(!empty($_POST['password'])){
        if(preg_match($regular_password, $_POST['password'])){
            if($_POST['password'] == $_POST['password_confirm']){
                $password = $_POST['password'];
                $password = md5($salt . $password);
            }else{
                $arrErr['password_confirm'] = "Пароли не совпадают!";
            }
        }else{
            $arrErr['password'] = "Некорректный пароль!<br>Пароль должен содержать от 6 символов:</br>Большие латинские буквы, маленькие;
                                   <br>Спецсимволы, пробел, дефис, подчеркивание и цифры</br>";
        }
    }else{
        $arrErr['password'] = "Введите пароль!";
    }

    if(!empty($_POST['blood_type'])){
        $blood_type = $_POST['blood_type'];
    }else{
        $arrErr['blood_type'] = 'Укажите группу крови!';
    }

    if(!empty($_POST['factor'])){
        $factor = $_POST['factor'];
    }else{
        $arrErr['factor'] = 'Укажите резус-фактор!';
    }

    
    $vk = $_POST['vk'];

    if(isset($email, $full_name, $password, $blood_type, $factor)){
        echo "Данные присутсвуют";
        $insert = "INSERT INTO `users` 
                    (`id`, `login`, `blood_type`, `factor`, `vk`, `password`) 
                    VALUES (NULL, ?, ?, ?, ?, ?)";
        
        $queryPrep = mysqli_prepare($connect, $insert); // подготавливаем SQL запрос (защита от инъекций)
        mysqli_stmt_bind_param($queryPrep, 'sisss',$email, $blood_type, $factor, $vk, $password ); // привязка переменных к парметрам
        mysqli_stmt_execute($queryPrep); // выполняем запрос return TRUE or FALSE

        $_SESSION['reg_success'] = 'Регистрация прошла успешно';
        header('Location: mainpage.php');
    }

}
