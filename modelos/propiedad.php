<?php
class Propiedad
{
    private $id;
    private $nombre;
    private $tipo;
    private $precio;
    private $descripcion;
    private $tamanyo;
    private $habitaciones;
    private $banyos;
    private $garage;
    private $direccion;
    private $estado;
    private $imagen;
    private $comprado;


    public function __construct($nombre, $tipo, $precio, $descripcion, $tamanyo, $habitaciones, $banyos, $garage, $direccion, $estado, $imagen, $comprado, $id = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->tamanyo = $tamanyo;
        $this->habitaciones = $habitaciones;
        $this->banyos = $banyos;
        $this->garage = $garage;
        $this->direccion = $direccion;
        $this->estado = $estado;
        $this->imagen = $imagen;
        $this->comprado = $comprado;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getTamanyo()
    {
        return $this->tamanyo;
    }

    public function setTamanyo($tamanyo)
    {
        $this->tamanyo = $tamanyo;
    }

    public function getHabitaciones()
    {
        return $this->habitaciones;
    }

    public function setHabitaciones($habitaciones)
    {
        $this->habitaciones = $habitaciones;
    }

    public function getBanyos()
    {
        return $this->banyos;
    }

    public function setBanyos($banyos)
    {
        $this->banyos = $banyos;
    }

    public function getGarage()
    {
        return $this->garage;
    }

    public function setGarage($garage)
    {
        $this->garage = $garage;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getComprado()
    {
        return $this->comprado;
    }

    public function setComprado($comprado)
    {
        $this->comprado = $comprado;
    }
}
