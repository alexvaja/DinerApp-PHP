<?php
$routes = [
    '/about-us' => ['controller' => 'PageController', 'action' => 'aboutUsAction'],
    '/user/{id}' => ['controller' => 'UserController', 'action' => 'showAction'],
    '/user/edit/{id}' => ['controller' => 'UserController', 'action' => 'showAction', 'guard' => 'Authenticated'],

    '/register' => ['controller' => 'RegisterController', 'action' => 'registerPage'],
    '/register/auth' => ['controller' => 'RegisterController', 'action' => 'registerNewUser'],

    '/' => ['controller' => 'LoginController', 'action' => 'loginPage'],
    '/login' => ['controller' => 'LoginController', 'action' => 'loginPage'],
    '/login/auth' =>['controller' => 'LoginController', 'action' => 'loginUser'],

    '/main-page' => ['controller' => 'MainPageController', 'action' => 'loadAdminMainPage', 'guard' => 'Authenticated'],
    '/main-page/action' => ['controller' => 'MainPageController', 'action' => 'mainPageAction', 'guard' => 'Authenticated'],

    '/main-page-user' => ['controller' => 'UserController', 'action' => 'loadUserMainPage'],

    '/main-page/category' => ['controller' => 'CategoryController', 'action' => 'loadCategoryPage'],
    '/main-page/category/action' => ['controller' => 'CategoryController', 'action' => 'addCategory'],


    '/food' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/food/' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/food/add' => ['controller' => 'FoodController', 'action' => 'addFoodAction', 'guard' => 'Authenticated'],
    '/food/food' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/food/modify' => ['controller' => 'FoodController', 'action' => 'modifyFoodPage', 'guard' => 'Authenticated'],

    //aici injur decent clasa router.
];
