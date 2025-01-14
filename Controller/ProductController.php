<?php
require_once 'model/Product.php';
class ProductController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Product();
    }

    public function index() {
        $products = $this->modelo->getAllProducts();
        require 'View/products.php';
    }

    public function crearProducto(){
        header('Content-Type: application/json');
        try {

            $titulo = $_POST['txt_titulo'];
            $autor = $_POST['txt_autor'];
            $anio_publicacion = $_POST['txt_anio_publicacion'];
            $genero = $_POST['txt_genero'];
            $resultado = $this->modelo->insertarRegistroProducto($titulo, $autor, $anio_publicacion, $genero);
            echo json_encode(['success' => $resultado]);
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function editarProducto(){
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'];
            $titulo = $_POST['txt_edittitulo'];
            $autor = $_POST['txt_editautor'];
            $anio_publicacion = $_POST['txt_editanio_publicacion'];
            $genero = $_POST['txt_editgenero'];
            $resultado = $this->modelo->actualizarProducto($id,$titulo,$autor,$anio_publicacion,$genero);
            echo json_encode(['success' => $resultado]);
           
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function borrarProducto(){
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'];
            $resultado = $this->modelo->eliminarProducto($id);
            echo json_encode(['success' => $resultado]);
           
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}