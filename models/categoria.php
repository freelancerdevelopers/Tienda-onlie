<?php

class Categoria{
    private $id_categoria;
    private $nombre_categoria;
    private $db; 
    
    public function __construct() {
        $this->db = DataBase::connect();
    }
    
    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre_categoria() {
        return $this->nombre_categoria;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
        
    }

    public function setNombre_categoria($nombre_categoria) {
        $this->nombre_categoria = $this->db->real_escape_string($nombre_categoria);
        
    }
    
    public function getCategoria (){
        $sql = "SELECT * FROM tbl_categorias ORDER BY id_categoria DESC;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    
    public function getSelectCategoria (){
        $sql = "SELECT * FROM tbl_categorias WHERE id_categoria = '{$this->getId_categoria()}';";
        $categoria = $this->db->query($sql);
        $categoria = $categoria->fetch_object();
        return $categoria;
    }
    
    public function save() {
        $sql = "INSERT INTO tbl_categorias VALUES(NULL, '{$this->getNombre_categoria()}');";
        $save = $this->db->query($sql);
        $result = false; 
        if ($save){
            $result = true;
        }
        return $result;
    }


    
    
}

?>