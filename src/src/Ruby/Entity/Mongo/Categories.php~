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
use Application\Entity\Mongo\Users;

/**
 * Description of Categories
 *
 * @author hieun
 */

/**
 * @ODM\Document(db="social",collection="categories")
 */
class Categories {

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
     * @var int
     * @ODM\Field(type="boolean")
     */
    private $menu;

    /**
     * @var int
     * @ODM\Field(type="string")
     */
    private $description;

    /**
     * @var int
     * @ODM\Field(type="string")
     */
    private $content;

    /**
     * @var \Application\Entity\Mongo\Categories
     * @ODM\ReferenceOne(targetDocument="Application\Entity\Mongo\Categories", cascade={"persist"})
     * @ODM\Index(unique=true, order="asc")
     */
    private $parent;

    /**
     * @var \MongoDate
     * @ODM\Field(type="date")
     */
    private $created;

    /**
     * @var \MongoDate
     * @ODM\Field(type="date")
     */
    private $updated;

    /**
     * @ODM\ReferenceOne(targetDocument="Application\Entity\Mongo\Users", cascade={"persist"}) 
     * @ODM\Index(unique=true, order="asc")
     */
    private $author;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return self
     */
    public function setAlias($alias) {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Get alias
     *
     * @return string $alias
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Set parent
     *
     * @param Application\Entity\Mongo\Categories $parent
     * @return self
     */
    public function setParent(\Application\Entity\Mongo\Categories $parent) {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return Application\Entity\Mongo\Categories $parent
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * Set created
     *
     * @param date $created
     * @return self
     */
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return date $created
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param date $updated
     * @return self
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return date $updated
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Set author
     *
     * @param Application\Entity\Mongo\Users $author
     * @return self
     */
    public function setAuthor(\Application\Entity\Mongo\Users $author) {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return Application\Entity\Mongo\Users $author
     */
    public function getAuthor() {
        return $this->author;
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
     * Set menu
     *
     * @param boolean $menu
     * @return self
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
        return $this;
    }

    /**
     * Get menu
     *
     * @return boolean $menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }
}
