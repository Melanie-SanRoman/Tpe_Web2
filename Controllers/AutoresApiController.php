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
            $this->view->response("Datos ingresados",201);
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
       
    public function orderAutores($params = [])
    {
        $order = $params[':ORDER'];
        $campo = $params[':CAMPO'];

        if ($campo == 'ID' || $campo == 'Nombre_autor' || $campo == 'Apellido' || $campo == 'Fecha_de_nacimiento' || $campo =="Nacionalidad") {

            if ($order == 'DESC' || $order == 'ASC') {
                $orderAutores = $this->model->orderAutores($order, $campo);
                $this->view->response($orderAutores, 200);
            } else
                $this->view->response("No se ah indicado el orden", 404);
        }
        else
            $this->view->response("El campo no existe", 404);
    }
    public function nacimientoAutores($params = []){
        $min = $params[':MIN'];
        $max = $params[':MAX'];

        if (!empty($min) && !empty($max)) {
            $nacimientoAutores = $this->model->nacimientoAutores($min, $max);
            $this->view->response($nacimientoAutores, 200);
        } else
            $this->view->response("No se ah indicado el minimo o el maximo a filtrar", 404);
    }
    public function paginarAutores($params = [])
    {
        $offset=$params[":PAGINA"];
        $limit=$params[":LIMITE"];
            if(!empty($limit) && $offset >= 0){ 
                $autores= $this->model->paginarAutores($limit,$offset);
                if(!empty($autores)) {
                    $this->view->response($autores,200);
                }else{
                    $this->view->response("No se encontraron autores", 401);
                } 
                
            } else{
                $this->view->response("Campos vacios", 404);
            }  
    }
}

?>