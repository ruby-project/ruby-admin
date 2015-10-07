<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupsAcl
 *
 * @ORM\Table(name="groups_acl", indexes={@ORM\Index(name="FK_GROUP_ACL_ACL_idx", columns={"acl_id"})})
 * @ORM\Entity
 */
class GroupsAcl extends \Application\Model\Entity
{
    /**
     * @var \Application\Entity\Acl
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Acl")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acl_id", referencedColumnName="id")
     * })
     */
    private $acl;

    /**
     * @var \Application\Entity\Groups
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Application\Entity\Groups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;


}

