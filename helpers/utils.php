<?php

class Utils{
    
    public static function deleteSession($name){
        if (isset($_SESSION[$name])){
          $_SESSION[$name] = null;
          unset($_SESSION[$name]);
        }
        return $name;
    }
    
    public static function isAdmin() {
        if(isset($_SESSION['admin'])){
        }else{
            header("Location:".base_url."");
        }
    }
    
    public static function showCategorias() {
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getCategoria();        
        return $categorias;
    }
    
    public static function statsCarrito(){
        $stats = array ('count' => 0, 'total' => 0);
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            foreach ($_SESSION['carrito'] as $producto){
                $of = $producto['oferta_producto']/100; 
                $r = $producto['precio_producto']*$of;
                $t = $producto['precio_producto']-$r;
                $stats['sub'] += $producto['unidad_producto']*$t;
                $stats['tax'] += ($producto['unidad_producto']*$t)*.16;
                $stats['total'] = $stats['sub']+$stats['tax'];
            }
        }
        return $stats;
    }
}