<?php
return array(
    'zf-api-first' => array(
        'db-connected' => array(
            'ZF\ApiFirstExample\Rest\Status\StatusResource' => array(
                'adapter_name'     => 'Db\Status',
                'table_name'       => 'status',
                'identifier_name'  => 'id',
                'hydrator_name'    => 'ClassMethods',
                'entity_class'     => 'ZF\ApiFirstExample\Rest\Status\StatusEntity',
                'collection_class' => 'ZF\ApiFirstExample\Rest\Status\StatusCollection',
            ),
        ),
    ),
    'zf-rest' => array(
        'ZF\ApiFirstExample\Rest\Status\Controller' => array(
            'listener'                => 'ZF\ApiFirstExample\Rest\Status\StatusResource',
            'collection_name'         => 'status',
            'page_size'               => '10',
            'route_name'              => 'zf-api-first-example.rest.status',
            'resource_http_methods'   => array('GET', 'PATCH', 'PUT'),
            'collection_http_methods' => array('GET', 'POST'),
        ),
    ),
    'zf-rpc' => array(
        'ZF\ApiFirstExample\Rpc\HelloWorld\Controller' => array(
            'http_methods' => array('GET'),
            'route_name'   => 'zf-api-first-example.rpc.hello-world',
            'callable'     => 'ZF\ApiFirstExample\Rpc\HelloWorld\HelloWorldController::hello'
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ZF\ApiFirstExample\Rpc\HelloWorld\Controller' => 'HalJson',
            'ZF\ApiFirstExample\Rest\Status\Controller'    => 'HalJson',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ZF\ApiFirstExample\Rest\Status\StatusEntity' => array(
                'hydrator'   => 'ClassMethods',
                'route_name' => 'zf-api-first-example.rest.status',
            ),
            'ZF\ApiFirstExample\Rest\Status\StatusCollection' => array(
                'is_collection' => true,
                'route_name'    => 'zf-api-first-example.rest.status',
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
            'zf-api-first-example.rpc.hello-world' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api/example/hello',
                    'defaults' => array(
                        'controller' => 'ZF\ApiFirstExample\Rpc\HelloWorld\Controller',
                    ),
                ),
            ),
            'zf-api-first-example.rest.status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/example/status[/:id]',
                    'constraints' => array(
                        'id' => '[a-f0-9]{32}',
                    ),
                    'defaults' => array(
                        'controller' => 'ZF\ApiFirstExample\Rest\Status\Controller',
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
