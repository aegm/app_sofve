<?php

return array(
    'controllers'=>array(
        'invokables'=>array(
            'Users\Controller\Users'=>'Users\Controller\UsersController',
            'Users\Controller\Formulario'=>'Users\Controller\FormularioController'
         ),
     ),
     
     'router'=>array(
        'routes'=>array(
            'users' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/users',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Users\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            //'route'    => '/[:controller[/:action]]',
                            'route'    => '/[:controller[/:action[/:id]]]',
                            //'route'    => '/[:controller[/:action[/:id/:id2]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            )
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
            'users/index/index' => __DIR__ . '/../view/users/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
          'users' =>  __DIR__ . '/../view',
        ),
    ), 
 );                     