<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Ruby;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Resource\GenericResource;
use Zend\Permissions\Acl\Role\GenericRole;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $app = $e->getParam('application');
        
        $app->getEventManager()->attach('dispatch', array($this, 'setLayout'));
        $app->getEventManager()->attach('dispatch', array($this, 'setTemplate'), 1);
    }

    public function setLayout($e) {
    	echo "<pre>";
    	print_r(get_class_methods(get_class($e)));
    	echo "</pre>";
    	exit;
        $controller = $e->getTarget();
        
        $controllerClass = get_class($controller);
        $moduleNamespace = substr($controllerClass, strpos($controllerClass, '\\'));
        $moduleNamespace = substr($moduleNamespace, 1);
        $moduleNamespace = substr($moduleNamespace, 0, strpos($moduleNamespace, '\\'));
        $config = $e->getApplication()->getServiceManager()->get('config');
        
        
        if (isset($config['view_manager']['template_map'])) {
            $controller->layout(strtolower($moduleNamespace));
        }
    }
    public function setTemplate(MvcEvent $e) {
    	$result = $e->getResult();
    	$router = $e->getRouteMatch();
    	$params = $router->getParams();
    	if (isset($params['__NAMESPACE__']) && isset($params['__CONTROLLER__']) && isset($params['action'])) {
    		$controllerClass = $params['__NAMESPACE__'];
    		$moduleNamespace = substr($controllerClass, strpos($controllerClass, '\\'));
    		$moduleNamespace = substr($moduleNamespace, 1);
    		$moduleNamespace = substr($moduleNamespace, 0, strpos($moduleNamespace, '\\Controller'));
    		$templatePath = __DIR__;
    		$config = $e->getApplication()->getServiceManager()->get('config');
    		if (isset($config['view_manager']['template_map'])) {
    			$moduleNamespace = strtolower($moduleNamespace . '/' . $params['__CONTROLLER__']);
    			$templatePath = $templatePath . '/view/' . $moduleNamespace . '/' . $params['action'] . '.phtml';
    			$moduleNamespace = str_replace('\\', '/', $moduleNamespace);
    			$template = $moduleNamespace . '/' . $params['action'];
    			$config['view_manager']['template_map'][$template] = $templatePath;
    			$result->setTemplate($template);
    		}
    
    		//set Title;
    		if (isset($config['view_manager']['siteName'])) {
    			$siteName = $config['view_manager']['siteName'];
    		} else {
    			$siteName = $moduleNamespace;
    		}
    		$viewHelperManager = $e->getApplication()->getServiceManager()->get('viewHelperManager');
    		$headTitle = $viewHelperManager->get('headTitle');
    		$headTitle->setSeparator(' - ');
    		$headTitle->append($params['action']);
    		$headTitle->append($siteName);
    
    	}
    }

    public function getConfig() {

        return include __DIR__ . '/config/application.config.php';
    }

    public function getAutoloaderConfig() {

        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' .  __NAMESPACE__,
                ),
            ),
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                // This will overwrite the native navigation helper
                'navigation' => function(\Zend\View\HelperPluginManager $pm) {
                    // Setup ACL:
                    
                    $acl = new \Zend\Permissions\Acl\Acl();
                    $acl->addRole(new GenericRole('member'));
                    $acl->addRole(new GenericRole('admin'));
                    $acl->addResource(new GenericResource('mvc:admin'));
                    $acl->addResource(new GenericResource('mvc:community.account'));
                    $acl->allow('member', 'mvc:community.account');
                    $acl->allow('admin', null);

                    // Get an instance of the proxy helper
                    $navigation = $pm->get('Zend\View\Helper\Navigation');
                    
                    // Store ACL and role in the proxy helper:
                    $navigation->setAcl($acl)
                            ->setRole('member');

                    // Return the new navigation helper instance
                    return $navigation;
                }
            )
        );
    }

}
