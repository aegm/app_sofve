<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Users\Form\Formulario;

class FormularioController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function formularioAction()
    {
        $form=new Formulario("form");
        return new ViewModel(array("titulo"=>"Formularios en ZF2","form"=>$form,'url'=>$this->getRequest()->getBaseUrl()));
        //return new ViewModel();
    }
    public function recibeAction()
    {
       
    }
   
}

