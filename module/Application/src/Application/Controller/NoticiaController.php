<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class NoticiaController extends AbstractActionController
{
    public function indexAction() {
        $url=$this->getRequest()->getBaseUrl();
         return new ViewModel(array('url'=>$url));
    }
}