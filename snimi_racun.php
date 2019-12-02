<?php

include "baza.php";



if(isset($_GET['isporuceno'])){
    $rez = $db->isporuceno($_GET['isporuceno']);
    if($rez === true) echo "isporuceno";
    else echo "nije isporuceno";
}else{
    $podaci = json_decode(file_get_contents("php://input"));
    $podaci->datum_isporuke = new DateTime($podaci->datum_isporuke);
    $r = $db->snimi_racun($podaci);
    echo $r;
}
?>
