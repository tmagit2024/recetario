<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");
//$db->debug=true;

$cod_persona = $_POST["cod_persona"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <link rel='stylesheet' href='../../css/formulario.css' type='text/css'>
         <script src='../js/expresiones_regulares.js'></script>
         <script src='../js/validacion_formularios.js'></script>
       </head>
       <body>
       <p> &nbsp;</p>";
       
         echo"<h1>MODIFICAR PERSONA</h1>";

$sql = $db->Prepare("SELECT *
                     FROM personas
                     WHERE cod_persona = ?
                     AND estado <> 'X'                        
                        ");
$rs = $db->GetAll($sql,array($cod_persona));
 /*  if ($rs) {*/
  foreach ($rs as $k => $fila) {  
    echo "<form action='persona_modificar1.php' method='post' name='formu'>";
    echo "<div class='form-container'>
             <div>
               <th><b>(*) CI:</b></th>
               <td>
                  <input type='text' name='ci' id='ci' size='10' value='".$fila["ci"]."'>
                  <span class='error-message' id='error-ci'></span>
               </td>
             </div>
             <div>
               <th><b>(*) Paterno:</b></th>
               <td>
                  <input type='text' name='ap' id='ap' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["ap"]."'>
                  <span class='error-message' id='error-ap'></span>
               </td>
             </div>
             <div>
               <th><b>(*) Materno:</b></th>
               <td>
                  <input type='text' name='am' id='am' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["am"]."'>
                  <span class='error-message' id='error-am'></span>
               </td>
             </div>
             <div>
               <th><b>(*) Nombres:</b></th>
               <td>
                  <input type='text' name='nombres' id='nombres' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["nombres"]."'>
                  <span class='error-message' id='error-nombres'></span>
               </td>
             </div>
             <div>
               <th><b>(*) Direccion:</b></th>
               <td>
                  <input type='text' name='direccion' id='direccion' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["direccion"]."'>
                  <span class='error-message' id='error-direccion'></span>
               </td>
             </div>
             <div>
               <th><b>(*) Telefono:</b></th>
               <td>
                  <input type='text' name='telefono' id='telefono' size='10' value='".$fila["telefono"]."'>
                  <span class='error-message' id='error-telefono'></span>
               </td>
             </div>
             <div>
               <th><b>(*) Género</b></th><br>
               <td>
                  <select name='genero' id='genero'>
                    <option value=''>--Seleccione--</option>
                    <option value='F'>Femenino</option>
                    <option value='M'>Masculino</option>
                  </select>
               </td>
              <span class='error-message' id='error-genero'></span>
             </div>
             
             <div class='button-group full-width'>
               <input type='hidden' name='cod_persona' value='".$fila["cod_persona"]."'>
               <input type='button' value='ACEPTAR' onclick='validarPersona();'>
               <input type='reset' value='CANCELAR'><br>
               (*)Datos Obligatorios
             </div>
           </div>";
    echo "</form>";
    /*}*/
}
echo "</body>
      </html> ";
?>