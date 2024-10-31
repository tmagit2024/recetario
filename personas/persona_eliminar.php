<?php
session_start();
require_once("../../conexion.php");

$__cod_persona = $_REQUEST["cod_persona"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <link rel='stylesheet' href='../../css/formulario.css' type='text/css'>
       </head>
       <body>";
//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
                     FROM usuarios
                     WHERE cod_persona = ?
                     AND estado <> 'X'
                   ");
$rs = $db->GetAll($sql, array($__cod_persona));

if (!$rs) {
    $reg = array();
    $reg["estado"] = 'X';
    $reg["usuario"] = $_SESSION["sesion_cod_usuario"];
    $rs1 = $db->AutoExecute("personas", $reg, "UPDATE", "cod_persona='".$__cod_persona."'");
    header("Location: personas.php");
    exit();
    
} else {
    require_once("../../libreria_menu.php");
     echo"<div class='mensaje'>";
        $mensage = "NO SE ELIMINARON LOS DATOS DE LA PERSONA PORQUE TIENE HERENCIA";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='personas.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
}

echo"</body>
</html>";
?>