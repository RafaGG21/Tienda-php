<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
    }

    public static function getCategorias() {
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        return $categoria->getCategorias();
    }
}