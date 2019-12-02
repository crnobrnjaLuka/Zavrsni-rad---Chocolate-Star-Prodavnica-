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
    <link rel="stylesheet" href="/chocolate_star/css/admin_proizvodi.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <a class="float-right" href="logout.php">LOG OUT</a>
        <h1>Dobrodošli <?php echo $_SESSION['username'] ?></h1>
        <span class="float-left">Idi na:</span><br>
        <span class="float-left">-</span><a href="admin_racuni.php" class="float-left"> Lista računa</a>
    </div>

<?php
    $niz = $db->proizvodi();
    
    echo "<h1>Svi proizvodi</h1>";
    echo "<table>";
    echo "<tr>";
        echo "<th>Naziv proizvoda</th>";
        echo "<th>Tip</th>";
        echo "<th>Opis</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "</tr>";
    foreach($niz as $red){
        echo "<tr>";
        echo "<td>$red[naziv_proizvoda]</td>";
        echo "<td>$red[tip]</td>";
        echo "<td>$red[opis]</td>";
        echo "<td><button class='izmeni' data-id='".$red['id']."'>IZMENI</button></td>";
        echo "<td><button class='delete' data-id='".$red['id']."'>DELETE</button></td>";
        echo "<td><a href='admin_oblici.php?id=".$red['id']."'>OBLICI</a></td>";
        echo "</tr>";
      
    }
    echo "</table>";
    ?>
    <div class="insert">
        <h1>Unesi proizvod</h1>
        <div class="forma">
            <form action="unos.php" method="POST" enctype="multipart/form-data">
                <input name="id" type="hidden">
                <label for="naziv">Naziv proizvoda:</label>
                <input name="naziv"  type="text" required><br>
                <label for="tip">Tip:</label>
                <input name="tip" required type="text"><br>
                <label for="cena">Cena:</label>
                <input name="cena" required type="number"><br>
                <label for="opis">Opis:</label>
                <input name="opis" required type="text"><br>
                <label for="dostupnost">Dostupnost:</label>
                <input name="dostupnost" required type="text"><br>
                <label for="alergeni">Alergeni:</label>
                <input name="alergeni" required type="text"><br>
                <label for="porcije">Porcije:</label>
                <input name="porcije" required type="text"><br> 
                <label for="sadrzi">Sadrzi:</label>
                <input name="sadrzi" required type="text"><br>
                <label for="slika">Slika:</label>
                <input name="slika" type="file"><br>
                <input type="submit" value="Sacuvaj" class="submit" name="dodaj_proizvod"></input>
            </form>
            <button id="reset">RESET</button>
        </div>
    </div>
    <script src="JS/proizvodi.js"  type="text/javascript"></script>
</body>
</html>