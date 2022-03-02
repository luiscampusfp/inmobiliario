<?php
require_once("controladores/controlador_contacto.php");
require_once("controladores/controlador_propiedad.php");

class VistaPrincipal
{
    private $controlerCon;
    private $controlerPro;

    public function __construct()
    {
        $this->controlerCon = new ControladorContacto();
        $this->controlerPro = new ControladorPropiedad();
        $this->controlerCon->peticionSalir();
    }

    public function getControlerPro()
    {
        return $this->controlerPro;
    }

    public function head($estilos = 0)
    {
?>
        <!DOCTYPE html>
        <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
        <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
        <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
        <!--[if gt IE 8]><!-->
        <html class="no-js">
        <!--<![endif]-->

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Tu Hogar</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
            <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
            <meta name="author" content="FREEHTML5.CO" />

            <!-- Facebook and Twitter integration -->
            <meta property="og:title" content="" />
            <meta property="og:image" content="" />
            <meta property="og:url" content="" />
            <meta property="og:site_name" content="" />
            <meta property="og:description" content="" />
            <meta name="twitter:title" content="" />
            <meta name="twitter:image" content="" />
            <meta name="twitter:url" content="" />
            <meta name="twitter:card" content="" />

            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
            <link rel="shortcut icon" href="favicon.ico">

            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300' rel='stylesheet' type='text/css'>

            <!-- Animate.css -->
            <link rel="stylesheet" href="css/animate.css">
            <!-- Icomoon Icon Fonts-->
            <link rel="stylesheet" href="css/icomoon.css">
            <!-- Bootstrap  -->
            <link rel="stylesheet" href="css/bootstrap.css">
            <!-- Superfish -->
            <link rel="stylesheet" href="css/superfish.css">
            <!-- Flexslider  -->
            <link rel="stylesheet" href="css/flexslider.css">
            <!-- Magnific Popup -->
            <link rel="stylesheet" href="css/magnific-popup.css">
            <!-- Date Picker -->
            <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
            <!-- CS Select -->
            <link rel="stylesheet" href="css/cs-select.css">
            <link rel="stylesheet" href="css/cs-skin-border.css">

            <link rel="stylesheet" href="css/style.css">


            <!-- Modernizr JS -->
            <script src="js/modernizr-2.6.2.min.js"></script>
            <!-- FOR IE9 below -->
            <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

            <?php


            if ($estilos != 0) {
                echo $estilos;
            }
            ?>
        </head>
    <?php
    }

    public function header()
    {
    ?>
        <div id="fh5co-wrapper">
            <div id="fh5co-page">

                <header id="fh5co-header-section" class="sticky-banner">
                    <div class="container">
                        <div class="nav-header">
                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                            <h1 id="fh5co-logo"><a href="index.php"><i class="icon-home"></i>Home<span>state</span></a></h1>
                            <!-- START #fh5co-menu-wrap -->
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li>
                                        <a href="../properties.php" class="fh5co-sub-ddown">Properties</a>
                                        <ul class="fh5co-sub-menu">
                                            <li><a href="#">Family</a></li>
                                            <li><a href="#">CSS3 &amp; HTML5</a></li>
                                            <li><a href="#">Angular JS</a></li>
                                            <li><a href="#">Node JS</a></li>
                                            <li><a href="#">Django &amp; Python</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="agent.html">Agent</a></li>
                                    <?php
                                    if ($this->controlerCon->estaLogeado()) {
                                        echo '<li><a href="?exit=1">Salir</a></li>';
                                    } else {
                                        echo '<li><a href="login.php">Iniciar Sesión</a></li>';
                                    }
                                    ?>
                                    <li><a href="contacto.php">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>

                <!-- end:header-top -->
            <?php
        }

