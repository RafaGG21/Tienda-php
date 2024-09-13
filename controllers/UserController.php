<?php

require_once 'models/user.php';
class UserController{

    public function registro(){
        require_once 'views/user/register.php';
    }

    public function save(){
        if(isset($_POST)){
            $user = new User();
            $user->setNombre($_POST['name']);
            $user->setApellidos($_POST['surname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['pass']);
            $save = $user->save();

            if ($save) {
                $_SESSION['register'] = 'completed';
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }

        header('Location:'.base_url.'user/register');
    }

    public function login(){
        if(isset($_POST)){
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['pass']);
            $identity = $user->login();

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