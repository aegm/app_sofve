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
use Users\Model\Entity\Modelo;

class UsersController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function modelAction()
    {
        $model = new modelo("prueba desde el controller");
        $m = $model->getTexto();
        $a=$model->getArray();
        $d = $model->desdeelController();
        return new ViewModel(array("texto"=>$m,"array"=>$a,"desde"=>$d));
    }
    
    public function addUsers()
    {
        
    }
}
