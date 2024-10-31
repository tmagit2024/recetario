<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       
$cod_persona = $_POST["cod_persona"];
$ap = $_POST["ap"];
$am = $_POST["am"];
$nombres = $_POST["nombres"];
$genero = $_POST["genero"];
$ci = $_POST["ci"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

if(($nombres!="") and ($ci!="")){
   $reg = array();
   $reg["cod_recetario"] = 1;
   $reg["ap"] = $ap;
   $reg["am"] = $am;
   $reg["nombres"] = $nombres;
   $reg["genero"] = $genero;
   $reg["ci"] = $ci;
   $reg["direccion"] = $direccion;
   $reg["telefono"] = $telefono;
   $reg["usuario"] = $_SESSION["sesion_cod_usuario"];   
   $rs1 = $db->AutoExecute("personas", $reg, "UPDATE", "cod_persona='".$cod_persona."'");
   header("Location: personas.php");
   exit();
} else {
   require_once("../../libreria_menu.php");
       echo"<div class='mensaje'>";
        $mensage = "NO SE MODIFICARON LOS DATOS DE LA PERSONA";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='personas.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }

echo "</body>
      </html> ";
?> 