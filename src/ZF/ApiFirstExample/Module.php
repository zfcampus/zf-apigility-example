<?php

namespace ZF\ApiFirstExample;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
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

    public function getServiceConfig()
    {
        return array('factories' => array(
            'ZF\ApiFirstExample\TableGateway' => function ($services) {
                $adapter   = $services->get('Db\Status');
                $hydrators = $services->get('HydratorManager');
                $hydrator  = $hydrators->get('ClassMethods');
                $prototype = new HydratingResultSet($hydrator, new Status());

                return new TableGateway('status', $adapter, null, $prototype);
            },
            'ZF\ApiFirstExample\StatusResource' => function ($services) {
                $table = $services->get('ZF\ApiFirstExample\TableGateway');
                return new StatusResource($table);
            },
        ));
    }
}
