<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\routes\Router;

$router = new Router();

$router->setRoutes([
    'GET' => [
        '' => ['HomeController', 'index'],
        'home' => ['HomeController', 'index'],
        'signup' => ['UserController', 'signup'],
        'signin' => ['UserController', 'signin'],
        'logout' => ['UserController', 'logout'],
        'artcile' => ['AuthController', 'detail'],
        'admin' => ['AdminController', 'dashboard'],
        'wikis' => ['AdminController', 'index'],
        'categories' => ['AdminController', 'categories'],
        'edit' => ['AdminController', 'getWikisById'],
        'category' => ['AdminController', 'allCategories'],
        'addwiki' => ['HomeController', 'addWiki'],
        'wiki-detail' => ['HomeController', 'wikiDetail'],
        'deleteTag' => ['TagController', 'deleteTag'],

    ],
    'POST' => [
        'register' => ['UserController', 'register'],
        'login' => ['UserController', 'login'],
        'logout' => ['UserController', 'logout'],
        'addCategory' => ['CategoryController', 'addCategory'],
        'addTag' => ['TagController', 'addTag'],
        'updateTag' => ['TagController', 'updateTag'],
        'addWiki' => ['HomeController', 'addWiki'],
        'updateWiki' => ['AdminController', 'updateStatus'],


    ],
]);

if (isset($_GET['url'])) {
    $uri = trim($_GET['url'], '/');

    $methode = $_SERVER['REQUEST_METHOD'];

    try {
        $route = $router->getRoute($methode, $uri);

        if ($route) {
            list($controllerName, $methodName) = $route;

            $controllerClass = 'App\\controllers\\' . ucfirst($controllerName);

            $controller = new $controllerClass();

            if ($methodName) {
                if (method_exists($controller, $methodName)) {
                    $controller->$methodName();
                } else {
                    throw new Exception('Method not found in controller.');
                }
            } else {
                $controller->index();
            }
        } else {
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
