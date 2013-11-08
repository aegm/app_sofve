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
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions; 

class ContactoController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new Formularios('contacto');
        return new ViewModel(array("titulo"=>"Formularios en ZF2","form"=>$form,'url'=>$this->getRequest()->getBaseUrl()));
    }
    
    public function recibeAction(){
        $request = $this->getRequest();
        if($request->isPost())
            $datos = $this->request->getPost();
            
        $procesa = new Procesa($datos);
        $datos = $procesa->getData();
        
        //foreach ($datos as $valor)
        //print_r($datos);
        //die();
        $message = new Message();
        $message->addTo('info@sofve.com')
                ->addFrom($datos[1])
                ->setSubject('Formulario de Contacto')
                ->setBody($datos[4]);

        // Setup SMTP transport using LOGIN authentication
        $transport = new SmtpTransport();
        $options   = new SmtpOptions(array(
            'name'              => 'www.sofve.com',
            'host'              => 'hercules.facilwebhercules.com',
            'port' => '465',
            'connection_class'  => 'login',
            'connection_config' => array(
                'username' => 'info@sofve.com',
                'password' => 'angeledugo120185',
                'ssl'=>'ssl'
            ),
        ));
        $transport->setOptions($options);
        $transport->send($message);
        
        return new ViewModel(array("data"=>$datos));
    }
}
