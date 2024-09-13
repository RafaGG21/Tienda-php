<?php
require_once 'models/product.php';
class ProductController{

    public function getProductsByCategory() {
        $category = $_GET['category'];
        $product = new Product();
        $products = $product ->getProductsByCategory($category);
        require_once 'views/product/products-category.php';
    }

    public function add(){
        require_once 'views/product/create-product.php';
    }

    public function detail(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $producto = new Product();
            $producto->setId($id);
            $pro = $producto->getOne();
        }
        require_once 'views/product/detail.php';
    }

    public function save(){
        if(isset($_POST)){
            $product = new Product();
            $product->setCategoria_id($_POST['category']);
            $product->setNombre($_POST['name']);
            $product->setDescripcion($_POST['description']);
            $product->setPrecio($_POST['price']);
            $product->setOferta($_POST['offer'] == 1 ? true : false);
            $product->setStock($_POST['stock']);

            $file = $_FILES['image'];
            $nameImage = $file['name'];
            $mymeType = $file['type'];

            if ($mymeType == "image/jpg" || "image/jpeg" || "image/png"){
                if (!is_dir('uploads/images')){
                    mkdir('uploads/images', 0777, true);
                }
                $product->setImagen($nameImage);
                move_uploaded_file($file['tmp_name'], 'uploads/images/'.$nameImage);
            }
            $product->save();

        } 
    }
}