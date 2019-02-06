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
    '/main-page-user/action' => ['controller' => 'UserController', 'action' => 'userPageAction'],
    '/main-page-user/order' => ['controller' => 'UserController', 'action' => 'loadOrder'],
    '/main-page-user/order/saved' => ['controller' => 'UserController', 'action' => 'addOrder'],
    '/main-page-user/main-page-user/order/saved' => ['controller' => 'UserController', 'action' => 'addOrder'],
    '/main-page-user/view-food' => ['controller' => 'UserController', 'action' => 'viewAllFood'],
    '/main-page-user/view-food/action' => ['controller' => 'UserController', 'action' => 'viewAllFood'],

    '/user' => ['controller' => 'UserController', 'action' => 'loadUser'],
    '/user/action' => ['controller' => 'UserController', 'action' => 'loadUserAction'],
    '/delete' => ['controller' => 'UserController', 'action' => 'deleteUser'],
    '/delete/action' => ['controller' => 'UserController', 'action' => 'deleteUserAction'],

    '/main-page/category' => ['controller' => 'CategoryController', 'action' => 'loadCategoryPage'],
    '/main-page/category/action' => ['controller' => 'CategoryController', 'action' => 'addCategory'],


    '/food' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/food/' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/food/add' => ['controller' => 'FoodController', 'action' => 'addFoodAction', 'guard' => 'Authenticated'],
    '/food/food' => ['controller' => 'FoodController', 'action' => 'loadFoodPage', 'guard' => 'Authenticated'],
    '/food/modify' => ['controller' => 'FoodController', 'action' => 'modifyFoodPage', 'guard' => 'Authenticated'],

    //aici injur decent clasa router.
];
