<?php

require_once 'models/usuario.php';

class usuarioController{
    
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $nombre   = isset($_POST['nombre'])   ? $_POST['nombre']   : false;
            $email    = isset($_POST['email'])    ? $_POST['email']    : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            if( $nombre && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre_usuario($nombre);
                $usuario->setEmail_usuario($email);
                $usuario->setPassword_usuario($password);
                $save = $usuario->save();
                if($save){
                    $_SESSION['register'] = "complete";
                    header("Location:".base_url."usuario/registro");
                }else{
                    $_SESSION['register'] = "failed";
                    header("Location:".base_url."usuario/registro");
                } 
            }else{
                $_SESSION['register'] = "failed";
                header("Location:".base_url."usuario/registro");
            }
        }else{
            $_SESSION['register'] = "failed";
            header("Location:".base_url."usuario/registro");
        }
    }
    public function login (){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setEmail_usuario($_POST['username']);
            $usuario->setPassword_usuario($_POST['password']);
            $identity = $usuario->login();
            if($identity && is_object($identity)){
                  $_SESSION['user']=$identity;
                  if ($_SESSION['user']->rol_usuario == 'administrator'){
                      $_SESSION['admin'] = true;
                      header("Location:".base_url."");
                  }
                  header("Location:".base_url."");
            }else{
                echo "usuario incorrecto";
                header("Location:".base_url."");
            }
        }else{
           echo "usuario incorrecto";
           header("Location:".base_url."");
        }
    }
    
    public function logout() { 
        echo "salir";
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        session_destroy();
        header("Location:".base_url."");
    }
    
   
}
