"use strict";

function validar(){
    var ingrediente=document.formu.ingrediente.value;

    if (!v1.test(ingrediente)){
        alert("El Ingrediente es incorrecto");
        document.formu.ingrediente.focus();
        return;
    }
    document.formu.submit();
}