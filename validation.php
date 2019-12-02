<?php
include "baza.php";

$name = $_POST['user'];
$pass = $_POST['password'];

$result = $db->proveri_usera($name, $pass);


if(count($result) == 1){
    $_SESSION['username'] = $name;
    $_SESSION['user_role'] = $result[0]['rola'];
    if($result[0]['rola'] ==1)
    header('location:admin_proizvodi.php');
    else
    header('location:index.html');
}else{
    header('location:login.php');
}

 