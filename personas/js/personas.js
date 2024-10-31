"use strict";

function validar(){
    var nombres=document.formu.nombres.value;
    var ap=document.formu.ap.value;
    var am=document.formu.am.value;
    var ci=document.formu.ci.value;

    if (ci=="") {
        alert("El ci es incorrecto o el campo esta vacio");
        document.formu.ci.focus();
        return;
    }
    if ((am=="") && (ap=="")) {
        alert("Uno de los apellidos debe ser llenado");
        document.formu.ap.focus();
        return; 
    }
    if (ap!="") {
        if (!v1.test(ap)) {
            alert("El Apellido Paterno");
            document.formu.ap.focus();
            return;
        }
    }
    if (am!="") {
        if (!v1.test(am)) {
            alert("El Apellido Materno");
            document.formu.am.focus();
            return;
        }
    }
    if (!v1.test(nombres)){
        alert("El Nombre es incorrecto");
        document.formu.nombres.focus();
        return;
    }
    document.formu.submit();
}