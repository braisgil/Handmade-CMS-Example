<?php
require_once('conexion.inc.php');
$titulo_noticia = $_POST['titulo_noticia'];
$contenido_noticia = $_POST['contenido_noticia'];
$tag = $_POST['tag'];
$consultanoticia = "INSERT INTO noticia (titulo_noticia, contenido_noticia, fecha_noticia, tag) values
					('$titulo_noticia', '$contenido_noticia', now(), '$tag')";
//echo "$consultanoticia";
$resultadonotica = mysql_query($consultanoticia);
header("location:index.php");
?>