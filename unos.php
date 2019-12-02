<?php
include "baza.php";


if(isset($_POST["dodaj_proizvod"]) || isset($_POST["izmeni_proizvod"])) {

        if(!isset($_POST['naziv']) || trim($_POST['naziv']) == '')
            die("Niste upisali naziv_proizvoda!");

        $target_dir = "slike/";
        $target_file = $target_dir . basename($_FILES["slika"]["name"]);
        if(isset($_POST["dodaj_proizvod"])){
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["slika"]["tmp_name"]);
            if($check == false) {
                die( "File nije slika" );
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
            if (!move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file))
                die("Sorry, there was an error uploading your file.");  
        }

        $p1 = $_POST['naziv'] ?? '';
        $p2 = $_POST['tip'] ?? '';
        $p3 = basename($_FILES["slika"]["name"]) ?? '';
        $p4 = $_POST['cena'];
        $p5 = $_POST['opis'] ?? '';
        $p6 = $_POST['dostupnost'] ?? '';
        $p7 = $_POST['alergeni'] ?? '';
        $p8 = $_POST['porcije'] ?? '';
        $p9 = $_POST['sadrzi'] ?? '';
        
        if(isset($_POST["dodaj_proizvod"])){
            $uspeo = $db->nov_proizvod($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9);
            if($uspeo === false){
                die("Pogresan query: ");
            }
        }
        if(isset($_POST["izmeni_proizvod"])){
            $id = $_POST['id'] ?? '';
            $rez = $db->izmeni_proizvod($id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9);
            if($rez === true) echo 'izmenili ste proizvod';
            else{ 
                echo "niste izmenili proizvod ";
                print_r($db->dajGresku());
                exit;
            }
        }
        header("Location: admin_proizvodi.php");
}


if(isset($_GET["obrisi"])) {
    $id = $_GET['obrisi'] ?? '';
    if($id =='') die('NEma id');
    $rez = $db->obrisi_proizvod($id);
    if($rez === true) echo "obrisan";
    else echo "nije obrisan";
}

if(isset($_GET["daj_1"])) {
    $id = $_GET['daj_1'] ?? '';
    if($id =='') die(json_encode(['Nema id']));
    $rez = $db->jedan_proizvod($id);
    echo json_encode($rez);
    //else echo json_encode(["nema proizvoda"]);
}

if(isset($_GET["obrisi_oblik"])) {
    $id = $_GET['obrisi_oblik'] ?? '';
    if($id =='') die('Nema id');
    $rez = $db->obrisi_oblik($id);
    if($rez === true) echo "obrisan";
    else echo "nije obrisan";
}

if(isset($_POST["dodaj_oblik"])) {

    if(!isset($_POST['oblik']) || trim($_POST['oblik']) == '')
        die("Niste upisali oblik proizvoda!");

    $p1 = $_POST['idp'];
    $p2 = $_POST['oblik'];
    $p3 = $_POST['cena'];
   $uspeo = $db->nov_oblik($p1, $p2, $p3);
    if($uspeo === false){
            die("Pogresan query: ");
    }
    header("Location: admin_oblici.php?id=$p1");
}



?>   