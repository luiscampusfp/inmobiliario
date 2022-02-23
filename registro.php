<?php
require_once("vistas/principal.php");
require_once("vistas/login.php");
require_once("controladores/controlador_contacto.php");

$controler=new ControladorContacto();
$controler->peticionRegistro();

$login= new VistaLogin();

$main = new VistaPrincipal();
$main->head($login->estilos());
?>

<body>

	<?php
	$main->header();
    $login->formularioRegistro();
	$main->footer();
	?>
</body>

</html>