
        let del = document.querySelectorAll(".isporuceno");
        for(let btn of del){
            btn.onclick = function(){
                let id = this.getAttribute('data-id');
                fetch("snimi_racun.php?isporuceno="+id)
                    .then(resp=>resp.text())
                    .then(txt=>{
                        if(txt == 'isporuceno'){
                            let redovi = [...document.querySelectorAll('tr[data-id="'+id+'"]')];
                            for(let red of redovi)
                                red.remove();
                        }else{
                            alert(txt);
                        }
                    });
            }
        }