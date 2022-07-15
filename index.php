<?php

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();
$controller = new Controller();


//Routes for view page
$router->get('/', function() 
{
    readfile('view/home.html');
});

$router->get('/add-product', function() 
{
    readfile('view/add-product.html');
});


//Routes for CRUD proccess
$router->mount('/crud', function() use ($router) 
{
    $router->get('/read-product', function() 
    {
        $GLOBALS['controller']->read();
    });
    
    $router->delete('/delete-product/{sku}', function($sku) 
    {
        $GLOBALS['controller']->delete($sku);
    });
    
    $router->post('/add-product', function() 
    {
        $GLOBALS['controller']->add($_POST);
    });
});



$router->run();

?>