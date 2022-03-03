<?php
require_once("vistas/principal.php");

$main = new VistaPrincipal();
$main->getControlerPro()->peticionBuscar();
$main->getControlerPro()->peticionPropiedad();
$main->head();

?>

<body>

    <?php
    $main->header();
    if (isset($id)) {
        $main->properti();
    }else{
        $main->buscador();
        $main->mostrarPropiedadesCompleta();
    }
    $main->footer();
    ?>
</body>

</html>