<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       
$cod_ingrediente = $_POST["cod_ingrediente"];
$ingrediente = $_POST["ingrediente"];

if($ingrediente!=""){
   $reg = array();
   $reg["cod_recetario"] = 1;
   $reg["ingrediente"] = $ingrediente;
   $reg["usuario"] = $_SESSION["sesion_cod_usuario"];   
   $rs1 = $db->AutoExecute("ingredientes", $reg, "UPDATE", "cod_ingrediente='".$cod_ingrediente."'");
   header("Location: ingredientes.php");
   exit();
} else {
   require_once("../../libreria_menu.php");
       echo"<div class='mensaje'>";
        $mensage = "NO SE MODIFICARON LOS DATOS DEL INGREDIENTE";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='ingredientes.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }

echo "</body>
      </html> ";
?> 