<?php
require_once 'models/producto.php';
class ProductoController{

    public function getProductosPorCategoria() {
        $categoria = $_GET['categoria'];
        $producto = new Producto();
        $productos = $producto ->getProductosPorCategoria($categoria);
        require_once 'views/producto/productos-categoria.php';
    }

    public function add(){
        require_once 'views/producto/crear-producto.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
        }
        require_once 'views/producto/ver.php';
    }

    public function save(){
        if(isset($_POST)){
            $producto = new Producto();
            $producto->setCategoria_id($_POST['categoria']);
            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setPrecio($_POST['precio']);
            $producto->setOferta($_POST['oferta'] == 1 ? true : false);
            $producto->setStock($_POST['stock']);

            $archivo = $_FILES['imagen'];
            $nombreImagen = $archivo['name'];
            $mymeType = $archivo['type'];

            if ($mymeType == "image/jpg" || "image/jpeg" || "image/png"){
                if (!is_dir('uploads/images')){
                    mkdir('uploads/images', 0777, true);
                }
                $producto->setImagen($nombreImagen);
                move_uploaded_file($archivo['tmp_name'], 'uploads/images/'.$nombreImagen);
            }
            $producto->save();

        } 
    }
}