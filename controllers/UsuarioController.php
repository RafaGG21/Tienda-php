<?php

require_once 'models/usuario.php';
class UsuarioController{

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['contra']);
            $save = $usuario->save();

            if ($save) {
                $_SESSION['register'] = 'completed';
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }

        header('Location:'.base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['contra']);
            $identity = $usuario->login();

            if ($identity) {
                $_SESSION['identity'] = $identity;
                
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                } 
            } 
        } else {
            $_SESSION['login'] = 'failed';
        }

        header('Location:'.base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            Utils::deleteSession('identity');
        } 
        if(isset($_SESSION['admin'])){
            Utils::deleteSession('admin');
        } 

        header('Location:'.base_url);
    }
}