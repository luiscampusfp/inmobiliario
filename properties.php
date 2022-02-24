<?php
require_once("vistas/principal.php");

$main = new VistaPrincipal();
$main->getControlerPro()->peticionBuscar();
$main->head();

?>

<body>

    <?php
    $main->header();
    $main->buscador();
    $main->mostrarPropiedadesCompleta();
    $main->footer();
    ?>
</body>

</html>