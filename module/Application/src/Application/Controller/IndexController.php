<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\Formularios;
use Application\Model\Entity\Procesa;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class IndexController extends AbstractActionController
{
    public $dbadpter;
    public function indexAction()
    {
        $form = new Formularios('registro');
        $url=$this->getRequest()->getBaseUrl();
        return new ViewModel(array("url"=>$url,"form"=>$form));
    }
    
    public function registraAction(){
        $form = new Formularios('registro');
        $request = $this->getRequest();
        if($request->isPost())
            $procesar = new Procesa();
            $form->setInputFilter($procesar->getInputFilter());
            $form->setData($request->getPost());
            
            if($form->isValid())
            {
                $procesar->exchangeArray ($form->getData ());
     
                return $this->redirect()->toRoute('application');
            }
        return new ViewModel();
    }
    
    //metodo creado para traer datos desde el controlador
    public function resultAction(){
        $this->dbadpter = $this->getServiceLocator()->get('Zend\Db\Adapter');
        //var_dump($this->dbadpter);
        $result = $this->dbadpter->query("select * from sofve_usuarios",  Adapter::QUERY_MODE_EXECUTE);
        $datos = $result->toArray();
        return new ViewModel(array('titulo'=>'conectandonos usando result set','datos'=>$datos));
    }
    
    public function sqlAction()
    {
        $this->dbadpter = $this->getServiceLocator()->get('Zend\Db\Adapter');
         $sql = new Sql($this->dbadpter);
        $select = $sql->select()
                      ->from("sofve_usuarios")
                      ->order('id_usuarios desc');
          $selectString = $sql->getSqlStringForSqlObject($select);
        //echo $selectString;
        $result= $this->dbadpter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
        $datos=$result->toArray();
        return new ViewModel(array("titulo"=>"Conectarse a MySQL usando sql","datos"=>$datos));
    
    }
    
    
    //
    
    //
    
}
