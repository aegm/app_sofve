<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use Application\Model\Entity\Noticias;

class NoticiaController extends AbstractActionController
{
    public $dbadapter;
	public function indexAction() {
		$this->dbadapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
		$noti = new Noticias($this->dbadapter);
		$n = $noti->getNoticias();
		$url=$this->getRequest()->getBaseUrl();
        return new ViewModel(array('url'=>$url));
    }

	public function leerAction(){

		$this->dbadapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
		$valor = $this->params()->fromRoute(id);
		$noti = new Noticias($this->dbadapter);
		$n = $noti->getNoticiasById($valor);

		return new viewModel(array('valor'=>$n));
	}


}