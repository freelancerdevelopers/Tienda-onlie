<?php

class Usuario{
    private $id_usuario;
    private $nombre_usuario;
    private $email_usuario;
    private $password_usuario;
    private $rol_usuario;
    private $avatar_usuario;
    private $db; 
    
    public function __construct() {
        $this->db = DataBase::connect();
    }
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getEmail_usuario() {
        return $this->email_usuario;
    }

    function getPassword_usuario() {
        return password_hash($this->db->real_escape_string($this->password_usuario), PASSWORD_BCRYPT, ['cost' => 4]);  
    }

    function getRol_usuario() {
        return $this->rol_usuario;
    }

    function getAvatar_usuario() {
        return $this->avatar_usuario;
    }

    function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    function setNombre_usuario($nombre_usuario){
        $this->nombre_usuario =  $this->db->real_escape_string($nombre_usuario);
    }

    function setEmail_usuario($email_usuario){
        $this->email_usuario  =  $this->db->real_escape_string($email_usuario);
    }

    function setPassword_usuario($password_usuario){
        $this->password_usuario = $password_usuario;
    }

    function setRol_usuario($rol_usuario){
        $this->rol_usuario = $this->db->real_escape_string($rol_usuario);
    }

    function setAvatar_usuario($avatar_usuario) {
        $this->avatar_usuario = $this->db->real_escape_string($avatar_usuario);
    }
    
    
    public function save() {
        $sql = "INSERT INTO tbl_usuarios VALUES(NULL, '{$this->getNombre_usuario()}','{$this->getEmail_usuario()}','{$this->getPassword_usuario()}','user','NULL');";
        //var_dump ($sql);
        //die();
        $save = $this->db->query($sql);
        $result = false; 
        if ($save){
            $result = true;
        }
        return $result;
    }
    
    public function login() {
        $result = false;
        $email = $this->email_usuario;
        $password = $this->password_usuario;     
        //comprobar si existe
        $sql = "SELECT * FROM tbl_usuarios WHERE email_usuario = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            //var_dump($usuario);
            //verifico pass
            $verify = password_verify($password, $usuario->password_usuario);
            if($verify){
                $result = $usuario;
            }else{
                $result = false;
            }
        }
        return $result;
    }
    
    
    

}

?>