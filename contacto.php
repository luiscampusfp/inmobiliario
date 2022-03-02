<?php

require_once("vistas/principal.php");

$main = new VistaPrincipal();
$main->head();


?>

<body>

	<?php
	$main->header();
	$main->contactoGrande();
	$main->footer();
	?>
</body>

</html>
