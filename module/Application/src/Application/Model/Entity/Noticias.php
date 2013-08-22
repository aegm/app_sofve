<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Model\Entity;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

class Noticias extends TableGateway
{
    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('sofve_post', $adapter, $databaseSchema,$selectResultPrototype);
    }
   
   public function getNoticias(){
       $datos = $this->select();
       return $datos->toArray();
   }
}
