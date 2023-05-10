<?php
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/Project/La-vache-qui-cuit');
$router->map( 'GET', '/', 'VacheController#homePage', 'home');


$match = $router->match();

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if (is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), []);
    }
}
