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
              
       echo"<h1>INSERTAR PERSONA</h1>";

/*$sql = $db->Prepare("SELECT *
                     FROM personas
                     WHERE estado <> 'X'                        
                        ");
$rs = $db->GetAll($sql);*/
 /*  if ($rs) {*/
 echo "<form action='persona_nuevo1.php' method='post' name='formu'>";
 echo "<div class='form-container'>
        <div>
          <th><b>(*) CI</b></th>
          <td><input type='text' name='ci' id='ci' size='10'></td>
          <span class='error-message' id='error-ci'></span>
        </div>
        <div>
          <th><b>Paterno</b></th>
          <td><input type='text' name='ap' id='ap' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
          <span class='error-message' id='error-ap'></span>
        </div>
        <div>
          <th><b>Materno</b></th>
          <td><input type='text' name='am' id='am' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
          <span class='error-message' id='error-am'></span>
        </div>
        <div>
          <th><b>(*) Nombres</b></th>
          <td><input type='text' name='nombres' id='nombres' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
          <span class='error-message' id='error-nombres'></span>
        </div>
        <div>
          <th><b>(*) Dirección</b></th>
          <td><input type='text' name='direccion' id='direccion' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
          <span class='error-message' id='error-direccion'></span>
        </div>
        <div>
          <th><b>(*) Teléfono</b></th>
          <td><input type='text' name='telefono' id='telefono' size='10'></td>
          <span class='error-message' id='error-telefono'></span>
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
                  
        <div class='button-group'>
          <input type='button' value='ACEPTAR' onclick='validarPersona()'>
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