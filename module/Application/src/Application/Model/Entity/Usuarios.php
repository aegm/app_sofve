<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Model\Entity;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
//use Zend\Db\ResultSet\ResultSet;

class  Usuarios extends TableGateway
{
    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('sofve_usuarios', $adapter, $databaseSchema,$selectResultPrototype);
    }
     public function addUsr($data=array())
        {
          $this->insert($data);
        }
}

