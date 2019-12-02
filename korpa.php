<?php
include_once "baza.php";
include_once "korpa_session.php";
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
            <div id="cartGalleryContainer">
                <div class="cartGridContainer">
                    <div class="cartContent1">
                        <span><em><strong>KORPA</strong></em></span>
                    </div>

                <?php
                    if(!isset($_SESSION["korpa"]) || count($_SESSION["korpa"]) ==0)
                        echo "<div>Nemate proizvode u korpi.</div>"; 
                    else{
                ?>
                    <div class="cartContent2"></div>
                    <div class="cartContent3"></div>
                    <div class="cartContent4"><strong>Proizvod</strong></div>
                    <!-- <div class="cartContent5"><strong>Oblik</strong></div> -->
                    <div class="cartContent5"><strong>Cena</strong></div>
                    <div class="cartContent6"><strong>Kolicina</strong></div>
                    <div class="cartContent7"><strong>Ukupno</strong></div>
</div>
                    <?php
                        $uk_cena = 0;
                        foreach ( $_SESSION["korpa"] as $stavka){
                        $proizvod = $db->jedan_proizvod($stavka['id']);
                        $cena = $db->cena($stavka['id'], $stavka['oblik']);
                    ?>
                         <div class="cartGridContainer" data-id="<?=$stavka['id']?>"  data-oblik="<?=$stavka["oblik"]?>">

                            <div class="cartContent8"><button class="obrisi" data-id="<?=$stavka['id']?>"  data-oblik="<?=$stavka["oblik"]?>">x</button></div>
                            <div class="cartContent9"><img src="slike/cokoladna_bomba.jpg" alt="123"></div>
                            <div class="cartContent10"><?=$proizvod["naziv_proizvoda"].'<br>'.$stavka["oblik"]?></div>
                            <!-- <div class="cartContent11"><?=$stavka["oblik"]?></div> -->
                            <div class="cartContent11"><?=$cena[0]["cena"]?> rsd</div>
                            <div class="cartContent12">
                                    <input type="number" step="1" min="1" max="10" class="kol" value="<?=$stavka['kol']?>"></div>
                            <div class="cartContent13"><?=$cena[0]["cena"]*$stavka['kol']?>.00 rsd</div>
                        
                            <?php $uk_cena += $cena[0]["cena"]*$stavka['kol']; ?>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="tabela">
                        <table>
                            <tr>
                            <th>Ukupno</th>
                            <td><span id="uk_bez_dostave"><?=$uk_cena?></span></td>
                            </tr>
                            <tr>
                            <th>Dostava ili preuzimanje</th>
                            <td>
                                <select id="dostava">
                                <option value="1150">Altina  <span class="cena">1150,00</span></option>
                                <option value="940">Banjica  <span class="cena">940,00</span></option>
                                <option value="720">Banovo brdo  <span class="cena">720,00</span></option>
                                <option value="940">Batajnica  <span class="cena">940,00</span></option>
                                <option value="940">Bežanija  <span class="cena">940,00</span></option>
                                <option value="1150">Borča  <span class="cena">1150,00</span></option>
                                <option value="720">Braće Jerković  <span class="cena">720,00</span></option>
                                <option value="1150">Cerak  <span class="cena">1150,00</span></option>
                                <option value="720">Dedinje  <span class="cena">720,00</span></option>
                                <option value="940">Jajinci  <span class="cena">940,00</span></option>
                                <option value="720">Karaburma  <span class="cena">720,00</span></option>
                                <option value="720">Konjarnik  <span class="cena">720,00</span></option>
                                <option value="940">Kotež  <span class="cena">940,00</span></option>
                                <option value="720">Kumodraž  <span class="cena">720,00</span></option>
                                <option value="720">Ledine  <span class="cena">720,00</span></option>
                                <option value="940">Medak  <span class="cena">940,00</span></option>
                                <option value="1150">Miljakovac  <span class="cena">1150,00</span></option>
                                <option value="940">Mirijevo  <span class="cena">940,00</span></option>
                                <option value="720">Novi Beograd  <span class="cena">720,00</span></option>
                                <option value="1150">Petlovo brdo  <span class="cena">1150,00</span></option>
                                <option value="940">Rakovica  <span class="cena">9400,00</span></option>
                                <option value="1440">Resnik  <span class="cena">1440,00</span></option>
                                <option value="500">Savski venac  <span class="cena">500,00</span></option>
                                <option value="500">Senjak  <span class="cena">500,00</span></option>
                                <option value="500">Stari grad  <span class="cena">500,00</span></option>
                                <option value="1440">Surčin  <span class="cena">1440,00</span></option>
                                <option value="1150">Vidikovac  <span class="cena">1150,00</span></option>
                                <option value="720">Višnjica  <span class="cena">720,00</span></option>
                                <option value="720">Voždovac  <span class="cena">720,00</span></option>
                                <option value="600">Vračar  <span class="cena">600,00</span></option>
                                <option value="940">Žarkovo  <span class="cena">940,00</span></option>
                                <option value="1440">Železnik  <span class="cena">1440,00</span></option>
                                <option value="940">Zemun  <span class="cena">940,00</span></option>
                                <option value="500">Zvezdara  <span class="cena">500,00</span></option>
                                </select>
                            </td>
                            </tr>

                            <tr>
                            <th>Ukupno</th>
                            <td><span id="uk_sa_dostavom"><?=$uk_cena?></span></td>
                            </tr>
                            <tr><td colspan="2"><button id="kupi">KUPI</button></td></tr>
                        </table>
                        <table id="user">
                            <tr> <th>Ime prezime</th>
                            <td><input value="" name="ime_prezime"></input></td></tr>
                            <tr> <th>Adresa</th>
                            <td><input value="" name="adresa"></input></td></tr>
                            <tr> <th>Telefon</th>
                            <td><input value="" type="tel" name="telefon"></input></td></tr>
                            <tr> <th>Datum isporuke</th>
                            <td><input value="" name="datum_isporuke" type="date"></input></td></tr>
                            <tr><td colspan="2"><button id="kupi_konacno">ZAVRSI KUPOVINU</button></td></tr>
                        </table>
                        <?php
                             }   //OD IF(isset(session korpa))
                        ?>
                    </div>
                    
                </div>
            </div>
            
            <footer>
                <div id="zag123">
                    <div><a href="index.html"><img src="slike/logo1.png" alt="logo"/></a></div>
                    <div><span>+381 64 111 60 58 </span></div>
                    <div><span><a href="mailto:chocolate-star07@hotmail.com">chocolate-star07@hotmail.com</a></span></div>
                </div>
            </footer>
        </div>
       
        
    <script src="JS/main.js"  type="text/javascript"></script>
    <script src="JS/cart.js" type="text/javascript"></script>


    </body>
</html>