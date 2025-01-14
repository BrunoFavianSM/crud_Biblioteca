<?php
class Product {
    private $db;
    private $tabla = "libros";
    
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=bdejemplo', 'root', '');
    }

    public function getAllProducts() {
        $capturar_productos = $this->db->query('SELECT * FROM libros');
        return $capturar_productos->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarRegistroProducto($titulo, $autor, $anio_publicacion ,$genero){
        $insertarp = $this->db->prepare('INSERT INTO libros(titulo,autor,anio_publicacion,genero) VALUES (?, ?, ?, ?)');
        return $insertarp->execute([$titulo, $autor, $anio_publicacion ,$genero]);
    }

    public function actualizarProducto($id, $titulo, $autor, $anio_publicacion ,$genero){
        $query = "UPDATE ". $this->tabla . " 
        SET titulo = :titulo, autor = :autor, anio_publicacion = :anio_publicacion, genero = :genero
        WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titulo', $nombre);
        $stmt->bindParam(':autor', $precio);
        $stmt->bindParam(':anio_publicacion', $anio_publicacion);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminarProducto($id){
        $query = "DELETE FROM " . $this->tabla . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}