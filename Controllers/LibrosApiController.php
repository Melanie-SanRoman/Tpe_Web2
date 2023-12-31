<?php
require_once './Models/ApiModel.php';
require_once './Controllers/ApiController.php';
require_once './Views/ApiView.php';

class LibrosApiController extends ApiController
{

    public function getLibros()
    {
        $libros = $this->model->getLibros();
        $this->view->response($libros, 200);
    }
    public function getLibro($params = null)
    {
        $id = $params[':ID'];

        $libro = $this->model->getLibro($id);

        if ($libro) {
            $this->view->response($libro, 200);
        } else {
            $this->view->response("No existe el libro con el id={$id}", 404);
        }
    }
    public function deleteLibro($params = [])
    {
        $libro_id = $params[':ID'];
        $libro = $this->model->getLibro($libro_id);

        if ($libro) {
            $this->model->deleteLibro($libro_id);
            $this->view->response("Libro id=$libro_id eliminada con éxito", 200);
        } else
            $this->view->response("Book id=$libro_id not found", 404);
    }
    public function addLibro()
    {
        $libro = $this->getData();

        $libroId = $this->model->addLibro($libro->Nombre, $libro->Genero, $libro->Lanzamiento, $libro->id_autor);

        $libroNuevo = $this->model->getLibro($libroId);

        if ($libroNuevo)
            $this->view->response($libroNuevo, 201);
        else
            $this->view->response("Error al insertar libro", 500);
    }
    public function updateLibro($params = [])
    {
        $libro_id = $params[':ID'];
        $libro = $this->model->getLibro($libro_id);

        if ($libro) {
            $body = $this->getData();
            $nombre = $body->Nombre;
            $genero = $body->Genero;
            $lanzamiento = $body->Lanzamiento;
            $id_autor = $body->id_autor;
            $libro = $this->model->updateLibro($libro_id, $nombre, $genero, $lanzamiento, $id_autor);
            $this->view->response("Libro id=$libro_id actualizado con éxito", 200);
        } else
            $this->view->response("Book id=$libro_id not found", 404);
    }
    public function orderLibros($params = [])
    {
        $order = $params[':ORDER'];
        $campo = $params[':CAMPO'];

        if ($campo == 'id_libros' || $campo == 'Nombre' || $campo == 'Genero' || $campo == 'id_autor') {

            if ($order == 'DESC' || $order == 'ASC') {
                $orderLibros = $this->model->orderLibros($order, $campo);
                $this->view->response($orderLibros, 200);
            } else
                $this->view->response("No se ah indicado el orden", 404);
        }
        else
            $this->view->response("El campo no existe", 404);
    }
    public function lanzamientoLibros($params = [])
    {
        $min = $params[':MIN'];
        $max = $params[':MAX'];

        if (!empty($min) && !empty($max)) {
            $lanzamientoLibros = $this->model->lanzamientoLibros($min, $max);
            $this->view->response($lanzamientoLibros, 200);
        } else
            $this->view->response("No se ah indicado el minimo o el maximo a filtrar", 404);
    }
    public function paginarLibros($params = []){
        $offset=$params[":PAGINA"];
        $limit=$params[":LIMITE"];
            if(!empty($limit) && $offset >= 0){
                $libros= $this->model->paginarLibros($limit,$offset);
                if(!empty($libros)) {
                    $this->view->response($libros,200);
                }else{
                    $this->view->response("No se encontraron libros",401);
                } 
                
            } else{
                $this->view->response("Campos vacios", 404);
            }  
    }

}