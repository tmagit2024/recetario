<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";

$ingrediente = $_POST["ingrediente"];

if($ingrediente!=""){
   $reg = array();
   $reg["cod_recetario"] = 1;
   $reg["ingrediente"] = $ingrediente;
   $reg["fec_insercion"] = date("Y-m-d H:i:s");
   $reg["estado"] = 'A';
   $reg["usuario"] = $_SESSION["sesion_cod_usuario"];   
   $rs1 = $db->AutoExecute("ingredientes", $reg, "INSERT"); 
   header("Location: ingredientes.php");
   exit();
} else {
           echo"<div class='mensaje'>";
        $mensage = "NO SE INSERTARON LOS DATOS DEL INGREDIENTE";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='ingrediente_nuevo.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }

echo "</body>
      </html> ";
?> 