<?php
require_once 'models/category.php';
class CategoryController{

    public function save() {
        $name = $_POST['categoryName'];
        $category = new Category();
        $category ->save($name);

    }

    public function add(){
        require_once 'views/category/create-category.php';
    }

}