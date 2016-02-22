<?php
require_once('conexion.inc.php');
$titulo_evento = $_POST['titulo_evento'];
$contenido_evento = $_POST['contenido_evento'];
$fecha_evento = $_POST['fecha_evento'];
$tag = $_POST['tag'];
$consultaevento = "INSERT INTO evento (titulo_evento, contenido_evento, fecha_evento, tag) values
					('$titulo_evento', '$contenido_evento', '$fecha_evento', '$tag')";
//echo "$consultaevento";
$resultadoevento = mysql_query($consultaevento);
header("location:index.php");
?>