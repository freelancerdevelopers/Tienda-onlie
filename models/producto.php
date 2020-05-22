<?php

class Producto{
    private $id_producto;
    private $id_categoria;
    private $nombre_producto;
    private $descripcion_producto;
    private $precio_producto;
    private $stock_producto;
    private $oferta_producto;
    private $fecha_producto;
    private $imagen_producto;
    private $db; 
    
    public function __construct() {
        $this->db = DataBase::connect();
    }
    
    public function getId_producto() {
        return $this->id_producto;
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre_producto() {
        return $this->nombre_producto;
    }

    public function getDescripcion_producto() {
        return $this->descripcion_producto;
    }

    public function getPrecio_producto() {
        return $this->precio_producto;
    }

    public function getStock_producto() {
        return $this->stock_producto;
    }

    public function getOferta_producto() {
        return $this->oferta_producto;
    }

    public function getFecha_producto() {
        return $this->fecha_producto;
    }

    public function getImagen_producto() {
        return $this->imagen_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
        return $this;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
        return $this;
    }

    public function setNombre_producto($nombre_producto) {
        $this->nombre_producto = $nombre_producto;
        return $this;
    }

    public function setDescripcion_producto($descripcion_producto) {
        $this->descripcion_producto = $descripcion_producto;
        return $this;
    }

    public function setPrecio_producto($precio_producto) {
        $this->precio_producto = $precio_producto;
        return $this;
    }

    public function setStock_producto($stock_producto) {
        $this->stock_producto = $stock_producto;
        return $this;
    }

    public function setOferta_producto($oferta_producto) {
        $this->oferta_producto = $oferta_producto;
        return $this;
    }

    public function setFecha_producto($fecha_producto) {
        $this->fecha_producto = $fecha_producto;
        return $this;
    }

    public function setImagen_producto($imagen_producto) {
        $this->imagen_producto = $imagen_producto;
        return $this;
    }

    public function getProducto(){
        $sql="SELECT id_producto, nombre_categoria, nombre_producto, descripcion_producto, precio_producto , stock_producto , oferta_producto ,fecha_producto , imagen_producto 
        FROM TBL_Productos as tp , TBL_Categorias as tc 
        WHERE tp.id_categoria  = tc.id_categoria 
        ORDER BY id_producto DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function getProductosForCat(){
        $sql="SELECT id_producto, nombre_categoria, nombre_producto, descripcion_producto, precio_producto , stock_producto , oferta_producto ,fecha_producto , imagen_producto 
        FROM TBL_Productos as tp , TBL_Categorias as tc 
        WHERE tp.id_categoria  = tc.id_categoria AND
        tp.id_categoria = {$this->getId_categoria()}
        ORDER BY id_producto DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    
    public function getSelectProducto(){
        $sql="SELECT * FROM TBL_Productos WHERE id_producto = {$this->getId_producto()} ORDER BY id_producto DESC;";
        $producto = $this->db->query($sql);
        $producto = $producto->fetch_object();
        return $producto;
    }
    
    
    public function save() {
        $sql = "INSERT INTO tbl_productos (id_categoria,nombre_producto, descripcion_producto, precio_producto, stock_producto, oferta_producto, fecha_producto, imagen_producto) VALUES('{$this->getId_categoria()}', '{$this->getNombre_producto()}', '{$this->getDescripcion_producto()}', '{$this->getPrecio_producto()}', '{$this->getStock_producto()}', '{$this->getOferta_producto()}', '{$this->getFecha_producto()}', '{$this->getImagen_producto()}');";
        $save = $this->db->query($sql);
        $result = false; 
        if ($save){
            $result = true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM tbl_productos WHERE id_producto = {$this->id_producto}";
        $delete = $this->db->query($sql);
        $result = false; 
        if ($delete){
            $result = true;
        }
        return $result;
    }
    
    public function edit(){
        $sql = "UPDATE tbl_productos SET id_categoria = '{$this->getId_categoria()}', nombre_producto = '{$this->getNombre_producto()}', descripcion_producto = '{$this->getDescripcion_producto()}', precio_producto = '{$this->getPrecio_producto()}', stock_producto = '{$this->getStock_producto()}', oferta_producto = '{$this->getOferta_producto()}', fecha_producto = '{$this->getFecha_producto()}', imagen_producto = '{$this->getImagen_producto()}' WHERE id_producto = {$this->getId_producto()}";
        $save = $this->db->query($sql);
        $result = false; 
        if ($save){
            $result = true;
        }
        return $result;
    }

    
}

?>
