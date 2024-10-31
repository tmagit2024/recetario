<?php
session_start();
require_once("../../conexion.php");
require_once("../../../paginacion.inc.php");
require_once("../../libreria_menu.php");
//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <link rel='stylesheet' href='../../css/buscador.css' type='text/css'>
         <link rel='stylesheet' href='../../css/tablas.css' type='text/css'>
         <link rel='stylesheet' href='../../css/formulario.css' type='text/css'>
         <meta http-equiv='Content-type' content='text/html; charset=utf-8'/>
       </head>
       <body>
       <p> &nbsp;</p>";

contarRegistros($db, "ingredientes");
paginacion("ingredientes.php?");

$sql3 = $db->Prepare("SELECT *
                     FROM ingredientes
                     WHERE estado <> 'X'
                     AND cod_ingrediente >= 1 
                     ORDER BY cod_ingrediente ASC
                     LIMIT ? OFFSET ?                  
                        ");
$rs = $db->GetAll($sql3, array($nElem, $regIni));
   if ($rs) {
        echo"<center>
              <h1>LISTADO DE INGREDIENTES</h1>
              <b><a  href='ingrediente_nuevo.php' style='display: inline-block; padding: 10px 20px; background-color: #ff6f61; color: white; text-decoration: none; font-weight: bold; font-size: 25px; border: 2px solid black; border-radius: 5px; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000;'>Nuevo Ingrediente>>>></a></b>
              <div class='table-container'>
              <table class='listado'>
                <tr>                                   
                  <th>Nro</th><th>INGREDIENTES</th>
                  <th><img src='../../imagenes/modificar.gif'></th><th><img src='../../imagenes/borrar.jpeg'></th>
                </tr>";

                $b=0;
                $total=$pag-1;
                $a=$nElem*$total;
                $b=$b+1+$a;

            foreach ($rs as $k => $fila) {                                       
                echo"<tr>
                        <td align='center'>".$b."</td>
                        <td>".$fila['ingrediente']."</td>
                        <td align='center'>
                          <form name='formModif".$fila["cod_ingrediente"]."' method='post' action='ingrediente_modificar.php'>
                            <input type='hidden' name='cod_ingrediente' value='".$fila['cod_ingrediente']."'>
                            <a href='javascript:document.formModif".$fila['cod_ingrediente'].".submit();' title='Modificar Ingrediente Sistema'>
                              Modificar>>
                            </a>
                          </form>
                        </td>
                        <td align='center'>  
                          <form name='formElimi".$fila["cod_ingrediente"]."' method='post' action='ingrediente_eliminar.php'>
                            <input type='hidden' name='cod_ingrediente' value='".$fila["cod_ingrediente"]."'>
                            <a href='javascript:document.formElimi".$fila['cod_ingrediente'].".submit();' title='Eliminar Ingrediente Sistema'
                            onclick='javascript:return(confirm(\"Desea realmente Eliminar el Ingrediente: ".$fila["ingrediente"]." ?\"))'; location.href='ingrediente_eliminar.php''> 
                              Eliminar>>
                            </a>
                          </form>                        
                        </td>
                     </tr>";
                     $b=$b+1;
            }
             echo"</table>
             </div>
          </center>";
    }
    
    mostrar_paginacion();

echo "</div>
      </body>
      </html>";