<?php
require_once('modelos/usuario.php');
require_once('modelos/propiedad.php');
require_once('modelos/contacto.php');

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

    public function insertarSuscripcion($correo)
    {
        return mysqli_query($this->conexion, "Insert into suscriptor values ('$correo')");
    }

    public function insertarMensaje($contacto)
    {
        return mysqli_query($this->conexion, "Insert into contacto (`nombre`, `email`, `mensaje`) values ('" . $contacto->getNombre() . "','" . $contacto->getCorreo() . "','" . $contacto->getMensaje() . "')");
    }

    public function comprobar($email, $contrasenya)
    {
        $result = mysqli_query($this->conexion, "Select * from usuario where email='$email' and contrasenya='$contrasenya'");
        if ($data = mysqli_fetch_assoc($result)) {
            return new Usuario($data['nombre'], $data['email'], $data['tipo']);
        }
        return false;
    }

    public function propiedadesDestacadas()
    {
        $propiedades = array();
        $result = mysqli_query($this->conexion, "Select * from propiedad where idusuario is null order by precio desc limit 3");
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
            $nombre = $data['nombre'];
            $tipo = $data['tipo'];
            $precio = $data['precio'];
            $descripcion = $data['descripcion'];
            $tamanyo = $data['tamanyo'];
            $habitaciones = $data['habitaciones'];
            $banyos = $data['banyos'];
            $garage = $data['garage'];
            $direccion = $data['direccion'];
            $estado = $data['estado'];
            $imagen = $data['imagen'];
            $comprado = $data['idusuario'] != null ? true : false;
            array_push($propiedades, new Propiedad($nombre, $tipo, $precio, $descripcion, $tamanyo, $habitaciones, $banyos, $garage, $direccion, $estado, $imagen, $comprado, $id));
        }
        return $propiedades;
    }

    public function propiedadesPopulares()
    {
        $propiedadesPopulares = array();
        $result = mysqli_query($this->conexion, "Select * from propiedad where idusuario is null and estado = 'Venta' order by precio desc limit 3");
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
            $nombre = $data['nombre'];
            $tipo = $data['tipo'];
            $precio = $data['precio'];
            $descripcion = $data['descripcion'];
            $tamanyo = $data['tamanyo'];
            $habitaciones = $data['habitaciones'];
            $banyos = $data['banyos'];
            $garage = $data['garage'];
            $direccion = $data['direccion'];
            $estado = $data['estado'];
            $imagen = $data['imagen'];
            $comprado = $data['idusuario'] != null ? true : false;
            array_push($propiedadesPopulares, new Propiedad($nombre, $tipo, $precio, $descripcion, $tamanyo, $habitaciones, $banyos, $garage, $direccion, $estado, $imagen, $comprado, $id));
        }
        return $propiedadesPopulares;
    }

    public function tiposPropiedad()
    {
        $tipos = array();
        $result = mysqli_query($this->conexion, "Select * from propiedad group by tipo");
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($tipos, $data['tipo']);
        }
        return $tipos;
    }

    public function obtenerPropiedades($filtro)
    {
        if ($filtro == null) {
            $result = mysqli_query($this->conexion, "Select * from propiedad");
        } else {
            $sql = "Select * from propiedad where ";
            $cantF = 0;
            if (isset($filtro['key'])) {
                $sql .= $cantF != 0 ? "and " : "";
                $sql .= "nombre like '%" . $filtro['key'] . "%' ";
                $cantF++;
            }
            if (isset($filtro['tipo'])) {
                $sql .= $cantF != 0 ? "and " : "";
                $sql .= "tipo = '" . $filtro['tipo'] . "' ";
                $cantF++;
            }
            if (isset($filtro['precio1'])) {
                $sql .= $cantF != 0 ? "and " : "";
                $sql .= "precio >= '" . $filtro['precio1'] . "' ";
                $cantF++;
            }
            if (isset($filtro['precio2'])) {
                $sql .= $cantF != 0 ? "and " : "";
                $sql .= "precio <= '" . $filtro['precio2'] . "' ";
                $cantF++;
            }
            $result = mysqli_query($this->conexion, $sql);
        }
        $propiedades = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
            $nombre = $data['nombre'];
            $tipo = $data['tipo'];
            $precio = $data['precio'];
            $descripcion = $data['descripcion'];
            $tamanyo = $data['tamanyo'];
            $habitaciones = $data['habitaciones'];
            $banyos = $data['banyos'];
            $garage = $data['garage'];
            $direccion = $data['direccion'];
            $estado = $data['estado'];
            $imagen = $data['imagen'];
            $comprado = $data['idusuario'] != null ? true : false;
            array_push($propiedades, new Propiedad($nombre, $tipo, $precio, $descripcion, $tamanyo, $habitaciones, $banyos, $garage, $direccion, $estado, $imagen, $comprado, $id));
        }
        return $propiedades;
    }

    public function insertarSubscriptor($email)
    {
        return mysqli_query($this->conexion, "Insert into subscriptor (email) values ('$email')");
    }

    public function obtenerPropiedad($id)
    {
        $result = mysqli_query($this->conexion, "Select * from propiedad where id=$id");
        if ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
            $nombre = $data['nombre'];
            $tipo = $data['tipo'];
            $precio = $data['precio'];
            $descripcion = $data['descripcion'];
            $tamanyo = $data['tamanyo'];
            $habitaciones = $data['habitaciones'];
            $banyos = $data['banyos'];
            $garage = $data['garage'];
            $direccion = $data['direccion'];
            $estado = $data['estado'];
            $imagen = $data['imagen'];
            $comprado = $data['idusuario'] != null ? true : false;
            return new Propiedad($nombre, $tipo, $precio, $descripcion, $tamanyo, $habitaciones, $banyos, $garage, $direccion, $estado, $imagen, $comprado, $id);
        }
    }

    public function actualizarPropiedad($propiedad, $usuario)
    {
        echo "Update propiedad set idusuario=$usuario where id= $propiedad";
        return mysqli_query($this->conexion, "Update propiedad set idusuario='$usuario' where id= $propiedad");
    }
}
