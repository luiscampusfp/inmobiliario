<?php
require_once("vistas/principal.php");

$main = new VistaPrincipal();
$main->head();


?>

<body>

	<?php
	$main->header();
	$main->carrousel();
	$main->buscador();
	$main->mostrarPropiedadesResumen();
	$main->contacto();
	$main->footer();
	?>
</body>

</html>