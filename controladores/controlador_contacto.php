<?php
require_once("conexion/conexionMySQL.php");

class ControladorContacto
{

    private $con;

    function __construct()
    {
        $this->con = new MySQLConexion("localhost", "root", "", "web2");
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($correo, $contrasenya)
    {
        $usuario = $this->con->comprobar($correo, md5($contrasenya));
        if ($usuario == false) {
            return "Usuario o contraseña incorrecta";
        }
        $_SESSION['usuario'] = $usuario;
        if ($usuario->getTipo() == "usuario") {
            header("location:index.php");
        } else {
            header("location:admin.php");
        }
    }

    public function registro($usuario, $contrasenya)
    {
        if (!$this->con->insertarUsuario($usuario, md5($contrasenya))) {
            return "Su correo ya esta registrado.";
        }
        header("location:login.php");
    }

    public function peticionLogin()
    {
        if (isset($_POST['iniciar'])) {
            $email = $_POST['mail'];
            $pass = $_POST['password'];
            global $mensaje;
            $mensaje = $this->login($email, $pass);
        }
    }

    public function peticionRegistro()
    {
        if (isset($_POST['registro'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['mail'];
            $pass = $_POST['password'];
            $usuario = new Usuario($nombre, $email);
            global $mensaje;
            $mensaje = $this->registro($usuario, $pass);
        }
    }

    public function estaLogeado()
    {
        return isset($_SESSION['usuario']);
    }

    public function peticionSalir()
    {
        if (isset($_GET["exit"])) {
            session_destroy();
            header("location: index.php");
        }
    }

<<<<<<< HEAD
    public function subscripcion($correo)
    {
        return $this->con->insertarSuscripcion($correo);
    }

    public function peticionSubscribirse(){
        if (isset($_POST['botonSuscribir'])){
            $correo=$_POST['campoCorreo'];
            if($this->subscripcion($correo)){
                echo "<script>alert(' Te has subscrito correctamente ')</script>";
            } else {
                echo "<script>alert(' Este correo ya existe ')</script>";
            }
        }
    }

    public function contactar($contacto)
    {
        return $this->con->insertarMensaje($contacto);
    }

    public function peticionContactar(){
        if (isset($_POST['EnviarContacto'])){
            $correo=$_POST['CorreoContacto'];
            $nombre=$_POST['NombreContacto'];
            $mensaje=$_POST['MensajeContacto'];
            $contacto = new Contacto($nombre, $correo, $mensaje);
            if($this->contactar($contacto)){
                echo "<script>alert(' El mensaje se ha enviado ')</script>";
            } else {
                echo "<script>alert(' ERROR ')</script>";
=======
    public function subscripcion($email)
    {
        return $this->con->insertarSubscriptor($email);
    }

    public function peticionSubscribirtor()
    {
        if(isset($_POST['subSend'])){
            $email=$_POST['subscribe'];
            if($this->subscripcion($email)){
                echo "<script>alert('Te has subscrito correctamente');</script>";
            }else{
                echo "<script>alert('Ya te has subscrito');</script>";
>>>>>>> fbc44ede30a955de1d9eb27b2a54a2f07b0b1fcb
            }
        }
    }
}
