<?php
    include_once "baza.php";
    include_once "korpa_session.php";
    $id = $_GET["id"];
    $proizvod = $db->jedan_proizvod($id);
    $cene = $db->cene($id);

    // var_dump($proizvod);
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
        <link rel="stylesheet" href="/chocolate_star/fontawesome.min.css">
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
        <div id="productContainer" class="sporedniDiv">
            <div class="productTitleSubtitleContainer">
                <div class="productTitleHolder">
                    <h1 class="productPageTitle">
                        <span>Chocolate Star Prodavnica</span>
                    </h1>
                    <span class="productTitleSeparator"></span>
                    <p class="productPageSubtitle">
                        <span >Etiam convallis, felis quis dapibus dictum, libero mauris luctus nunc, non fringilla purus ligula non justo.<br> Non
                            fringilla purus</span>
                    </p>
                </div>
            </div>
            <div id="productGalleryContainer">
              <div class="productGridContainer">
                <div class="product">
                  <img class="<?= $proizvod["tip"]?>" src="slike/<?= $proizvod["slika"]?>" alt="slika">
                </div>
                <div class="product">
                    <h1><?=$proizvod["naziv_proizvoda"]?></h1>
                    <p><span><strong id="cenaProizvoda"><?=$cene[0]["cena"]?></strong></span></p>
                    <p><em><strong>OPIS:</strong></em> <?= $proizvod["opis"]?></p>
                    <p><em><strong>DOSTUPNOST:</strong></em> <?= $proizvod["dostupnost"]?></p>
                    <p><em><strong>Molimo Vas poručite željene proizvode minimum 3 dana ranije (72h).</strong></em></p>
                    <p><em><strong>ALERGENI:</strong></em> <?= $proizvod["alergeni"]?></p>
                    <p><em><strong>PORCIJE:</strong></em> <?= $proizvod["porcije"]?></p>
                    <p><em><strong>OSTALO:</strong></em> <?= $proizvod["sadrzi"]?></p>
                    <p><em><strong>Oblik / Težina</strong></em></p>
                <div class="select">
                    <select name="" id="slct" >
                        <option value="">Izaberite opciju</option>
                        <?php
                            foreach($cene as $stavka){
                        ?>
                            <option value="<?=$stavka['cena']?>"><?=$stavka["oblik"]?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="amount">
                    <input type="number" step="1" min="1" max="10">
                </div>
                <div class="confirm">
                    <button class="button" id="dodaj_u_korpu" data-id="<?=$id?>" >DODATI U KORPU</button>
                </div>
                </div>
              </div>
            </div>
            <footer>
                <div id="zag123">
                    <div><a href="index.html"><img  src="slike/logo1.png" alt="logo"/></a> </div>
                    <div><span>+381 64 111 60 58 </span></div>
                    <div><span><a href="mailto:chocolate-star07@hotmail.com">chocolate-star07@hotmail.com</a></span></div>
                </div>
            </footer>
        </div>
       
        
    <script src="JS/main.js"  type="text/javascript"></script>
    <script src="JS/cart.js" type="text/javascript"></script>

    </body>
</html>
 