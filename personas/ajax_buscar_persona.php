<?php
session_start();
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$ci = $_POST["ci"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$nombres = $_POST["nombres"];
$fecha = $_POST["fecha"];
//$db->debug=true;

if($ci or $paterno or $materno or $nombres or $fecha){
  $sql3 = $db->Prepare("SELECT *
                   FROM personas
                   WHERE ci LIKE ?
                   AND ap LIKE ?
                   AND am LIKE ?
                   AND nombres LIKE ?
                   AND DATE(fec_insercion) = ?
                   AND estado <> 'X'
                      ");
  $rs3 = $db->GetAll($sql3, array($ci."%",$paterno."%", $materno."%", $nombres."%", $fecha));
   if ($rs3) {
        echo"<center>
              <table class='listado'>
                <tr>                                   
                  <th>C.I.</th><th>PATERNO</th><th>MATERNO</th><th>NOMBRES</th><th>FECHA</th>
                  <th><img src='../../imagenes/modificar.gif'></th><th><img src='../../imagenes/borrar.jpeg'></th>
                </tr>";

            foreach ($rs3 as $k => $fila) {
                     $str = $fila["ci"];
                     $str1 = $fila["ap"];
                     $str2 = $fila["am"];
                     $str3 = $fila["nombres"];
                     $str4 = $fila["fec_insercion"];                                      
                echo"<tr>
                        <td align='center'>".resaltar($ci, $str)."</td>
                        <td>".resaltar($paterno, $str1)."</td>
                        <td>".resaltar($materno, $str2)."</td>
                        <td>".resaltar($nombres, $str3)."</td>
                        <td>".resaltar($fecha, $str4)."</td>
                        <td align='center'>
                          <form name='formModif".$fila["cod_persona"]."' method='post' action='persona_modificar.php'>
                            <input type='hidden' name='cod_persona' value='".$fila['cod_persona']."'>
                            <a href='javascript:document.formModif".$fila['cod_persona'].".submit();' title='Modificar Persona Sistema'>
                              Modificar>>
                            </a>
                          </form>
                        </td>
                        <td align='center'>  
                          <form name='formElimi".$fila["cod_persona"]."' method='post' action='persona_eliminar.php'>
                            <input type='hidden' name='cod_persona' value='".$fila["cod_persona"]."'>
                            <a href='javascript:document.formElimi".$fila['cod_persona'].".submit();' title='Eliminar Persona Sistema'
                            onclick='javascript:return(confirm(\"Desea realmente Eliminar a la Persona: ".$fila["nombres"]." ".$fila["ap"]." ".$fila["am"]." ?\"))';
                            location.href='persona_eliminar.php''> 
                              Eliminar>>
                            </a>
                          </form>                        
                        </td>
                     </tr>";
            }
             echo"</table>
          </center>";
    } else {
        echo"<center><b>LA PERSONA NO EXISTE!!</b></center><br>";
    }
}
?>