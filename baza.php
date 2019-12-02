<?php
    session_start();

    class Baza{
        private $pdo;
        function __construct(){
            $host = 'localhost';  $db = 'chocolate_star';
            $user = 'root';   $pass = '';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            try{
                $this->pdo = new PDO($dsn,$user,$pass,$options);
                //echo "Konektovan!";
            }catch(PDOException $e){
                echo "JOK: ".$e->getMessage();
            }
        }
        function selectQuery($sql, $tip = PDO::FETCH_ASSOC){
            $podaci = $this->pdo->query($sql);
            if($podaci === FALSE)
                die("LOŠ SQL!");
            return $podaci->fetchAll($tip);
        }
        function selectPrepare($sql, $niz_vr, $tip = true){
            $stmt=$this->pdo->prepare($sql);
            $rez = $stmt->execute($niz_vr);
            if($tip == true){
                $niz=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $niz;
            }else{
                return $rez;
            }
        }
        function torte(){
            return $this->selectQuery("SELECT * FROM proizvodi WHERE tip = 'torte'");
        }
        function kolaci(){
            return $this->selectQuery("SELECT * FROM proizvodi WHERE tip = 'kolaci'");
        }
        function jedan_proizvod($id){
            return $this->selectQuery("SELECT * FROM proizvodi WHERE id = $id ")[0];
        }
        function naziv_proizvoda($naz,$id){
            return $this->selectQuery("SELECT naziv_proizvoda FROM proizvodi WHERE id = $id AND naziv_proizvoda = $naz");
        }
        function cene($id){
            return $this->selectQuery("SELECT * FROM cenovnik WHERE id_proizvoda = $id");
        }
        function cena($idp, $oblik){
            //echo "SELECT cena FROM cenovnik WHERE id_proizvoda = $idp AND oblik = '$oblik' ";
            return $this->selectQuery("SELECT cena FROM cenovnik WHERE id_proizvoda = $idp AND oblik = '$oblik' ");
    
        }

        function proizvodi(){
            return $this->selectQuery("SELECT * FROM proizvodi");
        }
        function nov_proizvod($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){
            $sql = "INSERT INTO proizvodi(naziv_proizvoda, tip, slika, cena, opis, dostupnost, alergeni, porcije, sadrzi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            return $this->selectPrepare($sql, [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9], false);
        }
        function obrisi_proizvod($id){
            $sql = "DELETE FROM proizvodi WHERE id=?";
            return $this->selectPrepare($sql, [$id], false);
        }
        function izmeni_proizvod($id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){
            $sql = "UPDATE proizvodi SET naziv_proizvoda=?, tip=?, cena=?, opis=?, dostupnost=?, alergeni=?, porcije=?, sadrzi=?, slika=? WHERE id=?";
            return $this->selectPrepare($sql, [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $id], false);
        }
        function nov_oblik($p1, $p2, $p3){
            $sql = "INSERT INTO cenovnik(`id_proizvoda`, `oblik`, `cena`) VALUES (?, ?, ?)";
            return $this->selectPrepare($sql, [$p1, $p2, $p3], false);
        }
        function obrisi_oblik($id){
            $sql = "DELETE FROM cenovnik WHERE id=?";
            return $this->selectPrepare($sql, [$id], false);
        }
        function proveri_usera($name,$pass){
            return $this->selectQuery("SELECT * FROM users WHERE name = '$name' AND password = '$pass'");
        }
        function upisi_usera($name,$pass){
            $sql = "INSERT INTO users(name, password) VALUES (?, ?)";
            return $this->selectPrepare($sql, [$name, $pass], false);
        }
        function insert_stavka($p1, $p2, $p3, $p4, $p5, $p6){
            $sql = "INSERT INTO `stavke_racuna`(`racun_id`, `proizvod`, `oblik`, `kolicina`, `cena`, `proizvod_id`) VALUES ( ?, ?, ?, ?, ?, ?)";
            return $this->selectPrepare($sql, [$p1, $p2, $p3, $p4, $p5, $p6], false);
        }
        function insert_racun($p1, $p2, $p3, $p4, $p5){
            $sql = "INSERT INTO `racun`( `datum`, `ime_prezime`, `adresa`, telefon, `isporuka`, `cena`, `isporuceno`) VALUES ( NOW(), ?, ?, ?, ?, ?, 0)";
            return $this->selectPrepare($sql, [$p1, $p2, $p3, $p4, $p5], false);
        }
        function racuni(){
            return $this->selectQuery("SELECT * FROM racun WHERE isporuceno = 0");
        }
        function stavke($id){
            return $this->selectQuery("SELECT * FROM stavke_racuna WHERE racun_id = $id ");
        }
        function delete_racun($id){
            $this->selectPrepare("DELETE FROM racun WHERE id = ? ", [$id], false);
            $this->selectPrepare("DELETE FROM stavke_racuna WHERE racun_id = ?", [$id], false);
        }
        function isporuceno($id){
            return $this->selectPrepare("UPDATE racun SET isporuceno=1 WHERE id=?", [$id], false);
        }
        function snimi_racun($podaci){
            try {  
               $this->pdo->beginTransaction();
                $this->insert_racun($podaci->ime_prezime, $podaci->adresa, $podaci->telefon, $podaci->datum_isporuke->format('Y-m-d'),0);
                $rid = $this->pdo->lastInsertId();
                $cene  = 0;
                foreach ( $_SESSION["korpa"] as $stavka){
                    $proizvod = $this->jedan_proizvod($stavka['id']);
                    $cena = $this->cena($stavka['id'], $stavka['oblik']);
                    $cene += $cena[0]["cena"]*$stavka['kol'];
                    $this->insert_stavka($rid,$proizvod['naziv_proizvoda'],$stavka['oblik'],$stavka['kol'],$cena[0]["cena"],$stavka['id']);

                }
                $cene += $podaci->lokacija;
                $this->selectPrepare("UPDATE racun SET cena=? WHERE id=?", [$cene, $rid], false);
                $this->pdo->commit();
                return "ok";
            } catch (Exception $e) {
               $this->pdo->rollBack();
                return "Failed: " . $e->getMessage();
              }
        }
    }
    $db = new Baza();

   // echo json_encode($db->naslovi(2));
    
?>