<?php
class Usuario
{
    private $nombre;
    private $email;
    private $tipo;

    function __construct($nombre, $email, $tipo = "usuario")
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->tipo = $tipo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
}
