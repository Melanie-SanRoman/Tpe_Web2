<?php
require_once 'libs/RouterAvanzado.php';
require_once 'Controllers/LibrosApiController.php';
require_once 'Controllers/AutoresApiController.php';
require_once 'Controllers/ApiController.php';

$router = new Router();

$router->addRoute('libros','GET','LibrosApiController','getLibros');
$router->addRoute('libros/:ID','GET','LibrosApiController','getLibro');
$router->addRoute('libros/:ID','DELETE','LibrosApiController','deleteLibro');
$router->addRoute('libros','POST','LibrosApiController','addLibro');
$router->addRoute('libros/:ID','PUT','LibrosApiController','updateLibro');
$router->addRoute('libros/:CAMPO/:ORDER', 'GET', 'LibrosApiController', 'orderLibros');
$router->addRoute('libros/filtrar/Lanzamiento/:MIN/:MAX','GET','LibrosApiController','lanzamientoLibros');
$router->addRoute('libros/paginar/:LIMITE/:PAGINA','GET','LibrosApiController','paginarLibros');

$router->addRoute('autores','GET','AutoresApiController','getAutores');
$router->addRoute('autores/:ID','GET','AutoresApiController','getAutor');
$router->addRoute('autores','POST','AutoresApiController','addAutor');
$router->addRoute('autores/:ID','DELETE','AutoresApiController','deleteAutor');
$router->addRoute('autores/:ID','PUT','AutoresApiController','updateAutor');
$router->addRoute('autores/:CAMPO/:ORDER', 'GET', 'AutoresApiController', 'orderAutores');
$router->addRoute('autores/filtrar/nacimiento/:MIN/:MAX','GET','AutoresApiController','nacimientoAutores');
$router->addRoute('autores/paginar/:LIMITE/:PAGINA', 'GET', 'AutoresApiController', 'paginarAutores');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>