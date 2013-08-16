<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Model\Entity;
// Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Procesa implements InputFilterAwareInterface
{
    private $correo;
    protected $inputFilter;


     public function exchangeArray($data)
    {
        $this->correo     = (isset($data['email']))     ? $data['email']     : null;
        
    }
    
    public function getInputFilter()
    {
        if(!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name'=>'email',
                'required'=>true
            )));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }
    
}
?>
