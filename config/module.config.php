<?php
return array(
    'zf-apigility' => array(
        'db-connected' => array(
            'ZF\Apigility\Example\Rest\Status\StatusResource' => array(
                'adapter_name'     => 'Db\Status',
                'table_name'       => 'status',
                'identifier_name'  => 'id',
                'hydrator_name'    => 'ClassMethods',
                'entity_class'     => 'ZF\Apigility\Example\Rest\Status\StatusEntity',
                'collection_class' => 'ZF\Apigility\Example\Rest\Status\StatusCollection',
            ),
        ),
    ),
    'zf-rest' => array(
        'ZF\Apigility\Example\Rest\Status\Controller' => array(
            'listener'                => 'ZF\Apigility\Example\Rest\Status\StatusResource',
            'collection_name'         => 'status',
            'page_size'               => '10',
            'route_name'              => 'zf-apigility-example.rest.status',
            'resource_http_methods'   => array('GET', 'PATCH', 'PUT'),
            'collection_http_methods' => array('GET', 'POST'),
        ),
    ),
    'zf-rpc' => array(
        'ZF\Apigility\Example\Rpc\HelloWorld\Controller' => array(
            'http_methods' => array('GET'),
            'route_name'   => 'zf-apigility-example.rpc.hello-world',
            'callable'     => 'ZF\Apigility\Example\Rpc\HelloWorld\HelloWorldController::hello'
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ZF\Apigility\Example\Rpc\HelloWorld\Controller' => 'HalJson',
            'ZF\Apigility\Example\Rest\Status\Controller'    => 'HalJson',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ZF\Apigility\Example\Rest\Status\StatusEntity' => array(
                'hydrator'   => 'ClassMethods',
                'route_name' => 'zf-apigility-example.rest.status',
            ),
            'ZF\Apigility\Example\Rest\Status\StatusCollection' => array(
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
                        'controller' => 'ZF\Apigility\Example\Rpc\HelloWorld\Controller',
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
                        'controller' => 'ZF\Apigility\Example\Rest\Status\Controller',
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
