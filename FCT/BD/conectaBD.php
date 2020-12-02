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

    public static function singleton(){

        if (!isset(self::$instancia)) {
    
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia->db;
    }
    
            
    }  


?>
