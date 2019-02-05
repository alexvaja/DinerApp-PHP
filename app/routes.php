<?php
$routes = [
    '/page/about-us' => ['controller' => 'PageController', 'action' => 'aboutUsAction'],
    '/user/{id}' => ['controller' => 'UserController', 'action' => 'showAction'],
    '/user/edit/{id}' => ['controller' => 'UserController', 'action' => 'showAction', 'guard' => 'Authenticated'],

    '/register' => ['controller' => 'RegisterController', 'action' => 'registerPage'],
    '/register/auth' => ['controller' => 'RegisterController', 'action' => 'registerNewUser'],

    '/login' => ['controller' => 'LoginController', 'action' => 'loginPage'],
    '/login/auth' =>['controller' => 'LoginController', 'action' => 'loginUser'],

    '/main-page' => ['controller' => 'MainPageController', 'action' => 'loadMainPage'],
    '/main-page/action' => ['controller' => 'MainPageController', 'action' => 'loadAction'],

    '/main-page/category' => ['controller' => 'CategoryController', 'action' => 'loadCategoryPage'],
    '/main-page/category/action' => ['controller' => 'CategoryController', 'action' => 'addCategory'],

    '/main-page/food' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/main-page/food/' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],

    //aici injur decent clasa router.
];
