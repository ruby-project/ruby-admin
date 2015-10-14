<?php

namespace Ruby\Services;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class LayoutFatory implements FactoryInterface {
	
	/**
	 * 
	 * @var Doctrine\ORM\EntityManager
	 */
	private $doctrine;
	
	
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		$this->doctrine = $serviceLocator->get('doctrine.entitymanager.orm_default');
		return $this;
	}
	
	public function getDoctrine($param) {
		
	}
	
}