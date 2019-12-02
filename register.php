<?php
include "baza.php";

$name = $_POST['user'];
$pass = $_POST['password'];

$result = $db->proveri_usera($name, $pass);


if(count($result) == 1){
    echo "username alredy taken";
}else{
    $db->upisi_usera($name,$pass);
    echo "Registration successful";
}
 