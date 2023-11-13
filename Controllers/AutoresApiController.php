<?php
require_once './Models/ApiModel.php';
require_once './Controllers/ApiController.php';
require_once './Views/ApiView.php';

class AutoresApiController extends ApiController{
    
    public function getAutores($params=[]){
        $autores=$this->model->getAutores();
        if($autores){
            $this->view->response($autores,200);
        }else{
            $this->view->response("Error",404);
        }
    }

    public function getAutor($params=null){
        $id=$params[':ID'];
        $autor=$this->model->getAutor($id);
        if($autor){
            $this->view->response($autor,200);
        }else{
            $this->view->response("Error",404);
        }
    }

    public function addAutor($params=[]){
        $datos=$this->getData();

        $NombreAutor=$datos->Nombre_autor;
        $Apellido=$datos->Apellido;
        $FechaNacimiento=$datos->Fecha_de_nacimiento;
        $Nacionalidad=$datos->Nacionalidad;

        $id=$this->model->addAutor($NombreAutor,$Apellido,$FechaNacimiento,$Nacionalidad);
        $Autor=$this->model->getAutor($id);
        if($Autor){
            $this->view->response("Datos ingresados",200);
        }else{
            $this->view->response("No se pudo ingresar los datos correctamente",404);
        }  
    }

    public function deleteAutor($params=null){
        $id=$params[':ID'];
        $this->model->deleteLibroAutor($id);
        $autor=$this->model->deleteAutor($id);
        if($autor){
            $this->view->response("Autor eliminado con exito",200);
        }else{
            $this->view->response("No se ha podido eliminar el autor",404);
        }
       
    }
    
    public function updateAutor($params=null){
        $id=$params[':ID'];
        $datos = $this->getData();

        $NombreAutor=$datos->Nombre_autor;
        $Apellido=$datos->Apellido;
        $FechaNacimiento=$datos->Fecha_de_nacimiento;
        $Nacionalidad=$datos->Nacionalidad;

        $autor=$this->model->updateAutor($NombreAutor,$Apellido,$FechaNacimiento,$Nacionalidad,$id);
            if($autor){
                $this->view->response("Actualizado con exito",200);
            }else{
                $this->view->response("No se ha podido actualizar",404);
            }
            
        }
       
    
    
}

?>