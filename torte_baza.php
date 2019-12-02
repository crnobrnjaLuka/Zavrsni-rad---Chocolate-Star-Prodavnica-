<?php
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
    function selectPrepare($sql, $niz_vr){
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($niz_vr);
        $niz=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $niz;

    }
   
}

    $db = new Baza();
?>