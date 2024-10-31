"use strict";
function buscar_personas(){
    var d1, d2, d3, d4, d11, d5, ajax, url, param, contenedor;
    contenedor = document.getElementById('personas1');
    d1 = document.formu.ci.value;
    d2 = document.formu.paterno.value;
    d3 = document.formu.materno.value;
    d4 = document.formu.nombres.value;
    d5 = document.formu.fecha.value;
    //alert(d5);
    ajax = nuevoAjax();
    url = "ajax_buscar_persona.php"
    param = "ci="+d1+"&paterno="+d2+"&materno="+d3+"&nombres="+d4+"&fecha="+d5;
    //alert(param);
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4){
            contenedor.innerHTML = ajax.responseText;
        }
    }
    ajax.send(param);
}