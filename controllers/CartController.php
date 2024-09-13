<?php
require_once 'models/product.php';
class cartController{

    public function index() {
        $cart = $_SESSION['cart'];
        require_once 'views/cart/index.php';
    }


    public function add() {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }
        if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
            $_SESSION['cart'] = array();
        }
        if (isset($_SESSION['cart'])) {
            $counter = 0;
            if (count($_SESSION['cart']) > 0){
                foreach ($_SESSION['cart'] as $index => $element) {
                    if ($element['id_product'] == $product_id) {
                        $_SESSION['cart'][$index]['number'] ++;
                        $counter++;
                    }
    
                }
            }
            if (!isset($counter) || $counter == 0) {
                $product = new Product();
                $product->setId($product_id);
                $product = $product->getOne();

                if (is_object($product)) {
                    $_SESSION['cart'][] = array(
                        "id_product" => $product->id,
                        "product" => $product,
                        "price" => $product->precio,
                        "number" => 1
                    );

                }
            }
            header("Location:" . base_url . "cart/index");
        }
    }

    public function delete(){
        unset($_SESSION['cart']);
    }
}