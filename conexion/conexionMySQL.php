<?php
require_once('modelos/usuario.php');

class MySQLConexion
{
    private $conexion;

    function __construct($servidor, $user, $contrasenya, $basedatos)
    {
        $this->conexion = mysqli_connect($servidor, $user, $contrasenya, $basedatos);
    }

    public function insertarUsuario($usuario, $contrasenya)
    {
         return mysqli_query($this->conexion, "Insert into usuario values ('" . $usuario->getNombre() . "', '" . $usuario->getEmail() . "','" . $usuario->getTipo() . "', '$contrasenya')");
    }

    public function comprobar($email, $contrasenya)
    {
        $result = mysqli_query($this->conexion, "Select * from usuario where email='$email' and contrasenya='$contrasenya'");
        if ($data = mysqli_fetch_assoc($result)) {
            return new Usuario($data['nombre'], $data['email'], $data['tipo']);
        }
        return false;
    }
}
