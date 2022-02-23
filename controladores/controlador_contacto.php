<?php
require_once("conexion/conexionMySQL.php");

class ControladorContacto
{

    private $con;

    function __construct()
    {
        $this->con = new MySQLConexion("localhost", "root", "", "web2");
        session_start();
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
            $mensaje=$this->login($email, $pass);
        }
    }

    public function peticionRegistro()
    {
        if (isset($_POST['registro'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['mail'];
            $pass = $_POST['password'];
            $usuario=new Usuario($nombre,$email);
            global $mensaje;
            $mensaje=$this->registro($usuario, $pass);
        }
    }
}
