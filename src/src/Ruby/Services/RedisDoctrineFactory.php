<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ruby\Services;

/**
 * Description of RedisDoctrineFactory
 *
 * @author hieun
 */
class RedisDoctrineFactory implements \Zend\ServiceManager\FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        $redis = new \Redis();

        $redis->connect('10.0.0.2', 6379);
        //$config = $serviceLocator->get('Configuration');
        $redisCache = new \Doctrine\Common\Cache\RedisCache();
        $redisCache->setRedis($redis);
        return $redis;
    }

}
