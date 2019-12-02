
        let del = document.querySelectorAll(".delete");
        for(let btn of del){
            btn.onclick = function(){
                let id = this.getAttribute('data-id');
                fetch("unos.php?obrisi="+id)
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
        document.querySelector('#reset').onclick = function(){
            document.querySelector("input[type='submit']").name = "dodaj_proizvod";
            document.querySelector("input[name='id']").value = "";
            document.querySelector("input[name='naziv']").value = "";
            document.querySelector("input[name='tip']").value = "";
            document.querySelector("input[name='cena']").value = "";
            document.querySelector("input[name='opis']").value = "";
            document.querySelector("input[name='dostupnost']").value = "";
            document.querySelector("input[name='alergeni']").value = "";
            document.querySelector("input[name='porcije']").value = "";
            document.querySelector("input[name='sadrzi']").value = "";
            document.querySelector('.insert h1').innerHTML = "Unesi proizvod";
        }

        let izm = document.querySelectorAll(".izmeni");
        for(let btn of izm){
            btn.onclick = function(){
                let id = this.getAttribute('data-id');
                fetch("unos.php?daj_1="+id)
                    .then(resp=>resp.json())
                    .then(json=>{
                        document.querySelector("input[name='id']").value = id;
                        document.querySelector("input[name='naziv']").value = json.naziv_proizvoda;
                        document.querySelector("input[name='tip']").value = json.tip;
                        document.querySelector("input[name='cena']").value = json.cena;
                        document.querySelector("input[name='opis']").value = json.opis;
                        document.querySelector("input[name='dostupnost']").value = json.dostupnost;
                        document.querySelector("input[name='alergeni']").value = json.alergeni;
                        document.querySelector("input[name='porcije']").value = json.porcije;
                        document.querySelector("input[name='sadrzi']").value = json.sadrzi;
                        //document.querySelector("input[name='slika']").value = json.slika;

                        document.querySelector("input[type='submit']").name = "izmeni_proizvod";
                        document.querySelector(".insert h1").innerHTML = "Izmeni proizvod "+id;
                    });
            }
        }