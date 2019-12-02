<?php
    include_once "baza.php";
    include_once "korpa_session.php";
    $torte = $db->torte();
    $kolaci = $db->kolaci();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
		<title>Chocolate Star</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="/chocolate_star/css/style.css">
        <link rel="stylesheet" href="/chocolate_star/css/all.css">
        <link rel="stylesheet" href="/chocolate_star/css/fontawesome.min.css">
    </head>
    <body>
		<header id="hd">			
            <a href="index.html"><img id="logo" src="slike/logo1.png" alt="logo"/></a>
            <div id="cart">
                <a href="korpa.php"><i class="fas fa-shopping-cart"></i></a>
                <span class="cartCount"><?=broj_proizvoda()?></span>
            </div>
            <div id="menuButton">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
                          
        </header>
        <div id="menu" style="display:none;">         
            <div class="gridContainer" >    
                <div><img id="menuLogo" src="slike/logo1.png" alt="logo"/></div>             
                <div><a id="clickHome" href="index.html">Početna</a></div>
                <div><a id="clickAbout" href="about.html">O Nama</a></div>
                <div><a id="clickCakes" href="cakes.html">Torte i Kolači</a></div>
                <div><a id="clickDecorations" href="decorations.html">Dekoracije</a></div>
                <div><a id="clickShop" href="shop.php">Prodavnica</a></div>
                <div class="links">
                    <span><a href="https://www.facebook.com/chocolatestar2007" target="_blank"><i class="fab fa-facebook"></i></a></span>
                    <span><a href="https://www.instagram.com/chocolatestarbeograd/" target="_blank"><i class="fab fa-instagram"></i></a></span>
                </div> 
            </div>          
        </div>
        <div id="shopContainer" class="sporedniDiv">
            <div class="shopTitleSubtitleContainer">
                <div class="shopTitleHolder">
                    <h1 class="shopPageTitle">
                        <span>Chocolate Star Prodavnica</span>
                    </h1>
                    <span class="shopTitleSeparator"></span>
                    <p class="shopPageSubtitle">
                        <span >Etiam convallis, felis quis dapibus dictum, libero mauris luctus nunc, non fringilla purus ligula non justo.<br>Non
                            fringilla purus</span>
                    </p>
                </div>
            </div>
            <div id="shopGalleryContainer">
                <div class="shopTitle">
                    <span>Torte</span>
                </div>
                <div id="shopFlexContainer">
                    <?php
                    foreach($torte as $torta){ ?>
                        <div class="grid-item"><a href="proizvod.php?id=<?=$torta["id"]?>"><img class="torte_shop" src="slike/<?=$torta["slika"]?>" alt="123"></a>
                        <p><a href="proizvod.php?id=<?=$torta["id"]?>"><?=$torta["naziv_proizvoda"]?></a></p>
                        <p><a href="proizvod.php?id=<?=$torta["id"]?>"><i class="fas fa-shopping-cart"></i>Izaberite opcije</a></p>
                        </div>
                    <?php  }

                    ?>
                </div>
                <div class="shopTitle">
                    <span>Kolači</span>
                </div>
                <div id="shopFlexContainer">
                <?php
                    foreach($kolaci as $kolac){ ?>
                        <div class="grid-item"><a href="proizvod.php?id=<?=$kolac["id"]?>"><img class="kolaci_shop" src="slike/<?=$kolac["slika"]?>" alt="123"></a>
                        <p><a href="proizvod.php?id=<?=$kolac["id"]?>"><?=$kolac["naziv_proizvoda"]?></a></p>
                        <p><a href="proizvod.php?id=<?=$kolac["id"]?>"><i class="fas fa-shopping-cart"></i>Izaberite opcije</a></p>
                        </div>
                    <?php  }

                ?>
                </div>
            </div>
            <footer>
                <div id="zag123">
                    <div><a href="index.html"><img src="slike/logo1.png" alt="logo"/></a> </div>
                    <div><span>+381 64 111 60 58 </span></div>
                    <div><span><a href="mailto:chocolate-star07@hotmail.com">chocolate-star07@hotmail.com</a></span></div>
                </div>
            </footer>
        </div>
        
        
       
        
    <script src="JS/main.js"  type="text/javascript"></script>

    </body>
</html>
 