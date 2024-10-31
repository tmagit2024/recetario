<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <link rel='stylesheet' href='../../css/formulario.css' type='text/css'>
         <script src='../js/expresiones_regulares.js'></script>
         <script src='../js/validacion_formularios.js'></script>
       </head>
       <body>
       <p> &nbsp;</p>";
              
       echo"<h1>INSERTAR INGREDIENTE</h1>";

/*$sql = $db->Prepare("SELECT *
                     FROM personas
                     WHERE estado <> 'X'                        
                        ");
$rs = $db->GetAll($sql);*/
 /*  if ($rs) {*/
        echo"<form action='ingrediente_nuevo1.php' method='post' name='formu3'>";
        echo "<div class='form-container'>
                <div>
                  <th><b>(*) Ingrediente:</b></th>
                  <td><input type='text' name='ingrediente' id='ingrediente' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  <span class='error-message' id='error-ingrediente'></span>
                </div>
                  
                <div class='button-group'>
                  <input type='button' value='ACEPTAR' onclick='validarIng()'>
                  <input type='reset' value='CANCELAR'><br>
                  (*) Datos Obligatorios
                </div>
              </div>";
       echo "</form>";     
    /*}*/
/*<tr>
                    <th><b>(*)Genero</b></th>
                    <td><input type='radio' name='genero' size='10' value='F'>Femenino
                      <input type='radio' name='genero' size='10' value='M'>Masculino<br>
                    </td>
                  </tr>*/
echo "</body>
      </html> ";

 ?>