<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Contacto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Contacto\Form\Formularios;
use Contacto\Model\Entity\Procesa;

class ContactoController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new Formularios('contacto');
        return new ViewModel(array("titulo"=>"Formularios en ZF2","form"=>$form,'url'=>$this->getRequest()->getBaseUrl()));
    }
}
