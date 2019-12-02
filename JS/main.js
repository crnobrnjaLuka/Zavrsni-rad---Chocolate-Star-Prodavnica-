        let homePage = document.querySelector("#homePage");
        if( homePage) {
            console.log("naslovna");
            let sl=1;
		    let menjajSlikeInterval = setInterval(function(){
                //document.querySelector('.sl_ucitavanje').style.display = "none";
                document.querySelector(".sl").classList.remove("sl"+sl);
                sl++;
                if(sl>4) sl=1;
                document.querySelector(".sl").classList.add("sl"+sl);
            }, 4000);
            let sliderImages = document.querySelector(".sl");
           // sliderImages.classList.add("sl2")
            let arrowLeft = document.querySelector("#arrow-left");
            let arrowRight = document.querySelector("#arrow-right");
            arrowLeft.addEventListener("click", function () {
                    document.querySelector(".sl").classList.remove("sl" + sl);
                sl--;
                if (sl < 1) sl = 4;
                document.querySelector(".sl").classList.add("sl" + sl);
            //clearInterval(menjajSlikeInterval);           
            });
            arrowRight.addEventListener("click", function () {
                    document.querySelector(".sl").classList.remove("sl" + sl);
                sl++;
                if (sl > 4) sl = 1;
                document.querySelector(".sl").classList.add("sl" + sl);
            //clearInterval(menjajSlikeInterval);
            });
        }

        let menuButton = document.getElementById("menuButton");
        let menu = document.getElementById("menu");
        let logo = document.getElementById("logo");
        let menuLogo = document.getElementById("menuLogo");
        let about = document.querySelector("#aboutContainer");
        let aboutGallery = document.getElementById("aboutGalleryContainer");
        let cakes = document.querySelector("#cakesContainer");
        let cakesTitle = document.getElementsByClassName("cakesTitleSubtitleContainer");
        let cakesGallery = document.getElementById("cakesGalleryContainer");
        let decorations = document.getElementById("decorationsContainer");
        let shop = document.getElementById("shopContainer");
        let product = document.getElementById("productContainer");
        let footer = document.querySelector("footer");
        let zag = document.querySelector("#zag123");
        

        menuButton.onclick = function() {
            if (menu.style.display === "none") {
                menu.style.display = "block";
                menuLogo.display = "block";
                if(logo !== null && logo !== undefined)
                logo.style.display = "none";
                if(about){
                about.style.display = "none";
                aboutGallery.style.display = "none";
                }
                if(cakes){
                cakes.style.display  = "none";
                cakesTitle = "none";
                cakesGallery = "none";
                }
                if(decorations){
                decorations.style.display = "none";
                }
                if(shop)
                shop.style.display = "none";
                if(product)
                product.style.display = "none";
                if(footer)
                footer.style.display = "none";
                if(zag)
                zag.style.display = "none";
            } else {
                menu.style.display = "none";
                if(logo)
                logo.style.display = "inline-block";
                if(about){
                about.style.display = "block";
                aboutGallery.style.display = "block";
                }
                if(cakes){
                cakes.style.display  = "block";
                cakesTitle = "block";
                cakesGallery = "block";
                }
                if(decorations){
                decorations.style.display = "block";
                }
                if(shop)
                shop.style.display = "block";
                if(product)
                product.style.display = "block";
                if(footer)
                footer.style.display = "block";
                if(zag)
                zag.style.display = "block";
            }
        }

        
    

       