<?php

/*
 * Copyright (C) 2015 hieun
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Application\Entity\Mongo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Description of Users
 *
 * @author hieun
 */

/**
 * @ODM\Document(db="social",collection="users")
 */
class Users {

    /**
     *
     * @var id
     * @ODM\Id 
     * @ODM\Index(unique=true, order="asc")
     */
    private $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    private $username;
    
    
    


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }
}
