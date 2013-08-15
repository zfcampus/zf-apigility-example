<?php
return array(
    'zf-rest' => array(
        'ZF\ApiFirstExample\StatusController' => array(
            'listener'             => 'ZF\ApiFirstExample\Listener',
            'resource_identifiers' => 'ZF\ApiFirst\StatusResource',
            'collection_name'      => 'status',
            'page_size'            => '10',
            'route_name'           => 'zf-api-first/status',
        ),
    ),
    'zf-rpc' => array(
        'ZF\ApiFirstExample\HelloWorld' => 'ZF\ApiFirstExample\Controller\MyRpcController::hello'
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ZF\ApiFirstExample\HelloWorld' => 'HalJson',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ZF\ApiFirstExample\Status' => array(
                'hydrator'   => 'ClassMethods',
                'route_name' => 'zf-api-first/status',
            ),
            'ZF\ApiFirstExample\Statuses' => array(
                'is_collection' => true,
                'route_name'    => 'zf-api-first/status',
            ),
        ),
    ),
    'db' => array('adapters' => array(
        'Db\Status' => array(
            'driver'   => 'Pdo_Sqlite',
            'database' => realpath(getcwd()) . '/data/db/status.db',
        ),
    )),
    'router' => array(
        'routes' => array(
            'zf-api-first' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api/example',
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'hello' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/hello',
                            'defaults' => array(
                                'controller' => 'ZF\ApiFirstExample\HelloWorld',
                            ),
                        ),
                    ),
                    'status' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/status[/:id]',
                            'constraints' => array(
                                'id' => '[a-f0-9]{32}',
                            ),
                            'defaults' => array(
                                'controller' => 'ZF\ApiFirstExample\StatusController',
                            ),
                        ),
                    ),
                ),
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        ),
    ),
);
