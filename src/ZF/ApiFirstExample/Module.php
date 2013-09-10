<?php

namespace ZF\ApiFirstExample;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Math\Rand;
use ZF\ApiFirst\ApiFirstModuleInterface;

class Module implements ApiFirstModuleInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../../config/module.config.php';
    }

    public function onBootstrap($e)
    {
        $app    = $e->getApplication();
        $events = $app->getEventManager();
        $shared = $events->getSharedManager();

        // Create a sha1-like identifier.
        $shared->attach('ZF\ApiFirstExample\Rest\Status\StatusResource', 'create', function ($e) {
            $data = $e->getParam('data');
            $data['id'] = Rand::getString(32, 'abcdef0123456789');
        }, 100);
    }
}
