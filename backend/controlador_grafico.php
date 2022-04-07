<?php
 require "../backend/modelo_grafico.php";

 $MG = new modelo_grafico();
 $consulta = $MG -> TraerDatosGrafico();
 echo json_encode ($consulta);
?>