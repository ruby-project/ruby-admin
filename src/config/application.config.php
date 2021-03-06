<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array (
		'service_manager' => array (
				'abstract_factories' => array (
						'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
						'Zend\Log\LoggerAbstractServiceFactory' 
				),
				'factories' => array (
						'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
						'Zend\Db\Adapter\Adapter' => 'Ruby\Services\DbProfilerFactory',
						'my_redis_alias' => 'Ruby\Services\RedisDoctrineFactory',
						'navigation' => 'Ruby\Services\NavigationFactory',
						'layout' => 'Ruby\Services\LayoutFatory' 
				) 
		),
		'translator' => array (
				'locale' => 'vi_VN',
				'translation_file_patterns' => array (
						array (
								'type' => 'phpArray',
								'base_dir' => __DIR__ . '/../language' . __NAMESPACE__,
								'pattern' => '%s.php' 
						) 
				) 
		),
		'controllers' => array (
				'invokables' => array (
						'Application\Controller\Index' => 'Application\Controller\IndexController' 
				) 
		),
		'view_manager' => array (
				'display_not_found_reason' => true,
				'display_exceptions' => true,
				'doctype' => 'HTML5',
				'not_found_template' => 'error/404',
				'exception_template' => 'error/index',
				'template_map' => array (
						'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
						'backend' => __DIR__ . '/../view/layout/backend.phtml',
						'frontend' => __DIR__ . '/../view/layout/frontend.phtml',
						'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
						'error/404' => __DIR__ . '/../view/error/404.phtml',
						'error/index' => __DIR__ . '/../view/error/index.phtml' 
				),
				'template_path_stack' => array (
						__DIR__ . '/../view' 
				) 
		),
		
		// Placeholder for console routes
		'console' => array (
				'router' => array (
						'routes' => array (
								'user-reset-password' => array (
										'options' => array (
												'route' => 'user resetpassword [--verbose|-v] <userEmail>',
												'defaults' => array (
														'controller' => 'Application\Controller\Index',
														'action' => 'resetpassword' 
												) 
										) 
								) 
						) 
				) 
		) 
);
