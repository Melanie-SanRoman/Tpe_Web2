<?php

class ApiModel{
    private $db;

     function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=trabajo_practico_especial', 'root', '');
    }

    public function getLibros(){
        $query= $this->db->prepare("SELECT id_libros,Nombre, Genero, Lanzamiento,id_autor, Nombre_autor, Apellido FROM libros INNER JOIN autores WHERE libros.id_autor= autores.ID");
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
    public function addLibro($nombre,$genero,$lanzamiento,$id_autor){
        $query = $this->db->prepare("INSERT INTO libros (Nombre, Genero, Lanzamiento, id_autor) VALUES ('$nombre','$genero','$lanzamiento', '$id_autor')");
        $query->execute();

        return $this->db->lastInsertId();
    }
    public function updateLibro($id, $nombre, $genero, $lanzamiento,$id_autor){
        $query= $this->db->prepare("UPDATE `libros` SET `id_libros`='$id',`Nombre`='$nombre',`Genero`='$genero',`Lanzamiento`='$lanzamiento',`id_autor`='$id_autor' WHERE id_libros='$id'");
        $query->execute();
    }
    public function orderLibros($order, $campo){
        $query= $this->db->prepare ("SELECT * FROM libros ORDER BY $campo $order");
        $query->execute();

        return ($query->fetchAll(PDO::FETCH_OBJ));
    }
    public function lanzamientoLibros($min,$max){
        $query=$this->db->prepare("SELECT * FROM `libros` WHERE Lanzamiento BETWEEN $min AND $max");
        $query->execute();

        return ($query->fetchAll(PDO::FETCH_OBJ));
    }

    
    public function getAutores(){
        $query=$this->db->prepare("SELECT * FROM autores");
        $query->execute();
        $autores=$query->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }

    public function getAutor($id){
        $query=$this->db->prepare("SELECT * FROM autores WHERE id=?");
        $query->execute([$id]);
        $autor=$query->fetch(PDO::FETCH_OBJ);
        return $autor;
    }

    public function addAutor($NombreAutor,$Apellido,$FechaNacimiento,$Nacionalidad){
        $query=$this->db->prepare("INSERT INTO autores (Nombre_autor, Apellido, Fecha_de_nacimiento, Nacionalidad) VALUES ('$NombreAutor','$Apellido','$FechaNacimiento','$Nacionalidad')");
        $query->execute();
        return $this->db->lastInsertId();
    }

    public function deleteAutor($id){
        $query=$this->db->prepare("DELETE FROM autores WHERE ID='$id'");
        return($query->execute());
  
    }
    public function deleteLibroAutor($id){
        $query=$this->db->prepare("DELETE FROM libros WHERE id_autor='$id'");
        $query->execute();
    }

    public function updateAutor($NombreAutor,$Apellido,$FechaNacimiento,$Nacionalidad,$id){
        $query=$this->db->prepare("UPDATE autores  SET Nombre_Autor= '$NombreAutor' , Apellido='$Apellido', Fecha_de_nacimiento='$FechaNacimiento', Nacionalidad='$Nacionalidad' WHERE ID='$id'");
        return($query->execute());
    }

}
?>