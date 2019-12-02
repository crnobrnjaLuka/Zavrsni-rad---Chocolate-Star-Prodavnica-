<?php

include_once "baza.php";


if(!(isset($_SESSION["korpa"]))) $_SESSION["korpa"] = [];

$tip = $_GET["tip"] ?? "";

if($tip == "dodaj"){
    $nasao = false;
    foreach ( $_SESSION["korpa"] as $i=>$stavka){
        if($stavka["id"] == $_GET["id"] && $stavka['oblik']== $_GET['oblik']){   
            $nasao = true;
            $dod  = $i;
            // $stavka['kol'] += $_GET['kol'];
        } 
    }
    if($nasao == false){
        array_push($_SESSION["korpa"], ["id"=>$_GET["id"], "kol"=>$_GET["kol"], "oblik"=>$_GET["oblik"] ]);
        echo "dodao novi";
    }else{
        $_SESSION["korpa"][$dod]['kol'] += $_GET['kol'];
        echo "dodao na stari";
    }
}
if($tip == "zameni"){
    $nasao = false;
    foreach ( $_SESSION["korpa"] as $i=>$stavka){
        if($stavka["id"] == $_GET["id"] && $stavka['oblik']== $_GET['oblik']){   
            $nasao = true;
            $dod  = $i;
        } 
    }
    if($nasao == true){
        $_SESSION["korpa"][$dod]['kol'] = $_GET['kol'];
    }
}
if($tip == "obrisi"){
    if(!empty($_SESSION["korpa"])) {
        foreach($_SESSION["korpa"] as $k => $v) {
            if($_GET["id"] == $v["id"] && $_GET["oblik"] == $v["oblik"]){
                unset($_SESSION["korpa"][$k]);				
                echo "obrisano";
            }
        }
    }
}

function broj_proizvoda(){
    if(!isset($_SESSION["korpa"])) return 0;
    $kol = 0;
    foreach ( $_SESSION["korpa"] as $stavka)    $kol += $stavka['kol'];
    return $kol;
}

?>