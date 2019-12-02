<?php
include "baza.php";
if(!isset($_SESSION['username']) || $_SESSION['user_role'] != 1){
    header('location:login.php');
}

$idp = $_GET['id'] ?? '';
if($idp == ''){
    die('Niste izabrali proizvod');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <a class="float-right" href="logout.php">LOG OUT</a>
        <h1>Dobrodošli <?php echo $_SESSION['username'] ?></h1>
        <span class="float-left">Idi na:</span><br>
        <span class="float-left">-</span><a href="admin_proizvodi.php" class="float-left">Lista svih proizvoda</a><br>
        <span class="float-left">-</span><a href="admin_racuni.php" class="float-left">Računi</a>
    </div>
    <div class="product_name">
        <h1>ID proizvoda: <?=$idp?></h1>
    </div>
    
<?php
    $niz = $db->cene($idp);
    echo "<h1>Svi oblici</h1>";
    echo "<table>";
    echo "<tr>";
        echo "<th>Naziv oblika</th>";
        echo "<th>Cena</th>";
        echo "<th></th>";
        echo "</tr>";
    foreach($niz as $red){
        echo "<tr>";
        echo "<td>$red[oblik]</td>";
        echo "<td>$red[cena]</td>";
        echo "<td><button class='delete' data-id='".$red['id']."'>DELETE</button></td>";
        echo "</tr>";
      
    }
    echo "</table>";
    ?>
    <div class="insert">
        <h1>Unesi proizvod</h1>
        <div class="forma">
            <form action="unos.php" method="POST">
                <input name="idp" type="hidden" value="<?=$idp?>">
                <label for="oblik">Oblik proizvoda:</label>
                <input name="oblik"  type="text" required><br>
                <label for="cena">Cena:</label>
                <input name="cena" required type="number"><br>
                <input type="submit" value="Sacuvaj" class="submit" name="dodaj_oblik"></input>
            </form>
        </div>
    </div>
    <script>
        let del = document.querySelectorAll(".delete");
        for(let btn of del){
            btn.onclick = function(){
                let id = this.getAttribute('data-id');
                fetch("unos.php?obrisi_oblik="+id)
                    .then(resp=>resp.text())
                    .then(txt=>{
                        if(txt == 'obrisan'){
                            btn.parentElement.parentElement.remove();
                        }else{
                            alert(txt);
                        }
                    });
            }
        }
        
    </script>
</body>
<style>
    body{
        padding: 30px;
    }
    .container span{
        margin-right: 5px;
    }
    .container a{
        color: black;
    }
    h1{
        margin-left: 350px;
    }
    .product_name h1{
        margin-top: 50px;
        margin-bottom: 50px;
    }
    table{
            border-collapse: collapse;
            width: 1000px;
            margin-top: 30px;
            margin-left:30px;
        }
    table th{
        text-align: center;
    }
    table th,td{
        padding: 5px;
        border: 1px solid black;
    }
    .insert{
        margin-top: 25px;
    }
    .forma{
        width: 1000px;
        margin-top: 30px;
        margin-left: 30px;
    }
    form label{
        width: 150px;
    }
    form input{
        width: 500px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .submit{
        margin-left: 150px;
    }
</style>
</html>