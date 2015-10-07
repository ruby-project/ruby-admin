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

namespace Ruby\Services;

use Zend\Navigation\Service\AbstractNavigationFactory;
use Zend\Navigation\Exception;

/**
 * Description of NavigationFactory
 *
 * @author hieun
 */
class NavigationFactory extends AbstractNavigationFactory {

    //put your code here
    protected function getName() {
        return 'frontend';
    }

    protected function getPages(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {


        $doctrine = $this->getDoctrine($serviceLocator);


        $application = $serviceLocator->get('Application');
        $routeMatch = $application->getMvcEvent()->getRouteMatch();
        if (null === $routeMatch) {
            throw new Exception\InvalidArgumentException(sprintf(
                    'Failed to find a route'
            ));
        }
        $params = $routeMatch->getParams();
        $controllerClass = $params['controller'];
        $moduleNamespace = substr($controllerClass, strpos($controllerClass, '\\'));
        $moduleNamespace = substr($moduleNamespace, 1);
        $moduleNamespace = strtolower(substr($moduleNamespace, 0, strpos($moduleNamespace, '\\')));
        //$document = $this->getDocument($serviceLocator);


        if (null === $this->pages) {
            $configuration = $serviceLocator->get('Config');

            if (!isset($configuration['navigation'])) {
                throw new Exception\InvalidArgumentException('Could not find navigation configuration key');
            }
            if (!isset($configuration['navigation'][$moduleNamespace])) {
                throw new Exception\InvalidArgumentException(sprintf(
                        'Failed to find a navigation container by the name "%s"', $moduleNamespace
                ));
            }
            $pages = array();
            if (!isset($configuration['navagation'][$moduleNamespace]['fromdb'])) {
                $pages = $this->getPagesFromConfig($configuration['navigation'][$moduleNamespace]);
            } else {
                
            }



            $this->pages = $this->preparePages($serviceLocator, $pages);
        }
        return $this->pages;
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getDoctrine(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {

        return $serviceLocator->get('doctrine.entitymanager.orm_default');
    }

    /**
     * 
     * @return \Doctrine\ODM\MongoDB\DocumentManager
     */
    public function getDocument(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return ($serviceLocator->has('doctrine.documentmanager.odm_default'))?$serviceLocator->get('doctrine.documentmanager.odm_default'):'';
    }

    private function getPagesFromDb($options = array()) {

        $rp = $document->getRepository('Application\Entity\Mongo\Categories');
    }

}
