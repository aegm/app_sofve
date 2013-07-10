<?php

/**
 * @author César Cancino
 * @copyright 2013
 */
namespace Users\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Captcha;
use Zend\Form\Factory;

class Formulario extends Form
{
    public function __construct($name = null)
     {
        parent::__construct($name);
        
        $this->add(array(
            'name' => 'nombre',
            'options' => array(
                'label' => 'Nombre Completo',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input'
            ),
        ));
        
        
         $factory = new Factory();

        $email = $factory->createElement(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'options' => array(
                'label' => 'Correo',
            ),
            'attributes' => array(
                
                'class' => 'input'
            ),
                ));

        $this->add($email);
        //botón enviar
       // $this->add(new Element\Csrf('security'));
        $this->add(array(
            'name' => 'send',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Enviar',
                'title' => 'Enviar'
            ),
        ));
        
        
     }
}

?>