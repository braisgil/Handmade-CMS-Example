<?php
require_once('conexion.inc.php');
$titulo_pagina = $_POST['titulo_pagina'];
$titulo_limpio = strtr(strtolower($titulo_pagina),"áéíóúñ, ", "aeioun--");
//MIRAR FUNCION REMPLAZO
$contenido_pagina = $_POST['contenido_pagina'];
$url = "<a href='index.php?content='".$titulo_limpio."'>".$titulo_pagina."</a>";
$consultapagina = "INSERT INTO pagina (titulo_pagina, contenido_pagina, url_pagina) values
					('$titulo_pagina', '$contenido_pagina', '$url')";
//echo "$consultanoticia";
$resultadopagina = mysql_query($consultapagina);
header("location:index.php");
?>