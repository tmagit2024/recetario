<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");
//$db->debug=true;

$cod_ingrediente = $_POST["cod_ingrediente"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <link rel='stylesheet' href='../../css/formulario.css' type='text/css'>
         <script src='../js/expresiones_regulares.js'></script>
         <script src='../js/validacion_formularios.js'></script>
       </head>
       <body>
       <p> &nbsp;</p>";
       
         echo"<h1>MODIFICAR INGREDIENTE</h1>";

$sql = $db->Prepare("SELECT *
                     FROM ingredientes
                     WHERE cod_ingrediente = ?
                     AND estado <> 'X'           
                        ");
$rs = $db->GetAll($sql,array($cod_ingrediente));
 /*  if ($rs) {*/
  foreach ($rs as $k => $fila) {  
        echo"<form action='ingrediente_modificar1.php' method='post' name='formu3'>";
        echo "<div class='form-container'>
                  <div>
                    <th><b>(*) Ingrediente:</b></th>
                    <td>
                      <input type='text' name='ingrediente' id='ingrediente' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["ingrediente"]."'>
                      <span class='error-message' id='error-ingrediente'></span>
                    </td>
                  </div>
                  
                  <div class='button-group full-width'>
                    <input type='hidden' name='cod_ingrediente' value='".$fila["cod_ingrediente"]."'>
                    <input type='button' value='ACEPTAR' onclick='validarIng()'>
                    <input type='reset' value='CANCELAR'><br>
                    (*) Datos Obligatorios
                  </div>
                </div>";
       echo "</form>";  
    /*}*/
}
echo "</body>
      </html> ";

 ?>