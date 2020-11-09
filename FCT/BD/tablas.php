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
    }


    function creaTablaRegalo() { 
        
        $sql = "CREATE TABLE IF NOT EXISTS regalo (Nombre varchar(25) NOT NULL,
        D_recogida varchar(255)  NOT NULL,
        D_llegada varchar  NOT NULL,
        H_recogida datetime  NOT NULL PRIMARY KEY,
        H_llegada datetime  NOT NULL
        )";


        if( $this->db->exec($sql) !== false) return true;
        return false;
    }

    function creaTablabanda() { 

        $sql = "CREATE TABLE IF NOT EXISTS banda (Estilo varchar(25) NOT NULL,
        D_Evento varchar(255)  NOT NULL,
        H_recogida datetime  NOT NULL PRIMARY KEY,
        H_contratadas int  NOT NULL
        )";
   
   
        if( $this->db->exec($sql) !== false) return true;
            return false;
        }
   

    function servicio(){

        $sql = "CREATE TABLE IF NOT EXISTS historial (Estilo varchar(255) NOT NULL,
        D_Evento varchar(255) NOT NULL,
        Fecha datetime NOT NULL PRIMARY KEY
        )";
   
   
        if( $this->db->exec($sql) !== false) return true;
            return false;
        }
    }


$obj = new conectaBD(); // crea conexión para usar bd empresa

if ( $obj->creaTablaRegalo() ){

    echo 'tabla Tasks table creada';

} else{

    echo 'Error al crear table Task';

} 
 ?>