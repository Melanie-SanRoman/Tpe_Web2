<?php

abstract class ApiController {
    protected $model;
    protected $view;
    private $data; 

    function __construct() {
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input"); 
        $this->model = new ApiModel();
    }

    function getData(){ 
        return json_decode($this->data); 
    }  

}

?>