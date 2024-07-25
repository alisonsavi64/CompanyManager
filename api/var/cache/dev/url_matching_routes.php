<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/company' => [
            [['_route' => 'create_company', '_controller' => ['App\\infra\\Controller\\CompanyController', 'post']], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'get_all_companies', '_controller' => ['App\\infra\\Controller\\CompanyController', 'getAll']], null, ['GET' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/company/(\\d+)(?'
                    .'|(*:28)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [
            [['_route' => 'get_company', '_controller' => ['App\\infra\\Controller\\CompanyController', 'get']], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update_company', '_controller' => ['App\\infra\\Controller\\CompanyController', 'put']], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_company', '_controller' => ['App\\infra\\Controller\\CompanyController', 'delete']], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
