<?php
require_once 'models/producto.php';
class cartController{

    public function add(){

        if (isset($_GET['id'])){
            $product_id = $_GET['id'];
        } else {
            header('Location:'.base_url);
        }

        if(isset($_SESSION['cart'])){

        } else {

        }
    }

}