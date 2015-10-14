<?php

namespace Ruby\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="routes")
 * @ORM\Entity
 */
class Router {
	
	/**
	 *
	 * @var integer 
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 * 
	 */
	private $id;
	
	/**
	 *
	 * @var string 
	 * @ORM\Column(name="name", type="string", length=255, nullable=true)
	 */
	private $name;
}