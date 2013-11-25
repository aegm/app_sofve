<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $this->initAcl($e);
        $e->getApplication()->getEventManager()->attach('route', array($this, 'checkAcl'));
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function initAcl( MvcEvent $e ){        
        $acl = new \Zend\Permissions\Acl\Acl();
        //agregamos los roles
        //$roles = $this->getDbRoles($e);
        $roles = include __DIR__ . '/config/module.acl.roles.php';
        $allResources = array();
        foreach($roles as $roles => $resources){
            $role = new \Zend\Permissions\Acl\Role\GenericRole($roles);
            $acl->addRole($role);
            //migramos los recursos
            $allResources = array_merge($resources,$allResources);
        
            //adicionamos los recursos 
            foreach ($resources as $resource){
                if(!$acl->hasResource($resource))
                    $acl->addResource (new \Zend\Permissions\Acl\Resource\GenericResource ($resource));
            }
            
            //adicionamos las restriciones
            foreach ($allResources as $resource){
                $acl ->allow($role,$resource);
            }
            
        }
            //testing
            //var_dump($acl->isAllowed('users','admin'));
            //true;
            //setting to view
            $e->getViewModel()->acl = $acl;  
    }
    public function checkAcl(MvcEvent $e) {
    $route = $e -> getRouteMatch() -> getMatchedRouteName();
    //you set your role
    $userRole = 'users';
    if (!$e->getViewModel()->acl->isAllowed($userRole, $route)) {
        $response = $e -> getResponse();
        $response -> getHeaders() -> addHeaderLine('Location', $e -> getRequest() -> getBaseUrl() . '/404');   
        $response -> setStatusCode(404);
     
 
    }
    }
    public function getDbRoles(MvcEvent $e){
    
    // I take it that your adapter is already configured    
    $dbAdapter = $e->getApplication()->getServiceManager()->get('Zend\Db\Adapter');
    
    $results = $dbAdapter->query('SELECT * FROM sofve_post');
    // making the roles array
    $roles = array();
    print_r($results);
    
    die();
    foreach($results as $result){
       // $roles[$result['user_role']][] = $result['resource'];
       echo $result['usuario'];
       die();
    }
    
    return $roles;
}
}