        public function carrousel()
        {
            ?>
                <aside id="fh5co-hero" class="js-fullheight">
                    <div class="flexslider js-fullheight">
                        <ul class="slides">
                            <?php
                            foreach ($this->controlerPro->propiedadesDestacadas() as $propiedad) {
                            ?>
                                <li style="background-image: url(images/<?= $propiedad->getImagen() ?>);">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                                <div class="slider-text-inner">
                                                    <div class="desc">
                                                        <span class="status"><?= $propiedad->getEstado() ?></span>
                                                        <h1><?= $propiedad->getNombre() ?></h1>
                                                        <h2 class="price"><?= $propiedad->getPrecio() ?>€</h2>
                                                        <p><?= $propiedad->getDescripcion() ?></p>
                                                        <p class="details">
                                                            <span><?= $propiedad->getTamanyo() ?> metros</span>
                                                            <span><?= $propiedad->getHabitaciones() ?> Bedrooms</span>
                                                            <span><?= $propiedad->getBanyos() ?> Bathrooms</span>
                                                            <span><?= $propiedad->getGarage() ? "Tiene garage" : "No tiene garage" ?></span>
                                                        </p>
                                                        <p><a class="btn btn-primary btn-lg" href="#">Learn More</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </aside>
            <?php
        }

        public function buscador()
        {
            ?>
                <div id="fh5co-search-map">
                    <div class="search-property">
                        <div class="s-holder">
                            <form action="properties.php" method="post">
                                <h2>Search Properties</h2>
                                <div class="row">
                                    <div class="col-xxs-12 col-xs-12">
                                        <div class="input-field">
                                            <label for="from">Keyword:</label>
                                            <input type="text" class="form-control" id="from-place" name="key" placeholder="Any" />
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <section>
                                            <label for="class">Property Status:</label>
                                            <select class="cs-select cs-skin-border" name="estado">
                                                <option value="" disabled selected>Any</option>
                                                <option value="renta">Renta</option>
                                                <option value="venta">Venta</option>
                                            </select>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <section>
                                            <label for="class">Property Type:</label>
                                            <select class="cs-select cs-skin-border input-half" name="tipo">
                                                <option value="" disabled selected>Any</option>
                                                <?php
                                                foreach ($this->controlerPro->tiposPropiedad() as $tipo) {
                                                    echo "<option value='$tipo'>$tipo</option>";
                                                }
                                                ?>
                                            </select>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <div class="input-field">
                                            <label for="from">Location:</label>
                                            <input type="text" class="form-control" id="from-place" name="direccion" placeholder="Any" />
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <section>
                                            <label for="class">Price:</label>
                                            <div class="wide">
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="precio1">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="500">500</option>
                                                    <option value="1000">1000</option>
                                                    <option value="2000">2000</option>
                                                    <option value="100000">100000</option>
                                                    <option value="500000">500000</option>
                                                    <option value="1000000">1000000</option>
                                                    <option value="2000000">2000000</option>
                                                </select>
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="precio2">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="1000">1000</option>
                                                    <option value="2000">2000</option>
                                                    <option value="100000">100000</option>
                                                    <option value="500000">500000</option>
                                                    <option value="1000000">1000000</option>
                                                    <option value="2000000">2000000</option>
                                                    <option value="3000000">3000000</option>
                                                </select>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <section>
                                            <label for="class">Bedrooms:</label>
                                            <div class="wide">
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="habitaciones1">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="habitaciones1">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <section>
                                            <label for="class">Bathrooms:</label>
                                            <div class="wide">
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="banyos1">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="banyos2">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12">
                                        <section>
                                            <label for="class">Area:</label>
                                            <div class="wide">
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="area1">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="30">30</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="200">200</option>
                                                    <option value="300">300</option>
                                                    <option value="500">500</option>
                                                </select>
                                                <select class="cs-select cs-select-half cs-skin-border input-half" name="area2">
                                                    <option value="" disabled selected>Any</option>
                                                    <option value="30">30</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="200">200</option>
                                                    <option value="300">300</option>
                                                    <option value="500">500</option>
                                                </select>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-12 text-center">
                                        <p><input class="btn btn-primary btn-lg" type="submit" name="buscar" value="Buscar">
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="map" style="background-image: url(images/cover_bg_1.jpg);">
                    </div>
                </div>
            <?php
        }

        public function mostrarPropiedadesResumen()
        {
            ?>
                <div id="fh5co-popular-properties" class="fh5co-section-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                                <h3>Popular Properties</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 animate-box">
                                <a href="#" class="fh5co-property" style="background-image: url(images/property-1.jpg);">
                                    <span class="status">Sale</span>
                                    <div class="prop-details">
                                        <span class="price">$3,000</span>
                                        <h3>Properties Near in Beach, USA California</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box">
                                <a href="#" class="fh5co-property" style="background-image: url(images/property-2.jpg);">
                                    <span class="status">Rent</span>
                                    <div class="prop-details">
                                        <span class="price">$200/mos</span>
                                        <h3>Modern House at NZ</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box">
                                <a href="#" class="fh5co-property" style="background-image: url(images/property-3.jpg);">
                                    <span class="status">Sale</span>
                                    <div class="prop-details">
                                        <span class="price">$3,000</span>
                                        <h3>Bonggalo House</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }

        public function mostrarPropiedadesCompleta()
        {
            global $filtro;
            ?>
                <div id="fh5co-properties" class="fh5co-section-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                                <h3>Newest Properties</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($this->controlerPro->mostrarPropiedades($filtro) as $propiedad) {
                            ?>
                                <div class="col-md-4 animate-box">
                                    <div class="property">
                                        <a href="#" class="fh5co-property" style="background-image: url(images/<?= $propiedad->getImagen() ?>);">
                                            <span class="status"><?= $propiedad->getEstado() ?></span>
                                            <ul class="list-details">
                                                <li><?= $propiedad->getTamanyo() ?> metros</li>
                                                <li><?= $propiedad->getHabitaciones() ?> Bedroom:</li>
                                                <li><?= $propiedad->getBanyos() ?> Bathroom:</li>
                                                <li><?= $propiedad->getGarage() ? "Tiene garage" : "No tiene garage" ?></li>
                                            </ul>
                                        </a>
                                        <div class="property-details">
                                            <h3><?= $propiedad->getNombre() ?></h3>
                                            <span class="price"><?= $propiedad->getPrecio() ?> €</span>
                                            <p><?= substr($propiedad->getDescripcion(), 0, 150) . "..."  ?></p>
                                            <span class="address"><i class="icon-map"></i><?= $propiedad->getDireccion() ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
        }

        public function contacto()
        {
            ?>
                <div id="fh5co-contact" class="fh5co-contact">
                    <div class="half-contact">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-0 text-center heading-section animate-box">
                                    <h3>Ask an agent, We're here to help 24/7</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
                                </div>
                            </div>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12 animate-box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="NombreContacto" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="CorreoContacto" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="" name="MensajeContacto" cols="30" rows="7" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" name="EnviarContacto" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="half-bg" style="background-image: url(images/cover_bg_2.jpg);"></div>
                </div>
            <?php
            $this->controlerCon->peticionContactar();
        }

        public function contactoGrande()
        {
            ?>
                <div id="fh5co-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                                <h3>Contact Information</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="row animate-box">
                            <div class="col-md-6">
                                <h3 class="section-title">Our Address</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <ul class="contact-info">
                                    <li><i class="icon-location-pin"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
                                    <li><i class="icon-phone2"></i>+ 1235 2355 98</li>
                                    <li><i class="icon-mail"></i><a href="#">info@yoursite.com</a></li>
                                    <li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
                                </ul>
                            </div>
                            <form action="" method="post">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="NombreContacto" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="CorreoContacto" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="" name="MensajeContacto" cols="30" rows="7" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" name="EnviarContacto" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            $this->controlerCon->peticionContactar();
        }

        public function footer()
        {
            ?>
                <footer>
                    <div id="footer">
                        <div class="container">
                            <div class="row row-bottom-padded-md">
                                <div class="col-md-3">
                                    <h3 class="section-title">About Homestate</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
                                </div>

                                <div class="col-md-3 col-md-push-1">
                                    <h3 class="section-title">Links</h3>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Properties</a></li>
                                        <li><a href="#">Agent</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">API</a></li>
                                        <li><a href="#">FAQ / Contact</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3">
                                    <h3 class="section-title">Information</h3>
                                    <ul>
                                        <li><a href="#">Terms &amp; Condition</a></li>
                                        <li><a href="#">License</a></li>
                                        <li><a href="#">Privacy &amp; Policy</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3 class="section-title">Newsletter</h3>
                                    <p>Subscribe for our newsletter</p>
                                    <form class="form-inline" method="POST" id="fh5co-header-subscribe">
                                        <div class="row">
                                            <div class="col-md-12 col-md-offset-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="campoCorreo" id="email" placeholder="Enter your email">
                                                    <button type="submit" name="botonSuscribir" class="btn btn-default"><i class="icon-paper-plane"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="fh5co-social-icons">
                                        <a href="#"><i class="icon-twitter2"></i></a>
                                        <a href="#"><i class="icon-facebook2"></i></a>
                                        <a href="#"><i class="icon-instagram"></i></a>
                                        <a href="#"><i class="icon-dribbble2"></i></a>
                                        <a href="#"><i class="icon-youtube"></i></a>
                                    </p>
                                    <p>Copyright 2016 Free Html5 <a href="#">Module</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a> &amp; <a href="http://blog.gessato.com/" target="_blank">Gessato</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>



            </div>
            <!-- END fh5co-page -->

        </div>
        <!-- END fh5co-wrapper -->

        <!-- jQuery -->


        <script src="js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/sticky.js"></script>
        <!-- Superfish -->
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.js"></script>
        <!-- Flexslider -->
        <script src="js/jquery.flexslider-min.js"></script>
        <!-- Date Picker -->
        <script src="js/bootstrap-datepicker.min.js"></script>
        <!-- CS Select -->
        <script src="js/classie.js"></script>
        <script src="js/selectFx.js"></script>



        <!-- Main JS -->
        <script src="js/main.js"></script>

        <?php
            $this->controlerCon->peticionSubscribirse();

        ?>
<?php
        }
    }
