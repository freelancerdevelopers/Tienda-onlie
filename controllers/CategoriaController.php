<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
    
   
    public function gestion(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getCategoria();
        require_once 'views/categoria/index.php';
    }
    
    public function crear() {
       Utils::isAdmin();
       require_once 'views/categoria/crear.php';
        
    }
    
    public function ver(){
        if(isset($_GET['id_categoria'])){
          $id_categoria = $_GET['id_categoria'];
          $categoria = new Categoria();
          $categoria->setId_categoria($id_categoria);
          $categoria = $categoria->getSelectCategoria();
          $producto = new Producto();
          $producto->setId_categoria($id_categoria);
          $productos = $producto->getProductosForCat();
        }
        require 'views/categoria/ver.php';
    }
    
    public function save() {
         Utils::isAdmin();
         if(isset($_POST) && isset($_POST['nameCategoria'])){
            if($_POST['nameCategoria'] != null){
             $categoria = new Categoria();
             $categoria->setNombre_categoria($_POST['nameCategoria']);
             $categoria->save();
             $_SESSION['register'] = "complete";
             header("Location:".base_url."categoria/gestion");
           }else{
             $_SESSION['register'] = "failed";
             header("Location:".base_url."categoria/gestion");
            }
         }else{
             $_SESSION['register'] = "failed";
             header("Location:".base_url."categoria/gestion");
         }
    }
    
}
