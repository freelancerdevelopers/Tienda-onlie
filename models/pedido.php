<?php


class Pedido{
    private $id_pedido;
    private $id_usuario;
    private $direccion_pedido;
    private $ciudad_pedido;
    private $coste_pedido;
    private $fecha_pedido;
    private $hora_pedido;
    private $zip_pedido;
    private $db; 
    
    public function __construct() {
        $this->db = DataBase::connect();
    }
    
    public function getId_pedido() {
        return $this->id_pedido;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getDireccion_pedido() {
        return $this->direccion_pedido;
    }
    public function getCiudad_pedido() {
        return $this->ciudad_pedido;
    }

    public function setCiudad_pedido($ciudad_pedido) {
        $this->ciudad_pedido = $this->db->real_escape_string($ciudad_pedido);
        return $this;
    }

    public function getCoste_pedido() {
        return $this->coste_pedido;
    }

    public function getFecha_pedido() {
        return $this->fecha_pedido;
    }

    public function getHora_pedido() {
        return $this->hora_pedido;
    }

    public function setId_pedido($id_pedido) {
        $this->id_pedido = $id_pedido;
        return $this;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    public function setDireccion_pedido($direccion_pedido) {
        $this->direccion_pedido = $this->db->real_escape_string($direccion_pedido);
        return $this;
    }

   

    public function setCoste_pedido($coste_pedido) {
        $this->coste_pedido = $coste_pedido;
        return $this;
    }

    public function setFecha_pedido($fecha_pedido) {
        $this->fecha_pedido = $fecha_pedido;
        return $this;
    }

    public function setHora_pedido($hora_pedido) {
        $this->hora_pedido = $hora_pedido;
        return $this;
    }
    
    public function getZip_pedido() {
        return $this->zip_pedido;
    }

    public function setZip_pedido($zip_pedido) {
        $this->zip_pedido = $this->db->real_escape_string($zip_pedido);
        return $this;
    }

    public function getPedidos(){
        $sql="SELECT * TBL_Pedidos ORDEN BY id_pedido DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
   
    
    
    
    public function getSelectProducto(){
        $sql="SELECT * FROM TBL_Pedido WHERE id_pedido = {$this->getId_pedido()} ORDER BY id_pedido DESC;";
        $producto = $this->db->query($sql);
        $producto = $producto->fetch_object();
        return $producto;
    }
    
    
    public function save() {
        $sql = "INSERT INTO TBL_Pedidos (id_usuario, ciudad_pedido, costo_pedido, direccion_pedido, estado_pedido, fecha_pedido, hora_pedido, zip_pedido) "
                . "VALUES({$this->getId_usuario()}, '{$this->getCiudad_pedido()}', '{$this->getCoste_pedido()}', '{$this->getDireccion_pedido()}', 'CONFIRMADO', CURDATE(), CURTIME(), '{$this->getZip_pedido()}');";
        $save = $this->db->query($sql);
        $result = false; 
        if ($save){
            $result = true;
        }
        return $result;
    }
    
    public function save_relacion() {
        $sql_last_insert = "SELECT LAST_INSERT_ID() AS 'id_lastPedido';";
        $last_insert = $this->db->query($sql_last_insert);
        $id_last_insert_pedido = $last_insert->fetch_object()->id_lastPedido;
       
         $t = count($_SESSION['carrito']);
         for ($i = 0; $i <= $t; $i++) {
             $sql = "INSERT INTO TBL_Rel_Pedidos_Productos (id_pedido, id_producto, unidades_rel_ped_pro) "
                              . "VALUES({$id_last_insert_pedido}, {$_SESSION['carrito'][$i]['id_producto']}, {$_SESSION['carrito'][$i]['unidad_producto']});";
             $save_relacion = $this->db->query($sql);
                if ($save_relacion){
                   $result = true;
               }
         }
          return $result; 
    }
    
    public function getPedidosByUser() {
            $sql = "SELECT tu.nombre_usuario , tb.id_pedido , tb.ciudad_pedido , tb.costo_pedido , tb.direccion_pedido , tb.estado_pedido , tb.fecha_pedido , tb.hora_pedido ,tb.zip_pedido 
                    FROM tienda_master.TBL_Usuarios as tu , tienda_master.TBL_Pedidos as tb
                    WHERE tu.id_usuario  = tb.id_usuario 
                    AND tu.id_usuario  = {$this->getId_usuario()};";
            $pedidos = $this->db->query($sql);
            return $pedidos;
    }
    
    public function getPedidoSelect() {
            $sql = "SELECT tp.nombre_producto , tp.descripcion_producto , tp.precio_producto , tp.imagen_producto,  tr.unidades_rel_ped_pro 
                FROM TBL_Rel_Pedidos_Productos as tr, TBL_Productos as tp 
                WHERE tr.id_pedido = {$this->getId_pedido()}
                AND   tr.id_producto  = tp.id_producto ; ";
            $pedido = $this->db->query($sql);
            return $pedido;
    }
    
    public function getPedidosGestion() {
        $sql="SELECT tu.nombre_usuario , tb.id_pedido , tb.ciudad_pedido , tb.costo_pedido , tb.direccion_pedido , tb.estado_pedido , tb.fecha_pedido , tb.hora_pedido ,tb.zip_pedido 
                FROM TBL_Usuarios as tu , TBL_Pedidos as tb
                WHERE tu.id_usuario  = tb.id_usuario 
                ORDER BY  tb.fecha_pedido ;";
        $pedidos = $this->db->query($sql);
        return $pedidos;
    }
    
    public function getCoste() {
        $sql = "SELECT SUM(costo_pedido) as total FROM TBL_Pedidos;";
        $total = $this->db->query($sql);
        $total = $total->fetch_object();
        return $total;                
    }

   
    
}

?>
