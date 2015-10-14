<?php
use Ruby\Creator\Model;

/**
 *
 * @author hieun
 *        
 */
class Creator implements Model {
	private $classname;
	private $config;
	public function __construct($classname, $config) {
		$this->classname = $classname;
	}
	public function configureForm() {
		
		if (empty ( $this->classname )) {
			throw new \Exception ();
		} elseif (empty ( $this->config )) {
			
		}
	}
	
	
}