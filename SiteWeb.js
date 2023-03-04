const select = document.getElementById('choix');
            select.addEventListener('change', function () {
                var valeur = select.options[select.selectedIndex].value;
                valeur = parseInt(valeur);
                 
                switch (valeur) {
                    case 1:
                        changeURL("AccueilVoiture.html");
                        break;
                    case 2:
                        changeURL("AccueilMoto.html");
                        break;
                    default:
                        console.log('default');
                }
 
            });
             
            function changeURL(url) {
                window.location.href = url;
            }