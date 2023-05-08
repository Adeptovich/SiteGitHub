<?php
session_start();
require_once 'connectDB.php';
global $connect;

$email = $password = NULL;
$salt = '!#%&(@$^';
$arrErr = [];
$arrErr['email'] = $arrErr['password'] = '';

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
            $email = $email_pre;
        }else{
            $arrErr['email'] = 'Некорректный Email!';
        }
    }else{
        $arrErr['email'] = 'Введите Email!';
    }

    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $arrErr['password'] = "Введите пароль!";
    }

    if(isset($email,$password)){

        $user = DB_find_user($connect, $email);
        if(!empty($user)){
            $hash = $user['password'];

            $password = md5($salt . $password);
            if($password == $hash){
                $_SESSION['login_success'] = 'Вы успешно авторизовались';
                $_SESSION['user'] = $user['login'];
                header('Location: mainpage.php');
            }else{
                $arrErr['password'] = "Пароль неверный!";
            }
        }else{
            $arrErr['email'] = 'Такого пользователя не существует!';
        }
    }
}