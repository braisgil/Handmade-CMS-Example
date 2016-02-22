<?php
require_once('conexion.inc.php');

	$tipo = $_POST['select_tipo'];
		if ($tipo == 1){
			$subida.="<h1>Publica una Noticia</h1>
					<div id='divcontent'>
					<form action='publicnoticia.php' method='post' id='formulario'>
						<fieldset>
							<label for='titulo_noticia'>Titular:</label>
							</br>
							<input type='text' id='titulo_noticia' name='titulo_noticia'/>
							</br>
							</br>
							<label for='contenido_noticia'>Contenido:</label>
							</br>
							<textarea id='contenido_noticia' class='editor' name='contenido_noticia'></textarea>
							</br>
							<label for='tag'>Tags (separados por comas):</label>
							</br>
							<input type='text' id='tag' name='tag'/>
							</br>
							</br>
							<input id='btnpubli' type='submit' value='Publicar'>
						</fieldset>
					</form>
					</div>";
		} else if ($tipo == 2){
			$subida.="<h1>Publica un Evento</h1>
					<div id='divcontent'>
					<form action='publicevento.php' method='post' id='formulario'>
						<fieldset>
							<label for='titulo_evento'>Titulo:</label>
							</br>
							<input type='text' id='titulo_evento' name='titulo_evento'/>
							</br>
							</br>
							<label for='contenido_evento'>Contenido:</label>
							</br>
							<textarea id='contenido_evento' class='editor' name='contenido_evento'></textarea>
							</br>
							<label for='fecha_evento'>Fecha:</label>
							</br>
							<input type='text' id='fecha_evento' name='fecha_evento'/>
							</br>
							</br>
							<label for='tag'>Tags (separados por comas):</label>
							<input type='text' id='tag' name='tag'/>
							</br>
							</br>
							<input id='btnpubli' type='submit' value='Publicar'>
						</fieldset>
					</form>
					</div>";
		} else if ($tipo == 3){
			$subida.="<h1>Crea una pagina estatica</h1>
					<div id='divcontent'>
					<form action='publicpag.php' method='post' id='formulario'>
						<fieldset>
							<label for='titulo_pagina'>Titulo:</label>
							</br>
							<input type='text' id='titulo_pagina' name='titulo_pagina'/>
							</br>
							</br>
							<label for='contenido_pagina'>Contenido:</label>
							</br>
							<textarea id='contenido_pagina' class='editor' name='contenido_pagina'></textarea>
							</br>
							<input type='submit' value='Publicar' id='btnpubli'>
						</fieldset>
					</form>
					</div>";
		};
?>

<html>
	<head>
			<!-- Include Font Awesome. -->
  			<link href="scripts/froala/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  			<!-- Include Editor style. -->
 			<link href="scripts/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
			<link href="scripts/froala/css/froala_style.min.css" rel="stylesheet" type="text/css" />
			<script src='scripts/jquery-1.11.2.min.js'></script>
			<script src="scripts/froala/js/froala_editor.min.js"></script>
			<script src="scripts/jquery-ui-1.11.3/jquery-ui.min.js"></script>
			<link rel="stylesheet" href="scripts/jquery-ui-1.11.3/jquery-ui.min.css"/>
			<script>
				$(function(){
					$('.editor').editable({
						imageUploadURL:'subir_imagen.php',
						imageUploadParam:'file',   //MIRAR PARAMETRO COMUN EN EL subir_imagen.php
						inlineMode: false
					})
				})
			</script>

			<script>
				$(document).ready(function(){
					$( "#fecha_evento" ).datepicker({dateFormat: 'yy-mm-dd'});
				});
			</script>

			<link href='estilo_content.css' type='text/css' rel='stylesheet'/>
	</head>
	<body>
		<?=$subida?>
	</body>
</html>



