<?php
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/Projet/La-vache-qui-cuit');

$router->map( 'GET', '/', 'VacheController#homePage', 'home');
$router->map('GET', '/recipe/','', 'detaileRecipe');
$router->map('GET', '/recipe/[i:id_recette]', 'VacheController#getOne', 'getOneRecipe');
$router->map('GET', '/addNewRecipe', 'VacheController#addRecipe', 'addNewRecipe');

//conection
$router->map('GET', '/conection',  'UserController#connectionPage', 'connectionPage');
$router->map('POST', '/connection', 'UserController#connection', 'connection');

//Recuperation des informations de formulaire de insertion de recettes
$router->map('POST', '/addMyRecipe', 'VacheController#addMyRecipe', 'addMyRecipe');


$match = $router->match();
var_dump($match);

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if (is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }
}
