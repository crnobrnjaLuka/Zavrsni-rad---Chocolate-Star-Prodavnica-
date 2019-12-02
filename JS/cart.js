        let dodajUkorpu = document.querySelector("#dodaj_u_korpu");
        let slct = document.querySelector("#slct");
        let dugmici = document.querySelectorAll("button.obrisi");
        let kols = document.querySelectorAll("input.kol");

        // function swapper() {
        //     toggleClass(document.getElementById('slct'), 'open');
        // }
        // if(dodajUkorpu){
        //     dodajUkorpu.addEventListener('click', swapper, false);

        //     let dugme = document.getElementById('dodaj_u_korpu');
        //     dugme.onclick = function(){

        //     let id = this.getAttribute("data-id");
        //     let oblik = document.querySelector('#slct option[value="'+slct.value+'"]').innerHTML;
        //     let kol = document.querySelector('div.amount input').value;
        //     fetch("korpa_session.php?tip=dodaj&id="+id+"&kol="+kol+"&oblik="+encodeURIComponent(oblik))
        //         .then(resp=>resp.text())
        //         .then(txt=>alert(txt));
        //     }

        // }
        if(dodajUkorpu)
        dodajUkorpu.addEventListener('click', function(){
            let id = this.getAttribute("data-id");
            let oblik = document.querySelector('#slct option[value="'+slct.value+'"]').innerHTML;
            let obv = document.querySelector('#slct').value;
            let kol = document.querySelector('div.amount input').value;
            if(kol === '' || kol < 1){
                alert('unesite kolicinu');
                return
            }
            if(obv === '' || obv < 0){
                alert('izaberite oblik');
                return
            }
            fetch("korpa_session.php?tip=dodaj&id="+id+"&kol="+kol+"&oblik="+encodeURIComponent(oblik))
                .then(resp=>resp.text())
                .then(txt=>alert("Uspešno ste dodali proizvod u korpu "+txt));
        })

        if(slct)
        slct.onchange = function(){
            let cena = this.value;
            document.querySelector("#cenaProizvoda").innerHTML = cena;
        }

        if(dugmici){
            for( let btn of dugmici){
                btn.onclick = function(){
                    let id = this.getAttribute("data-id");
                    let ob = this.getAttribute("data-oblik");
                    let that=this;
                    fetch("korpa_session.php?tip=obrisi&id="+id+"&oblik="+encodeURIComponent(ob))
                        .then(resp=>resp.text())
                        .then(txt=>{
                            document.querySelector("div[data-id='"+id+"']")
                            .remove();
                            korpa_uk_cena();
                        });
                }
            }
        }

        if(kols){
            for( let btn of kols){
                btn.onchange = function(event){
                    let rod = this.parentElement.parentElement;
                    let id = rod.getAttribute("data-id");
                    let ob = rod.getAttribute("data-oblik");
                    let nkol = this.value;
                    let cna = parseFloat(rod.querySelector('.cartContent11').innerHTML);
                    rod.querySelector('.cartContent13').innerHTML = nkol*cna;
                    fetch("korpa_session.php?tip=zameni&id="+id+"&kol="+nkol+"&oblik="+encodeURIComponent(ob))
                    .then(resp=>resp.text())
                    .then(txt=>korpa_uk_cena());
                }
            }
        }

        let dostava = document.querySelector('#dostava');
        if(dostava)
            dostava.onchange = korpa_uk_cena;
        function korpa_uk_cena(){
            let cc = document.querySelectorAll('.cartContent13');
            if(cc === null || cc.length == 0){
                if(document.querySelector('.tabela'))  document.querySelector('.tabela').remove();
                return;
            }
            let s=0;
            for(let c of cc)
                s+=parseFloat(c.innerHTML);
            document.querySelector('#uk_bez_dostave').innerHTML = s+" rsd";
            s+=parseFloat(document.querySelector('#dostava').value)
            document.querySelector('#uk_sa_dostavom').innerHTML = s+" rsd";
        }
        korpa_uk_cena();

        let kupi = document.querySelector('#kupi');
        if(kupi){
            kupi.onclick = function() {
                //if()
                document.querySelector('table#user').style.display = "block";
            }
        }

        let kupi_konacno = document.querySelector('#kupi_konacno');
        if(kupi_konacno){
            kupi_konacno.onclick = function() {
                let ime_prezime = document.querySelector("input[name='ime_prezime']").value;
                let adresa = document.querySelector("input[name='adresa']").value;
                let telefon = document.querySelector("input[name='telefon']").value;
                let datum_isporuke = document.querySelector("input[name='datum_isporuke']").value;
                let cisp = parseFloat(document.querySelector('#dostava').value);
                if( ime_prezime == "" || adresa == "" || telefon == "" || datum_isporuke == ""){
                    alert ( "Morate popuniti sva polja");
                    return;
                }
                let data = { ime_prezime : ime_prezime, adresa : adresa, telefon : telefon, datum_isporuke : datum_isporuke, lokacija:cisp };
                let opcije = {
                    body : JSON.stringify(data),
                    method : "POST",
                    // headers : {
                    //     'Content-Type' : 'application/json'
                    // }
                }
                fetch('snimi_racun.php', opcije)
                    .then(resp=>resp.text())
                    .then(txt=>{
                        alert(txt);
                    })
            }
        }
        