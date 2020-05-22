<?php

require_once 'models/producto.php';

class carritoController{
     
    public function index(){
        //var_dump($_SESSION['carrito']);
        require_once 'views/carrito/index.php';
    }
    
    public function add (){
        echo "agregar producto a carrito";
        if (isset($_GET['id_producto'])){
            $id_producto = $_GET['id_producto'];
        }else{
            header("Location:".base_url);
        }
        
        if( isset($_SESSION['carrito'])){
            $con = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $id_producto ){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $con++;
                }
            }
            
        }
        if(!isset($con) || $con == 0){
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $producto = $producto->getSelectProducto();
            //añadir a carrito
            if(is_object($producto)){
                $_SESSION['carrito'] [] = array ("id_producto" => $producto->id_producto, "precio_producto" => $producto->precio_producto, "nombre_producto" => $producto->nombre_producto, "unidad_producto" => 1, "oferta_producto" => $producto->oferta_producto, "imagen_producto" => $producto->imagen_producto);
            }
        }
        header("Location:".base_url."carrito/index");
    }
    
    public function remove (){
        if(isset($_GET['indice'])){
            $indice = $_GET['indice'];
            unset($_SESSION['carrito'][$indice]);
        }
        header("Location:".base_url."carrito/index");
    }
    
    public function up (){
        if(isset($_GET['indice'])){
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidad_producto']++;

        }
        header("Location:".base_url."carrito/index");
    }
    
    public function down (){
        if(isset($_GET['indice'])){
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidad_producto']--;
            if ($_SESSION['carrito'][$indice]['unidad_producto'] == 0){
                 unset($_SESSION['carrito'][$indice]);
            }
        }
        header("Location:".base_url."carrito/index");
    }
    
    public function delete_all (){
        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");
    }
}

