<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Apigility\Example;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Math\Rand;
use ZF\Apigility\ApigilityModuleInterface;

class Module implements ApigilityModuleInterface
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
        return include __DIR__ . '/../../../../config/module.config.php';
    }

    public function onBootstrap($e)
    {
        $app    = $e->getApplication();
        $events = $app->getEventManager();
        $shared = $events->getSharedManager();

        // Create a sha1-like identifier.
        $shared->attach('ZF\Apigility\Example\V1\Rest\Status\StatusResource', 'create', function ($e) {
            $data = $e->getParam('data');
            $data['id'] = Rand::getString(32, 'abcdef0123456789');
        }, 100);
    }
}
