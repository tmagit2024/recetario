<?php
session_start();
require_once("../../conexion.php");

$__cod_ingrediente = $_REQUEST["cod_ingrediente"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
                     FROM recetas_ingredientes
                     WHERE cod_ingrediente = ?
                     AND estado <> 'X'
                   ");
$rs = $db->GetAll($sql, array($__cod_ingrediente));

if (!$rs) {
    $reg = array();
    $reg["estado"] = 'X';
    $reg["usuario"] = $_SESSION["sesion_cod_usuario"];
    $rs1 = $db->AutoExecute("ingredientes", $reg, "UPDATE", "cod_ingrediente='".$__cod_ingrediente."'");
    header("Location: ingredientes.php");
    exit();
    
} else {
    require_once("../../libreria_menu.php");
     echo"<div class='mensaje'>";
        $mensage = "NO SE ELIMINARON LOS DATOS DEL INGREDIENTE PORQUE TIENE HERENCIA";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='ingredientes.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
}

echo"</body>
</html>";
?>