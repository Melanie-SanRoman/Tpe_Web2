<?php
require_once 'libs/RouterAvanzado.php';
require_once 'Controllers/LibrosApiController.php';
require_once 'Controllers/ApiController.php';

$router = new Router();

$router->addRoute('libros','GET','LibrosApiController','getLibros');
$router->addRoute('libros/:ID','GET','LibrosApiController','getLibro');
$router->addRoute('libros/:ID','DELETE','LibrosApiController','deleteLibro');
$router->addRoute('libros','POST','LibrosApiController','addLibro');
$router->addRoute('libros/:ID','PUT','LibrosApiController','updateLibro');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>