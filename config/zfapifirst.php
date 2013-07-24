<?php

return array(
    'route' => array(
        array(
            'methods' => 'GET',
            'url' => '/api-first-example/hello',
            'dispatchable' => 'ZFApiFirstExample\Controller\MyRpcController::hello'
        )
    )
);