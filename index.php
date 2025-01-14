<?php
require_once 'Controller/ProductController.php';
$controller = new ProductController();
$accion = $_GET['action'] ?? 'index';
switch($accion){
    case 'crear':
        $controller->crearProducto();
        break;
        
    case 'editar':
         $controller->editarProducto();
        break;

    case 'eliminar':
         $controller->borrarProducto();
        break;

    default:
    $controller->index();
}
