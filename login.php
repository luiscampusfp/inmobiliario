<?php
require_once("vistas/principal.php");
require_once("vistas/login.php");
require_once("controladores/controlador_contacto.php");

$controler=new ControladorContacto();
$controler->peticionLogin();

$login= new VistaLogin();

$main = new VistaPrincipal();
$main->head($login->estilos());
?>

<body>

	<?php
	$main->header();
    $login->formularioLogin();
	$main->footer();
	?>
</body>

</html>