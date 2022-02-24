<?php
require_once("conexion/conexionMySQL.php");

class ControladorPropiedad
{

    private $con;

    function __construct()
    {
        $this->con = new MySQLConexion("localhost", "root", "", "web2");
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function propiedadesDestacadas()
    {
        return $this->con->propiedadesDestacadas();
    }

    public function tiposPropiedad()
    {
        return $this->con->tiposPropiedad();
    }

    public function mostrarPropiedades($filtro = null)
    {
        return $this->con->obtenerPropiedades($filtro);
    }
    public function peticionBuscar()
    {
        if (isset($_POST['buscar'])) {
            global $filtro;
            $filtro = array();
            $filtro['key'] = isset($_POST['key']) ? $_POST['key'] : null;
            $filtro['estado'] =  isset($_POST['estado']) ? $_POST['estado'] : null;
            $filtro['tipo'] = isset($_POST['tipo']) ? $_POST['tipo'] : null;
            $filtro['direccion'] =  isset($_POST['direccion']) ? $_POST['direccion'] : null;
            $filtro['precio1'] =  isset($_POST['precio1']) ? $_POST['precio1'] : null;
            $filtro['precio2'] =  isset($_POST['precio2']) ? $_POST['precio2'] : null;
            $filtro['habitaciones1'] = isset($_POST['habitaciones1']) ? $_POST['habitaciones1'] : null;
            $filtro['habitaciones2'] =  isset($_POST['habitaciones2']) ? $_POST['habitaciones2'] : null;
            $filtro['banyos1'] =  isset($_POST['banyos1']) ? $_POST['banyos1'] : null;
            $filtro['banyos2'] =  isset($_POST['banyos2']) ? $_POST['banyos2'] : null;
            $filtro['area1'] =  isset($_POST['area1']) ? $_POST['area1'] : null;
            $filtro['area2'] =  isset($_POST['area2']) ? $_POST['area2'] : null;
        }
    }
}
