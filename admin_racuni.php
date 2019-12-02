<?php
include "baza.php";
if(!isset($_SESSION['username']) || $_SESSION['user_role'] != 1){
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <link rel="stylesheet" href="/chocolate_star/css/admin_racuni.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <a class="float-right" href="logout.php">LOG OUT</a>
        <h1>Dobrodošli <?php echo $_SESSION['username'] ?></h1>
        <span class="float-left">Idi na:</span><br>
        <span class="float-left">-</span><a href="admin_proizvodi.php" class="float-left"> Lista proizvoda</a>
    

<?php
    $niz = $db->racuni();
    echo "<table>";
    foreach($niz as $red){
    $stavke = $db->stavke($red['id']);
        echo "<tr data-id='".$red['id']."'>";
            echo "<th colspan=2>Broj racuna</th>";
            echo "<th colspan=3>Proizvod</th>";
            echo "<th>Oblik</th>";
            echo "<th>Kolicina</th>";
            echo "</tr>";
        foreach($stavke as $stavka){
            echo "<tr data-id='".$red['id']."'>";
            echo "<td colspan=2>$red[id]</td>";
            echo "<td colspan=3>$stavka[proizvod]</td>";
            echo "<td>$stavka[oblik]</td>";
            echo "<td>$stavka[kolicina]</td>";
            echo "</tr>";
        }
    }
    echo "<tr>";
    echo "<th>Datum</th>";
    echo "<th>Ime i prezime</th>";
    echo "<th>Telefon</th>";
    echo "<th>Adresa</th>";
    echo "<th>Datum isporuke</th>";
    echo "<th>Ukupna cena</th>";
    echo "<th>Status isporuke</th>";
    echo "</tr>";
    foreach($niz as $red){
        echo "<tr data-id='".$red['id']."'>";
        echo "<td>$red[datum]</td>";
        echo "<td>$red[ime_prezime]</td>";
        echo "<td>$red[telefon]</td>";
        echo "<td>$red[adresa]</td>";
        echo "<td>$red[isporuka]</td>";
        echo "<td>$red[cena]</td>";
        echo "<td><button class='isporuceno' data-id='".$red['id']."'>ISPORUCENO</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    
    ?>
    </div>
    <script src="JS/racuni.js"  type="text/javascript"></script>
</body>
</html>