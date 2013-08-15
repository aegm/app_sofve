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

class IndexController extends AbstractActionController
{
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
            $procesa = new Procesa();
            $form->setInputFilter($procesa->getInputFilter());
            $form->setData($request->getPost());
            
            if($form->isValid())
            {
                
                $procesa->exchangeArray ($form->getData ());
                return $this->redirect()->toRoute('application');
            }
        
    }
}
