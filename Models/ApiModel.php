<?php

class ApiModel{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=trabajo_practico_especial', 'root', '');
    }

    public function getLibros(){
        $query= $this->db->prepare("SELECT id_libros,Nombre, Genero, Lanzamiento, Nombre_autor, Apellido FROM libros INNER JOIN autores WHERE libros.id_autor= autores.ID");
        $query->execute();
    
        return($query->fetchALL(PDO::FETCH_OBJ));
    }
    public function getLibro($id){
        $query= $this->db->prepare("SELECT * FROM libros WHERE id_libros=$id");
        $query->execute();

        return ($query->fetchAll(PDO::FETCH_OBJ));
    }
    public function deleteLibro($id){
        $query = $this->db->prepare("DELETE FROM `libros` WHERE `id_libros`=$id");
        $query->execute();
    }
    function addLibro($nombre,$genero,$lanzamiento,$id_autor){
        $query = $this->db->prepare("INSERT INTO libros (Nombre, Genero, Lanzamiento, id_autor) VALUES ('$nombre','$genero','$lanzamiento', '$id_autor')");
        $query->execute();

        return $this->db->lastInsertId();
    }
    function updateLibro($id, $nombre, $genero, $lanzamiento,$id_autor){
        $query= $this->db->prepare("UPDATE `libros` SET `id_libros`='$id',`Nombre`='$nombre',`Genero`='$genero',`Lanzamiento`='$lanzamiento',`id_autor`='$id_autor' WHERE id_libros='$id'");
        $query->execute();
    }
}