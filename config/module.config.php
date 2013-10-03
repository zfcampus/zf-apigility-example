<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

return array(
    'zf-apigility' => array(
        'db-connected' => array(
            'ZF\Apigility\Example\V1\Rest\Status\StatusResource' => array(
                'controller_service_name' => 'ZF\Apigility\Example\V1\Rest\Status\Controller',
                'adapter_name'            => 'Db\Status',
                'table_name'              => 'status',
                'identifier_name'         => 'id',
                'hydrator_name'           => 'ClassMethods',
            ),
        ),
    ),
    'zf-rest' => array(
        'ZF\Apigility\Example\V1\Rest\Status\Controller' => array(
            'listener'                => 'ZF\Apigility\Example\V1\Rest\Status\StatusResource',
            'collection_name'         => 'status',
            'page_size'               => '10',
            'route_name'              => 'zf-apigility-example.rest.status',
            'resource_http_methods'   => array('GET', 'PATCH', 'PUT'),
            'collection_http_methods' => array('GET', 'POST'),
            'entity_class'            => 'ZF\Apigility\Example\V1\Rest\Status\StatusEntity',
            'collection_class'        => 'ZF\Apigility\Example\V1\Rest\Status\StatusCollection',
        ),
    ),
    'zf-rpc' => array(
        'ZF\Apigility\Example\V1\Rpc\HelloWorld\Controller' => array(
            'http_methods' => array('GET'),
            'route_name'   => 'zf-apigility-example.rpc.hello-world',
            'callable'     => 'ZF\Apigility\Example\V1\Rpc\HelloWorld\HelloWorldController::hello'
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ZF\Apigility\Example\V1\Rpc\HelloWorld\Controller' => 'Json',
            'ZF\Apigility\Example\V1\Rest\Status\Controller'    => 'HalJson',
        ),
        'accept-whitelist' => array(
            'ZF\Apigility\Example\V1\Rpc\HelloWorld\Controller' => array(
                'application/json',
                'application/*+json',
            ),
            'ZF\Apigility\Example\V1\Rest\Status\Controller'=> array(
                'application/json',
                'application/*+json',
            ),
        ),
        'content-type-whitelist' => array(
            'ZF\Apigility\Example\V1\Rpc\HelloWorld\Controller' => array(
                'application/json',
            ),
            'ZF\Apigility\Example\V1\Rest\Status\Controller'=> array(
                'application/json',
                'application/*+json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ZF\Apigility\Example\V1\Rest\Status\StatusEntity' => array(
                'hydrator'   => 'ClassMethods',
                'route_name' => 'zf-apigility-example.rest.status',
            ),
            'ZF\Apigility\Example\V1\Rest\Status\StatusCollection' => array(
                'is_collection' => true,
                'route_name'    => 'zf-apigility-example.rest.status',
            ),
        ),
    ),
    'db' => array(
        'adapters' =>array(
            'Db\Status' => array(
                'driver'   => 'Pdo_Sqlite',
                'database' => realpath(getcwd()) . '/data/db/status.db',
            ),
        )
    ),
    'router' => array(
        'routes' => array(
            'zf-apigility-example.rpc.hello-world' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api/example/hello',
                    'defaults' => array(
                        'controller' => 'ZF\Apigility\Example\V1\Rpc\HelloWorld\Controller',
                    ),
                ),
            ),
            'zf-apigility-example.rest.status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/example/status[/:id]',
                    'constraints' => array(
                        'id' => '[a-f0-9]{32}',
                    ),
                    'defaults' => array(
                        'controller' => 'ZF\Apigility\Example\V1\Rest\Status\Controller',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        ),
    ),
);
