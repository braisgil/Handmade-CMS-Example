<?php
session_start();
//LLAMO A LOS INCLUDES NECESARIOS
require_once('conexion.inc.php');
require_once('login.php');

//COMPROBACION DE LOS USUARIOS
if (isset($_POST['login']) && isset($_POST['password'])){
	//CONSULTA DE LOGIN
	$consulta = "SELECT * FROM usuario WHERE login LIKE '".$_POST['login']."' AND password LIKE md5('".$_POST['password']."')";
	$resultado = @mysql_query($consulta);
		//VALIDACION DE USUARIO
		if ($fila = @mysql_fetch_array($resultado)==NULL){
			//NO EXISTE
		} else {
			//SI EXISTE
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];
			$login = $_SESSION['login'];
			$password = $_SESSION['password'];
		}
};

if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
	//SI EXISTE
		$subida = "<h1> Hola ".$_SESSION['login']." </h1>
					</br>
					<form action='tipocontent.php' method='post'>
						<fieldset>
							<label for='select_tipo'>Escoja el tipo de contenido a publicar:</label>
							<select name='select_tipo' id='select_tipo'>
					 			<option value='1'>Noticia</option>
					 			<option value='2'>Evento</option>
					 			<option value='3'>Pagina estatica</option>
					 		</select>
					 		<input type='submit' value='Seleccionar'/>
					 	</fieldset>
					 </form>";
		

		$logout ="<a href='logout.php'>Logout</a>"; //LLAMO A LOGOUT PHP QUE ME DESCONECTA Y ME REDIRIGE A INDEX
} else {
		//echo "Contraseña incorrecta";
}

//___________________________________________________________________________________

//EXTRACCION DE LAS NOTICIAS PARA EL LISTADO COMPLETO
$consulta_noticia = "SELECT * FROM noticia ORDER BY fecha_noticia DESC";
$resultado_noticia = @mysql_query($consulta_noticia);

$enlaces_noticias= "
			<table>
				<tr> 
					<th>Nombre</th>
					<th>Enlace</th>
					<th>Fecha</th>
				</tr>";

if (($resultado_noticia != null) && (mysql_num_rows($resultado_noticia)>0)) {

	while(($fila = mysql_fetch_assoc($resultado_noticia))!=null) {
		$id_noticia=		$fila['id_noticia'];
		$titulo_noticia=	$fila['titulo_noticia'];
		$contenido_noticia=	$fila['contenido_noticia'];
		$fecha_noticia=		$fila['fecha_noticia'];
		$tag=				$fila['tag'];
		$enlaces_noticias.="<tr>
					<td title='$titulo_noticia'>$titulo_noticia</td> 
					<td>
						<a href='index.php?id_noticia=$id_noticia'>index.php?id_noticia=$id_noticia</a>
					</td> 
					<td>$fecha_noticia</td>
				</tr>";
	}

	$enlaces_noticias.= "\n </table>";

};

//_________________________________________________________

//EXTRACCION DE LAS NOTICIAS PARA RECIENTES
$consulta_noticiareciente = "SELECT * FROM noticia ORDER BY fecha_noticia DESC LIMIT 10";
$resultado_noticiareciente = @mysql_query($consulta_noticiareciente);

$enlaces_noticiasreciente= "<table>";

if (($resultado_noticiareciente != null) && (mysql_num_rows($resultado_noticiareciente)>0)) {

	while(($fila = mysql_fetch_assoc($resultado_noticiareciente))!=null) {
		$id_noticia=		$fila['id_noticia'];
		$titulo_noticia=	$fila['titulo_noticia'];
		$contenido_noticia=	$fila['contenido_noticia'];
		$fecha_noticia=		$fila['fecha_noticia'];
		$tag=				$fila['tag'];
		$enlaces_noticiasreciente.="<tr>
					<td>
						<a href='index.php?id_noticia=$id_noticia'>$titulo_noticia</a>
					</td> 
				</tr>";
	}

	$enlaces_noticiasreciente.= "\n </table>";
};

//______________________________________________________________

//EXTRACCION DE LOS EVENTOS PARA EL LISTADO COMPLETO
$consulta_evento = "SELECT * FROM evento WHERE fecha_evento < CURDATE() ORDER BY fecha_evento DESC";
$resultado_evento = @mysql_query($consulta_evento);

$enlaces_eventos= "
			<table>
				<tr> 
					<th>Nombre</th>
					<th>Enlace</th>
					<th>Fecha</th>
				</tr>";

if (($resultado_evento != null) && (mysql_num_rows($resultado_evento)>0)) {

	while(($fila = mysql_fetch_assoc($resultado_evento))!=null) {
		$id_evento=			$fila['id_evento'];
		$titulo_evento=		$fila['titulo_evento'];
		$contenido_evento=	$fila['contenido_evento'];
		$fecha_evento=		$fila['fecha_evento'];
		$tag=				$fila['tag'];

		$enlaces_eventos.= "<tr>
					<td title='$titulo_evento'>$titulo_evento</td> 
					<td>
						<a href='index.php?id_evento=$id_evento'>index.php?id_evento=$id_evento</a>
					</td> 
					<td title='$fecha_evento'>$fecha_evento</td>
				</tr>";
	}

	$enlaces_eventos.= "\n </table>";
};

//___________________________________________________________________

