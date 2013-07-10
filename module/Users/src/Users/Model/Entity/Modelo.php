<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Users\Model\Entity;

class Modelo
{
    private $texto;
    private $array;
    private $desdeFuera;
    public function __construct($valor) 
    {
        $this->texto = "Hola desde el modelo";
        $this->array = array();
        $this->desdeFuera = $valor;
    }
    
    public function getTexto()
    {
        return $this->texto;
    }
    
    public function setTexto(){
        
    }
    
    private function cargaArray()
    {
        $a=array("manzana","pera","naranja");
        $comma_separated = implode(",", $a);
        array_push($this->array,$comma_separated);
    }
    
    public function getArray()
    {
        self::cargaArray();
        return $this->array;
    }
    
    public function desdeelController()
    {
        return $this->desdeFuera;
    }
    
}
