<?php
require_once 'models/producto.php';

class productoController{
    
    public function index(){
        require_once 'views/producto/destacados.php';   
    }
    
    public function gestion(){
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getProducto();
        require_once 'views/producto/gestion.php';
        
    }
    
    public function detalleProducto(){
        if(isset($_GET['id_producto'])){
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $SelecProduct = $producto->getSelectProducto();
            require_once 'views/producto/detalle.php';
        }else{
            echo "Error_031: Valor no localizado";
            //header("Location:".base_url."producto/gestion");
        }
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
        
    }
    
    public function save() {
         Utils::isAdmin();
         if(isset($_POST)){
            if(     $_POST['name-product'] != null &&
                    $_POST['id_categoria'] != null &&
                    $_POST['desc-product'] != null &&
                    $_POST['cost-product'] != null &&
                    $_POST['stock-product'] != null &&
                    $_POST['ofert-product'] != null ){
             $producto = new Producto();
             $producto->setNombre_producto($_POST['name-product']);
             $producto->setId_categoria($_POST['id_categoria']);
             $producto->setDescripcion_producto($_POST['desc-product']);
             $producto->setPrecio_producto($_POST['cost-product']);
             $producto->setStock_producto($_POST['stock-product']);
             $producto->setOferta_producto($_POST['ofert-product']);
             $date = date("Y/m/d");
             $producto->setFecha_producto($date);
             $file = $_FILES['img-product'];
             $namefile = $file['name'];
             $typefile = $file['type'];
             $tmpfile  = $file['tmp_name'];
             //validar el tema de la imagen al editar un producto
             
             if( !is_dir('uploads/images') ){
                mkdir('uploads/images', 0777, true);    
             }else{
                 move_uploaded_file($tmpfile, 'uploads/images/'.$namefile);    
                 $producto->setImagen_producto($namefile);
             }
             if(isset($_GET['id_producto'])){
                   $id = $_GET['id_producto'];
                   $producto->setId_producto($id);
                   $producto->edit();    
             }else{
                $producto->save(); 
             }
             
             header("Location:".base_url."producto/gestion");
           }else{
             $_SESSION['register'] = "failed";
             header("Location:".base_url."producto/gestion");
            }
         }else{
             $_SESSION['register'] = "failed";
             header("Location:".base_url."producto/gestion");
         }
    }
    
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id_producto'])){
            $edit = true;
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $SelecProduct = $producto->getSelectProducto();
            require_once 'views/producto/crear.php';
        }else{
            echo "Error_031: Valor no localizado";
            //header("Location:".base_url."producto/gestion");
        }
        
        
    }
    
    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id_producto'])){
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $delete = $producto->delete();
            if($delete){
                echo "Registro eliminado correctamente";
            }else{
                echo "Error_034: No se pudo eliminar el registro";
            }
        }else{
            echo "Error_031: Valor no localizado";
            //header("Location:".base_url."producto/gestion");
        }
    }
}
