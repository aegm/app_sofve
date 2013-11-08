<?php

return array(
    'controllers'=>array(
        'invokables'=>array(
            'Contacto\Controller\Contacto'=>'Contacto\Controller\ContactoController'
         ),
     ),
     
     'router'=>array(
        'routes'=>array(
            'contacto'=>array(
                 'type'=>'Segment',
                    'options'=>array(
                        
                        'route' => '/contacto[/[:action]]',
                        'constraints' => array(
                                'action'  =>  '[a-zA-Z][a-zA-Z0-9_-]*',
                        ),
                        
                        'defaults'  =>  array(
                                'controller' => 'Contacto\Controller\Contacto',
                                'action'     => 'index'
                         
                        ),
                    ),
           ),
       ),
    ),
    
   //Cargamos el view manager
   'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'contacto/index/index' => __DIR__ . '/../view/contacto/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
          'contacto' =>  __DIR__ . '/../view',
        ),
    ), 
 );                               