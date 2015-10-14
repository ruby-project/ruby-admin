<?php

/*
 * To change this license header, choose License Headers in Project Properties. To change this template file, choose Tools | Templates and open the template in the editor.
 */
namespace Ruby\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Description of ApplicationController
 *
 * @author hieun
 */
class CoreController extends AbstractActionController {
	private $creator;
	
	/**
	 *
	 * @return \Doctrine\ORM\EntityManager Description
	 */
	public function getDoctrine() {
		return $this->getServiceLocator ()->get ( 'doctrine.entitymanager.orm_default' );
	}
	
	/**
	 *
	 * @return \Doctrine\ODM\MongoDB\DocumentManager
	 */
	public function getDocument() {
		return ($this->getServiceLocator ()->has ( 'doctrine.documentmanager.odm_default' )) ? $this->getServiceLocator ()->get ( 'doctrine.documentmanager.odm_default' ) : '';
	}
	public function getCreator() {
		return $this->creator;
	}
}
