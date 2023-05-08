<?php

$servername = 'localhost';
$database = 'mainbase';
$username = 'root';
$password = '';


$connect = mysqli_connect($servername, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT img_path, number1, id_building,  equipment, capacity 
        FROM firstbase 
        INNER JOIN s_base ON firstbase.id_building=s_base.id"; // Стандартный SQL запрос


function addFilter($where, $add){
    if($where){
        $where .= " AND $add";
    } else{
        $where = $add;
    }
    return $where;
}

if(isset($_GET['applyFilter'])){
    if(count($_GET) > 0){
        $sql .= " WHERE ";
        $where = "";
        if ($_GET['number1']) {
            $value = htmlspecialchars('%'.$_GET['number1'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "number1 LIKE ".$value);

        }
        if ($_GET['id_building']) {
            $value = htmlspecialchars('%'.$_GET['id_building'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "id_building LIKE ".$value);
        }
        if ($_GET['equipment']) {
            $value = htmlspecialchars('%'.$_GET['equipment'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "equipment LIKE ".$value);
        }
        if ($_GET['capacity']) {
            $value = htmlspecialchars('%'.$_GET['capacity'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "capacity LIKE ".$value);
        }
        
        $sql .= $where;


    }
}else{
    $_GET['number1'] = "";
    $_GET['id_building'] = "";
    $_GET['equipment'] = "";
    $_GET['capacity'] = "";
    

}

$sqlPrepare = mysqli_prepare($connect, $sql); // подготавливаем SQL запрос (защита от инъекций)
mysqli_stmt_execute($sqlPrepare); // выполняем запрос return TRUE or FALSE
$result = mysqli_stmt_get_result($sqlPrepare); // получаем результат запроса
$fullList = mysqli_fetch_all($result,MYSQLI_ASSOC); // помещаем строки в массив