<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modules
 *
 * @ORM\Table(name="modules", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"}), @ORM\UniqueConstraint(name="route_name_UNIQUE", columns={"route_name"})})
 * @ORM\Entity
 */
class Modules extends \Application\Model\Entity
{
    /**
     * @var string
     *
     * @ORM\Column(name="route_name", type="string", length=150, nullable=true)
     */
    private $routeName;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;


}

