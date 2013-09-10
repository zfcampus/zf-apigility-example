<?php
return array(
    'zf-api-first' => array(
        'db-connected' => array(
            'ZF\ApiFirstExample\StatusResource' => array(
                'adapter_name'     => 'Db\Status',
                'table_name'       => 'status',
                'identifier_name'  => 'id',
                'hydrator_name'    => 'ClassMethods',
                'entity_class'     => 'ZF\ApiFirstExample\StatusEntity',
                'collection_class' => 'ZF\ApiFirstExample\StatusCollection',
            ),
        ),
    ),
    'zf-rest' => array(
        'ZF\ApiFirstExample\Controller\Status' => array(
            'listener'                => 'ZF\ApiFirstExample\StatusResource',
            'collection_name'         => 'status',
            'page_size'               => '10',
            'route_name'              => 'zf-api-first-example.status',
            'resource_http_methods'   => array('GET', 'PATCH', 'PUT'),
            'collection_http_methods' => array('GET', 'POST'),
        ),
    ),
    'zf-rpc' => array(
        'ZF\ApiFirstExample\HelloWorld' => array(
            'http_methods' => array('GET'),
            'route_name'   => 'zf-api-first-example.hello',
            'callable'     => 'ZF\ApiFirstExample\Controller\MyRpcController::hello'
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ZF\ApiFirstExample\HelloWorld'        => 'HalJson',
            'ZF\ApiFirstExample\Controller\Status' => 'HalJson',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ZF\ApiFirstExample\StatusEntity' => array(
                'hydrator'   => 'ClassMethods',
                'route_name' => 'zf-api-first-example.status',
            ),
            'ZF\ApiFirstExample\StatusCollection' => array(
                'is_collection' => true,
                'route_name'    => 'zf-api-first-example.status',
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
            'zf-api-first-example.hello' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api/example/hello',
                    'defaults' => array(
                        'controller' => 'ZF\ApiFirstExample\HelloWorld',
                    ),
                ),
            ),
            'zf-api-first-example.status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/example/status[/:id]',
                    'constraints' => array(
                        'id' => '[a-f0-9]{32}',
                    ),
                    'defaults' => array(
                        'controller' => 'ZF\ApiFirstExample\Controller\Status',
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
