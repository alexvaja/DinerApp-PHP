<?php
$routes = [
    '/page/about-us' => ['controller' => 'PageController', 'action' => 'aboutUsAction'],
    '/user/{id}' => ['controller' => 'UserController', 'action' => 'showAction'],
    '/user/edit/{id}' => ['controller' => 'UserController', 'action' => 'showAction', 'guard' => 'Authenticated'],

    '/register' => ['controller' => 'RegisterController', 'action' => 'registerPage'],
    '/register/auth' => ['controller' => 'RegisterController', 'action' => 'registerNewUser'],

    '/login' => ['controller' => 'LoginController', 'action' => 'loginPage'],
    '/login/auth' =>['controller' => 'LoginController', 'action' => 'loginUser'],

    //aici injur decent clasa router.
];
