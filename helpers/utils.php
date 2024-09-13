<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
    }

    public static function getCategories() {
        require_once 'models/category.php';
        $categories = new Category();
        return $categories->getCategories();
    }
}