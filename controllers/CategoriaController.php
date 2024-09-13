<?php
require_once 'models/categoria.php';
class CategoriaController{

    public function save() {
        $nombre = $_POST['categoriaNombre'];
        $categoria = new Categoria();
        $categoria ->save($nombre);

    }

    public function add(){
        require_once 'views/categoria/crear-categoria.php';
    }

}