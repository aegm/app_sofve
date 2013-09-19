<?php
namespace Contacto\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;

use Zend\Captcha;
use Zend\Form\Factory;

class Formularios extends Form {
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
                    'class' => 'form-control'
                    ),
                ));

        $this->add(array(
                'name' => 'send',
                'attributes' => array(
                    'type' => 'submit',
                    'value' => 'Enviar',
                    'title' => 'Enviar',
                    'class' => 'btn btn-danger'
                    ),
                ));

        $factory = new Factory();
        $apellido = $factory->createElement(array(
                'type' => 'text',
                'name' => 'apellido',
                'options' => array(
                    'label' => 'Apellido',
                    ),
                'attributes' => array(
                    'class' => 'form-control'
                    ),
                ));
        $this->add($apellido);

        $correo = $factory->createElement(array(
                'type' => 'Zend\Form\Element\Email',
                'name' => 'email',
                'options' => array(
                    'label' => 'Correo',
                    ),
                'attributes' => array(

                    'class' => 'form-control'
                    ),
                ));
        $this->add($correo);

        $telefono = $factory->createElement(array(
                'name' => 'telefono',
                'options' => array(
                    'label' => 'Nro de Telefono',
                    ),
                'attributes' => array(
                    'type' => 'tel',
                    'class' => 'form-control'
                    /*'required'=>'required',*/
                    // 'pattern'=>'^0[1-68]([-. ]?[0-9]{2}){4}$'
                    ),
                ));
        $this->add($telefono);

        $comentario = $factory->createElement(array(
                'name' => 'comentario',
                'type' => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'Comentario',
                    ),
                'attributes' => array(
                    'class' => 'form-control')
                ));

        $this->add($comentario);
    }
}

?>
