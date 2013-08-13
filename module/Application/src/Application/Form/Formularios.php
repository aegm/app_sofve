<?php
namespace Application\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;

use Zend\Captcha;
use Zend\Form\Factory;

class Formularios extends Form
{
    public function __construct($name = null, $options = array()) {
        
        parent::__construct($name);
        $factory = new Factory();  
        
        $correo = $factory->createElement(array(
            'type'=>'Zend\Form\Element\Email',
            'name'=>'email',
            'options'=>array(
                 'label' => 'Correo',
            ),
            'attributes' => array(
                'class' => 'input'
            ),  
        ));
        
        $this->add($correo);
    }
}
?>
