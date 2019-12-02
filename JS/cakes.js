let svadbene = document.querySelector(".svadbene");


let opacity = document.querySelector(".opacity");
let gallery = document.querySelector(".gallery");
let close = document.querySelector(".gallery .close");

let rodjendanske = document.querySelector(".rodjendanske");
let deserti = document.querySelector(".deserti");
let sitni = document.querySelector(".sitni");


svadbene.onclick = function () {
    if (opacity.style.display === "none") {
        opacity.style.display = "block";
        gallery.style.display = "block";
        svaLeft.style.display = "block";
        svaRight.style.display = "block";
        document.querySelector(".svadbene.gl").style.display = "block";
    } else  {
        opacity.style.display = "none";
        gallery.style.display = "none";
        svaLeft.style.display = "none";
        svaRight.style.display = "none";
        document.querySelector(".svadbene.gl").style.display = "none";
    }
}

rodjendanske.onclick = function () {
    if (opacity.style.display === "none") {
        opacity.style.display = "block";
        gallery.style.display = "block";
        rodjLeft.style.display = "block";
        rodjRight.style.display = "block";
        document.querySelector(".rodjendanske.gl").style.display = "block";
    } else  {
        opacity.style.display = "none";
        gallery.style.display = "none";
        rodjLeft.style.display = "none";
        rodjRight.style.display = "none";
        document.querySelector(".rodjendanske.gl").style.display = "none";
    }
}
deserti.onclick = function () {
    if (opacity.style.display === "none") {
        opacity.style.display = "block";
        gallery.style.display = "block";
        desLeft.style.display = "block";
        desRight.style.display = "block";
        document.querySelector(".deserti.gl").style.display = "block";
    } else  {
        opacity.style.display = "none";
        gallery.style.display = "none";
        desLeft.style.display = "none";
        desRight.style.display = "none";
        document.querySelector(".deserti.gl").style.display = "none";
    }
}
sitni.onclick = function () {
    if (opacity.style.display === "none") {
        opacity.style.display = "block";
        gallery.style.display = "block";
        sitLeft.style.display = "block";
        sitRight.style.display = "block";
        document.querySelector(".sitni.gl").style.display = "block";
    } else  {
        opacity.style.display = "none";
        gallery.style.display = "none";
        sitLeft.style.display = "none";
        sitRight.style.display = "none";
        document.querySelector(".sitni.gl").style.display = "none";
    }
}

close.onclick = function () {
    opacity.style.display = "none"
    gallery.style.display = "none";
    svaLeft.style.display = "none";
    svaRight.style.display = "none";
    rodjLeft.style.display = "none";
    rodjRight.style.display = "none";
    desLeft.style.display = "none";
    desRight.style.display = "none";
    sitLeft.style.display = "none";
    sitRight.style.display = "none";
    document.querySelector(".svadbene.gl").style.display = "none";
    document.querySelector(".rodjendanske.gl").style.display = "none";
    document.querySelector(".deserti.gl").style.display = "none";
    document.querySelector(".sitni.gl").style.display = "none";
}

let sva = 1;
let rodj = 1;
let des = 1;
let sit = 1;
let svaLeft = document.querySelector("#sva-left");
let svaRight = document.querySelector("#sva-right");
let rodjLeft = document.querySelector("#rodj-left");
let rodjRight = document.querySelector("#rodj-right");

let desLeft = document.querySelector("#des-left");
let desRight = document.querySelector("#des-right");

let sitLeft = document.querySelector("#sit-left");
let sitRight = document.querySelector("#sit-right");
svaLeft.addEventListener("click", function () {
    document.querySelector(".svadbene.gl").classList.remove("gl" + sva);
    sva--;
    if (sva < 1) sva = 5;
    document.querySelector(".svadbene.gl").classList.add("gl" + sva);
});
svaRight.addEventListener("click", function () {
    document.querySelector(".svadbene.gl").classList.remove("gl" + sva);
    sva++;
    if (sva > 5) sva = 1;
    document.querySelector(".svadbene.gl").classList.add("gl" + sva);
});
rodjLeft.addEventListener("click", function () {
    document.querySelector(".rodjendanske.gl").classList.remove("gl" + rodj);
    rodj--;
    if (rodj < 1) rodj = 5;
    document.querySelector(".rodjendanske.gl").classList.add("gl" + rodj);
});
rodjRight.addEventListener("click", function () {
    document.querySelector(".rodjendanske.gl").classList.remove("gl" + rodj);
    rodj++;
    if (rodj > 5) rodj = 1;
    document.querySelector(".rodjendanske.gl").classList.add("gl" + rodj);
});
desLeft.addEventListener("click", function () {
    document.querySelector(".deserti.gl").classList.remove("gl" + des);
    des--;
    if (des < 1) des = 7;
    document.querySelector(".deserti.gl").classList.add("gl" + des);
});
desRight.addEventListener("click", function () {
    document.querySelector(".deserti.gl").classList.remove("gl" + des);
    des++;
    if (des > 7) des = 1;
    document.querySelector(".deserti.gl").classList.add("gl" + des);
});
sitLeft.addEventListener("click", function () {
    document.querySelector(".sitni.gl").classList.remove("gl" + sit);
    sit--;
    if (sit < 1) sit = 6;
    document.querySelector(".sitni.gl").classList.add("gl" + sit);
});
sitRight.addEventListener("click", function () {
    document.querySelector(".sitni.gl").classList.remove("gl" + sit);
    sit++;
    if (sit > 6) sit = 1;
    document.querySelector(".sitni.gl").classList.add("gl" + sit);
});

