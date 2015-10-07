<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ruby\Services;

use Zend\ServiceManager\ServiceLocatorInterface;
use BjyProfiler\Db\Adapter\ProfilingAdapter;
use Zend\ServiceManager\FactoryInterface;

/**
 * Description of DbProfilerFactory
 *
 * @author hieun
 */
class DbProfilerFactory implements FactoryInterface {

//put your code here
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $adapter = new ProfilingAdapter(array(
            'driver' => 'pdo',
            'dsn' => 'mysql:dbname=radius;host=127.0.0.1',
            'database' => 'radius',
            'username' => 'root',
            'password' => '1234',
            'hostname' => '127.0.0.1',
        ));

        if (php_sapi_name() == 'cli') {
            $logger = new Zend\Log\Logger();
// write queries profiling info to stdout in CLI mode
            $writer = new Zend\Log\Writer\Stream('php://output');
            $logger->addWriter($writer, Zend\Log\Logger::DEBUG);
            $adapter->setProfiler(new \BjyProfiler\Db\Profiler\LoggingProfiler($logger));
        } else {
            $adapter->setProfiler(new \BjyProfiler\Db\Profiler\Profiler());
        }
        if (isset($dbParams['options']) && is_array($dbParams['options'])) {
            $options = $dbParams['options'];
        } else {
            $options = array();
        }
        $adapter->injectProfilingStatementPrototype($options);
        return $adapter;
    }

}
