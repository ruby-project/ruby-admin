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
 * Description of News
 *
 * @author hieun
 */

/**
 * @ODM\Document(db="social",collection="news")
 */
class News {

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
    private $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    private $alias;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    private $state;

    /**
     * @var int
     * @ODM\Field(type="boolean")
     */
    private $featured;

    /**
     * @var \Application\Entity\Mongo\Categories
     * @ODM\ReferenceOne(targetDocument="Application\Entity\Mongo\Categories", cascade={"persist"})
     * @ODM\Index(unique=true, order="asc")
     */
    private $category;

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
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return self
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Get alias
     *
     * @return string $alias
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set state
     *
     * @param int $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Get state
     *
     * @return int $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set featured
     *
     * @param boolean $featured
     * @return self
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;
        return $this;
    }

    /**
     * Get featured
     *
     * @return boolean $featured
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set category
     *
     * @param Application\Entity\Mongo\Categories $category
     * @return self
     */
    public function setCategory(\Application\Entity\Mongo\Categories $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Application\Entity\Mongo\Categories $category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
