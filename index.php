<?php

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'helpers/utils.php';

require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

$db = Database::connect(); 

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
} else {
    echo 'La página no existe';
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else {
        echo 'La página no existe';
    }
} else {
    echo 'La página no existe';
}

require_once 'views/layout/footer.php';