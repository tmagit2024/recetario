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
         <script type='text/javascript' src='../../ajax.js'></script>
         <script type='text/javascript' src='js/buscar_personas.js'></script>
       </head>
       <body>
       <p> &nbsp;</p>";

       echo "<!----- INICIO BUSCADOR ------------>
       <center>
           <h1>LISTADO DE PERSONAS</h1>
           <b><a href='persona_nuevo.php' style='display: inline-block; padding: 10px 20px; background-color: #ff6f61; color: white; text-decoration: none; font-weight: bold; font-size: 25px; border: 2px solid black; border-radius: 5px; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000;'>Nueva Persona>>>></a></b>
           <form action='#' method='post' name='formu'>
           <div class='table-container'>
             <table border='1' class='listado-buscador'>
               <tr>
                 <th>
                   <b>C.I.</b><br/>
                   <input type='text' name='ci' value='' size='10' onkeyup='buscar_personas()'>
                 </th>
                 <th>
                   <b>Paterno</b><br/>
                   <input type='text' name='paterno' value='' size='10' onkeyup='buscar_personas()'>
                 </th>
                 <th>
                   <b>Materno</b><br/>
                   <input type='text' name='materno' value='' size='10' onkeyup='buscar_personas()'>
                 </th>
                 <th>
                   <b>Nombres</b><br/>
                   <input type='text' name='nombres' value='' size='10' onkeyup='buscar_personas()'>
                 </th>
                 <th>
                   <b>Fecha Insercion</b><br/>
                   <input type='date' name='fecha' value='' onchange='buscar_personas()'>
                 </th>
               </tr>
             </table>
           </div>
           </form>
       </center>
       <!----- FIN BUSCADOR ------------>";
       
       echo "<div id='personas1'>";

contarRegistros($db, "personas");
paginacion("personas.php?");

$sql3 = $db->Prepare("SELECT *
                     FROM personas
                     WHERE estado <> 'X'
                     AND cod_persona >= 1 
                     ORDER BY cod_persona DESC
                     LIMIT ? OFFSET ?                  
                        ");
$rs = $db->GetAll($sql3, array($nElem, $regIni));
   if ($rs) {
    echo "<center>
    <div class='table-container'>
        <table class='listado'>
            <tr>                                   
                <th>Nro</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>NOMBRES</th>
                <th>C.I.</th>
                <th><img src='../../imagenes/modificar.gif' alt='Modificar'></th>
                <th><img src='../../imagenes/borrar.jpeg' alt='Eliminar'></th>
            </tr>";

$b=0;
$total=$pag-1;
$a=$nElem*$total;
$b=$b+1+$a;

foreach ($rs as $k => $fila) {                                       
echo "<tr>
        <td align='center'>".$b."</td>
        <td align='center'>".$fila['ci']."</td>
        <td>".$fila['ap']."</td>
        <td>".$fila['am']."</td>
        <td>".$fila['nombres']."</td>
        <td align='center'>
            <form name='formModif".$fila["cod_persona"]."' method='post' action='persona_modificar.php'>
                <input type='hidden' name='cod_persona' value='".$fila['cod_persona']."'>
                <a href='javascript:document.formModif".$fila['cod_persona'].".submit();' title='Modificar Persona Sistema'>
                    Modificar&gt;&gt;
                </a>
            </form>
        </td>
        <td align='center'>  
            <form name='formElimi".$fila["cod_persona"]."' method='post' action='persona_eliminar.php'>
                <input type='hidden' name='cod_persona' value='".$fila["cod_persona"]."'>
                <a href='javascript:document.formElimi".$fila['cod_persona'].".submit();' title='Eliminar Persona Sistema'
                onclick='return confirm(\"Desea realmente Eliminar a la Persona: ".$fila["nombres"]." ".$fila["ap"]." ".$fila["am"]." ?\")'> 
                    Eliminar&gt;&gt;
                </a>
            </form>                        
        </td>
     </tr>";
$b=$b+1;
}

echo "</table>
</div>
</center>";
    }
    
    mostrar_paginacion();
echo"</div>";
echo "</body>
      </html> ";
 ?>