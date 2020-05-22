<?php

require_once 'models/pedido.php';

class pedidoController{
    
    public function index(){
        echo "Controlador pedidos, Accion index";
    }
    
    public function gestion(){
        Utils::isAdmin();
        $pedidos = new Pedido();
        $pedidos = $pedidos->getPedidosGestion();
        
        $total = new Pedido();
        $total = $total->getCoste();
        
        require_once 'views/pedido/index.php';
    }

    public function add (){
        if(isset($_SESSION['user'])){
           
            $ciudad_pedido    = isset($_POST['ciudad_pedido']) ? $_POST['ciudad_pedido'] : false;
            $direccion_pedido = isset($_POST['direccion_pedido']) ? $_POST['direccion_pedido'] : false;
            $zip_pedido       = isset($_POST['zip_pedido']) ? $_POST['zip_pedido'] : false;
            
            if ($ciudad_pedido && $direccion_pedido && $zip_pedido){
                 $pedido = new Pedido();
                 $pedido ->setCiudad_pedido($ciudad_pedido);
                 $pedido ->setDireccion_pedido($direccion_pedido);
                 $pedido ->setZip_pedido($zip_pedido);
                 $pedido ->setId_usuario($_SESSION['user']->id_usuario);
                 $coste = Utils::statsCarrito();
                 $pedido->setCoste_pedido($coste['total']);
                 $save = $pedido->save();
                 $savePedido = $pedido->save_relacion();    
                 
                 if($save && $savePedido){
                     echo "Pedido registrado correctamente";
                     header("Location:".base_url."pedido/confirmado");
                     unset($_SESSION['carrito']);
                 }else{
                     echo "Pedido con error";
                 }
            }else{
                echo "Erro con datos del pedido";
            }
            
        }else{
             header("Location:".base_url."");
        }
    }
    
    public function confirmado() {
        require_once 'views/pedido/confirmado.php';
    }
    
    public function misPedidos() {
        if(isset($_SESSION['user'])){
            $id_usuario = $_SESSION['user']->id_usuario;
            $pedidos = new Pedido();
            $pedidos->setId_usuario($id_usuario);
            $pedidos = $pedidos->getPedidosByUser();
        }else{
             header("Location:".base_url."");
        }

        require_once 'views/pedido/mispedidos.php';  
    }
    
    public function verpedido() {
        $id_pedido = $_GET['id_pedido'];
        if(isset($id_pedido) && $id_pedido != ''){
            $pedido_detalle = new Pedido();
            $pedido_detalle->setId_pedido($id_pedido);
            $pedido_detalle = $pedido_detalle->getPedidoSelect();
        }else{
             header("Location:".base_url."");
        }
        require_once 'views/pedido/verpedido.php';  
    }
}

