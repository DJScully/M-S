<?php 
class conectaBD{ 

    protected $db;

    function __construct(){ 

        $dsn = 'mysql:host=localhost;dbname=meet;charset=utf8' ;
        $usuario='Jordan';
        $pass ='Nohay2sin3';
        try { 
            $this->db = new PDO( $dsn, $usuario, $pass );
        } catch ( PDOException $e) {
            die( "¡Error!: " . $e->getMessage() . "<br/>");
        }
    }

        function creaTablaRegistro(){

        $sql = "CREATE TABLE IF NOT EXISTS usuarios (Nombre varchar(25) NOT NULL,
        contraseña varchar(255)  NOT NULL,
        correo varchar(255)  NOT NULL PRIMARY KEY
        )";

if( $this->db->exec($sql) !== false) return true;
return false;
    }


        function creaTablaRegalo() { 
        
        $sql = "CREATE TABLE IF NOT EXISTS regalo (Nombre varchar(25) NOT NULL,
        D_recogida varchar(255)  NOT NULL,
        D_llegada varchar  NOT NULL,
        H_recogida datetime  NOT NULL PRIMARY KEY,
        H_llegada datetime  NOT NULL)";


        if( $this->db->exec($sql) !== false) return true;
        return false;
    }

        function creaTablabanda() { 

        $sql = "CREATE TABLE IF NOT EXISTS banda (Estilo varchar(25) NOT NULL,
        D_Evento varchar(255)  NOT NULL,
        H_recogida datetime  NOT NULL PRIMARY KEY,
        H_contratadas int  NOT NULL)";
   
   
        if( $this->db->exec($sql) !== false) return true;
            return false;
        }
   

        function servicio(){

        $sql = "CREATE TABLE IF NOT EXISTS historial (Estilo varchar(255) NOT NULL,
        D_Evento varchar(255) NOT NULL,
        Fecha datetime NOT NULL PRIMARY KEY)";
   
   
        if( $this->db->exec($sql) !== false) return true;
            return false;
        }

        function anadirUsuario($usr,$pass,$correo){
            $sql = $this->db->prepare("INSERT INTO usuarios (nombre, contraseña, correo) VALUES (:usr, :pass, :correo)");
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql->bindParam(":usr", $usr);
            $sql->bindParam(":pass", $hash);
            $sql->bindParam(":correo", $correo);

            if ($sql->execute()) {
                echo "New record created successfully";
                
              } else {
                echo "Unable to create record";
                echo password_hash($pass, PASSWORD_DEFAULT);
              }
        }

        function anadirRegalo($usr,$pass,$correo){
            $sql = $this->db->prepare("INSERT INTO usuarios (nombre, contraseña, correo) VALUES (:usr, :pass, :correo)");
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql->bindParam(":usr", $usr);
            $sql->bindParam(":pass", $hash);
            $sql->bindParam(":correo", $correo);

            if ($sql->execute()) {
                echo "New record created successfully";
                
              } else {
                echo "Unable to create record";
                echo password_hash($pass, PASSWORD_DEFAULT);
              }
        }

        function anadirBanda($usr,$pass,$correo){
            $sql = $this->db->prepare("INSERT INTO usuarios (nombre, contraseña, correo) VALUES (:usr, :pass, :correo)");
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql->bindParam(":usr", $usr);
            $sql->bindParam(":pass", $hash);
            $sql->bindParam(":correo", $correo);

            if ($sql->execute()) {
                echo "New record created successfully";
                
              } else {
                echo "Unable to create record";
                echo password_hash($pass, PASSWORD_DEFAULT);
              }
        }

    }




$obj = new conectaBD(); // crea conexión para usar bd empresa

if ( $obj->creaTablaRegalo() ){

    echo 'tabla Tasks table creada';

} else{

    echo 'Error al crear table Task';

} 
$obj->creaTablaRegistro();
$obj->creaTablabanda();
$obj->servicio();

$usr = "Kevin";
$pass = "destroyed";
$correo = "aloha@gmail.com";

$obj->anadirUsuario($usr,$pass,$correo);
 ?>