<?php
    namespace Contacto\Form;
    use Zend\Captcha\AdapterInterface as CaptchaAdapter;
    use Zend\Form\Element;
    use Zend\Form\Form;
    use Zend\Form\Factory;
    
    
    
    class Formulario extends Form
    {
     
        public function __construct($name = null)
        {
            parent::__construct($name);
            
            $this->add(array(
                'name'=> 'Nombre',
                'options'=>array(
                    'label'=>'Nombre de contacto',
                ),
                'type'=>'text'
            ));
        }
    }
?>