//EXTRACCION DE LOS EVENTOS PARA PROXIMOS
$consulta_evento_prox = "SELECT * FROM evento WHERE fecha_evento > CURDATE() ORDER BY fecha_evento ASC";                     //PREGUNTAR A XABI LA CONSULTA
$resultado_evento_prox = @mysql_query($consulta_evento_prox);

$enlaces_eventos_prox= "
			<table>
				<tr> 
					<th>Nombre</th>
					<th>Fecha</th>
				</tr>";

if (($resultado_evento_prox != null) && (mysql_num_rows($resultado_evento_prox)>0)) {

	while(($fila = mysql_fetch_assoc($resultado_evento_prox))!=null) {
		$id_evento=			$fila['id_evento'];
		$titulo_evento=		$fila['titulo_evento'];
		$contenido_evento=	$fila['contenido_evento'];
		$fecha_evento=		$fila['fecha_evento'];
		$tag=				$fila['tag'];

		$enlaces_eventos_prox.= "<tr> 
					<td>
						<a href='index.php?id_evento=$id_evento'>$titulo_evento</a>
					</td> 
					<td title='$fecha_evento'>$fecha_evento</td>
				</tr>";

	}

	$enlaces_eventos_prox.= "\n </table>";
};

//_____________________________________________________________________

//GESTIONAR EL CONTENIDO DEL CENTRO
/*
if (isset($_GET['ref'])){
	$busqueda = $_GET['ref'];

	$consultabuscarnoticia = "SELECT * FROM noticia WHERE tag LIKE '%$busqueda%'";
	$resultadobuscarnoticia= mysql_query($consultabuscarnoticia);
	$consultabuscarevento  = "SELECT * FROM evento WHERE tag LIKE '%$busqueda%'";
	$resultadobuscarevento = mysql_query($consultabuscarevento);

	$enlaces = "<table>";

	while(($fila = mysql_fetch_assoc($resultadobuscarnoticia))!=null) {
		$id_noticia     =   $fila['id_noticia'];
		$titulo_noticia =	$fila['titulo_noticia'];
		$enlaces.="<tr>
					<td>
						<a href='index.php?noticia=$id_noticia'>$titulo_noticia</a>
					</td> 
				</tr>";
	}
	$enlaces.="\n </table>";
}
*/
$ref = $_GET['ref'];

switch ($ref) {
	case 'listarnoticias':
		$contentcent = "
						<h2>Listado Noticias</h2>
						</br>
						$enlaces_noticias";
	break;
	
	case 'listareventos':
		$contentcent = "<h2>Listado Eventos</h2>
						</br>
						$enlaces_eventos";
	break;
/*
	case 'busqueda':
		$contentcent = "<h2>Resultado Busqueda</h2>
						</br>
						$enlaces";
	break;
*/
	default:
		$contentcent = "<h2>Bienvenido al Gestor de Noticias y Eventos</h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
						</p>";
	break;
};


//---------------------------------
$_GET['id_noticia'];
echo $_GET['id_noticia'];
$consultasel = "SELECT * FROM noticia where id_noticia = $id_noticia";
$resulsel = @mysql_query($consultasel);

$fila = mysql_fetch_assoc($resulsel);
	$titulo_noticiasel=	$fila['titulo_noticia'];
	$contenido_noticia=	$fila['contenido_noticia'];
	$fecha_noticia=		$fila['fecha_noticia'];
	$tag=				$fila['tag'];

$noticiasel = "<h1>$titulo_noticiasel</h1>";

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
		<script>
			$(function(){
				$('.editor').editable({
					imageUploadURL:'subir_imagen.php',
					imageUploadParam:'file',   //MIRAR PARAMETRO COMUN EN EL subir_imagen.php
					inlineMode: false
				})
			})
		</script>

		<link href='estilo.css' type='text/css' rel='stylesheet'/>
	</head>
		<body>
			<div id="divcabecera">
				<a href="index.php" id="enlaceindex"><h1>Gestor de contenido</h1></a>
			</div>
			<div id='menucont'>
			<div id='divlogin'>
				<form action='index.php' id='login' method='post'>
					<fieldset>
						<label for='login'>Login</label>
						<input type='text' name='login' id='login'/>
					
						<label for='password'>Password</label>
						<input type='password' name='password' id='password'/>

						<input type='submit' value='Identificarse'/>
					</fieldset>
				</form>
			</div>
			<div id="divbusqueda">
				<form action='index.php' id='busqueda' method='get'>
					<fieldset>
						<label for='buscar'>Buscar</label>
						<input type='text' name='ref' id='ref'/>
						<input type='submit' id='btnBuscar'/>
					</fieldset>
				</form>
			</div>
			</div>
			<?=$subida?>
			<?=$logout?>
			<div id='contRecientes'>
			<div id='menu_noticias'>
				<h2>Noticias Recientes</h2>
				<?=$enlaces_noticiasreciente?>
			</div>

			<div id='menu_eventos'>
				<h2>Eventos Cercanos</h2>
				<?=$enlaces_eventos_prox?>
			</div>
			</div>
			<div id="listarnoticias">
			<a href="index.php?ref=listarnoticias">Listar todas las noticias</a>
			</div>
			<div id="listareventos">
			<a href="index.php?ref=listareventos">Listar todos los eventos</a>
			</div>
			<div id="content-cent">
				<?=$contentcent?>
				<?=$noticiasel?>
			</div>

		</body>
</html>