<?php
return array(
    'zf-rpc' => array(
        array(
            'methods' => 'GET',
            'url' => '/api-first-example/hello',
            'dispatchable' => 'ZFApiFirstExample\Controller\MyRpcController::hello'
        )
    )
);