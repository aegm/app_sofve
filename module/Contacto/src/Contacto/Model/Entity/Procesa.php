<?php

/**
 * @author Angel Gonzalez
 * @copyright 2013
 */
namespace Contacto\Model\Entity;
class Procesa
{
    private $nombre;
    private $apellido;
    private $telefono;  
    private $correo;
    private $comentario;


    public function __construct($datos=array())
    {
        $this->nombre=$datos["nombre"];
        $this->apellido=$datos["apellido"];
        $this->correo=$datos["email"];
        $this->telefono=$datos["telefono"];
        $this->comentario=$datos["comentario"];
    }
    public function getData()
    {
        $array=array($this->nombre,$this->correo,  $this->apellido, $this->telefono, $this->comentario);
        return $array;
    }
}

?>