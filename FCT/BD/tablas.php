<?php 

include("conectaBD.php");
class tablas extends conectaBD{ 

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

        function anadirRegalo($usr,$dir_recogida,$dir_entrega,$hora_recogida,$hora_entrega){

            $sql = $this->db->prepare("INSERT INTO usuarios (nombre, D_recogida, D_llegada, H_recogida, H_llegada) VALUES (:usr, :dir_recogida, :dir_entrega
             :hora_recogida, :hora_entrega)");
           
            $sql->bindParam(":usr", $usr);
            $sql->bindParam(":dir_recogida", $hash);
            $sql->bindParam(":dir_entrega", $correo);
            $sql->bindParam(":hora_recogida", $hash);
            $sql->bindParam(":hora_entrega", $correo);

            if ($sql->execute()) {
                echo "New record created successfully";
                
              } else {
                echo "Unable to create record";
               
              }
        }

        function anadirBanda($Estilo,$D_Evento,$H_recogida,$H_contratadas){

            
            $sql = $this->db->prepare("INSERT INTO banda (Estilo, D_Evento, H_recogida, H_contratadas) VALUES (:usr, :pass, :correo,:H_contratadas)");
            $sql->bindParam(":usr", $Estilo);
            $sql->bindParam(":pass", $D_Evento);
            $sql->bindParam(":correo", $H_recogida);
            $sql->bindParam(":H_contratadas", $H_contratadas);
           

            if ($sql->execute()) {
                echo "New record created successfully";
                
              } else {
                echo "Unable to create record";
               
              }
        }

        function anadirServicio($Estilo,$D_Evento,$H_recogida){

            /*CREATE TABLE IF NOT EXISTS historial (Estilo varchar(255) NOT NULL,
        D_Evento varchar(255) NOT NULL,
        Fecha datetime NOT NULL PRIMARY KEY)*/
            $sql = $this->db->prepare("INSERT INTO historial (Estilo, D_Evento, Fecha) VALUES (:usr, :pass, :correo)");
            $sql->bindParam(":usr", $Estilo);
            $sql->bindParam(":pass", $D_Evento);
            $sql->bindParam(":correo", $H_recogida);
          
           

            if ($sql->execute()) {
                echo "New record created successfully";
                
              } else {
                echo "Unable to create record";
               
              }
        }

        function buscar($correo,$pass){
            $sql = $this->db->prepare("SELECT nombre, contraseña FROM usuarios WHERE correo=:correo");
            $sql->bindParam(":correo", $correo);
            
            $sql->execute();
            $res = $sql->fetchAll();
            $name=$res[0]["nombre"];

            if(password_verify($pass, $res[0]["contraseña"])){
                echo "<br> Hola ".$res[0]["contraseña"] . " " . $name;

            }

            setcookie("Nombre", $name, time()+3600);

            echo $_COOKIE["Nombre"];
            
        }

    }



 ?>

 