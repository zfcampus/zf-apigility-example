<?php
return array(
    'zf-rest' => array(
        'ZF\ApiFirstExample\StatusController' => array(
            'listener'             => 'ZF\ApiFirstExample\Listener',
            'resource_identifiers' => 'ZF\ApiFirst\StatusResource',
            'collection_name'      => 'status',
            'page_size'            => '10',
            'route_name'           => 'zf-api-first-status',
        ),
    ),
    'zf-rpc' => array(
        'ZF\ApiFirstExample\HelloWorld' => array(
            'http_options' => array('GET'),
            'route_name'   => 'zf-api-first-hello',
            'callable'     => 'ZF\ApiFirstExample\Controller\MyRpcController::hello'
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ZF\ApiFirstExample\HelloWorld'       => 'HalJson',
            'ZF\ApiFirstExample\StatusController' => 'HalJson',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ZF\ApiFirstExample\Status' => array(
                'hydrator'   => 'ClassMethods',
                'route_name' => 'zf-api-first-status',
            ),
            'ZF\ApiFirstExample\Statuses' => array(
                'is_collection' => true,
                'route_name'    => 'zf-api-first-status',
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
            'zf-api-first-hello' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api/example/hello',
                    'defaults' => array(
                        'controller' => 'ZF\ApiFirstExample\HelloWorld',
                    ),
                ),
            ),
            'zf-api-first-status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/example/status[/:id]',
                    'constraints' => array(
                        'id' => '[a-f0-9]{32}',
                    ),
                    'defaults' => array(
                        'controller' => 'ZF\ApiFirstExample\StatusController',
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
