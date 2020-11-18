<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Surprizo </title>
    <link rel="stylesheet" href="../CSS/registro.css">
    <link rel="shortcut icon" href="../img/ms-icon-310x310.png" type="image/x-icon">
</head>
<body>
    <header class="principal fullWidth">
        <div class="container container1270">
            <div class="logo_meet">
                <img src="../img/Meet & Surprizo.png" alt="Meet & Surprizo" class="logo">
            </div>
            <div class="barra">
                
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item"> <a href=".."><button class="bot">Principal</button></a></li>
                        <li class="list-group-item"> <a href="../Q_somos/quienes.html"><button class="bot">Quienes somos</button></a>   </li>
                        <li class="list-group-item"> <a href="../servicios/opcion.html"><button class="bot">Servicios</button></a> </li>                        
                        <li class="list-group-item"> <a href="#"><button class="bot">Foro</button></a></li>
                        <li class="list-group-item"> <a href="login.html"><button class="bot">Log in</button></a></li>
                    </ul>
            </div>
        </div>
    </header>
    <section class="fullWidth">

        <div class="container container1270">

        <?php 

include("../BD/tablas.php");

    $usr;
    $correo;
    $bandera;
    $pass;
    $errores=[];
    $good = false;
    $bien = false;

    if(isset($_POST["Enviar"])){

        if(isset($_POST["usr"]) && !empty($_POST["usr"])){
            $usr = $_POST["usr"];
        }

        if(isset($_POST["correo"]) && !empty($_POST["correo"])){

            $correo = $_POST["correo"];
            $good = true;

          
         
        } else {

           array_push($errores,"No se ha introducido ningún correo electrónico");

        }

        if(isset($_POST["pass"]) && !empty($_POST["pass"])){

                if(strlen($_POST["pass"]) >=8){
                    $arr = str_split($_POST["pass"]);
                    $cont = 0;
                    for ($i=0; $i < count($arr); $i++) { 

                       if(ord($arr[$i]) > 64 && ord($arr[$i]) < 90 ){
                        $cont +=1;
                        }

                        if(ord($arr[$i]) < 58 && ord($arr[$i]) > 47 ){
                            $cont +=1;
                        } 
                        if ($cont == 2) {
                            $bien = true;
                           $pass = $_POST["pass"];
                        }
                    }
                } else {
                    array_push($errores,"La contraseña debe contener más de 8 caracteres");
                }

        } else {

            array_push($errores,"No se ha introducido ninguna contraseña");

        }

        if(isset($_POST["conf"]) && !empty($_POST["conf"])){
            if (strcmp($_POST["conf"],$_POST["pass"]) === 0) {
                
                $good = true;
            } else {
                array_push($errores,"Las contraseñas no coinciden");               
            }
        }

        if(isset($_POST["terminos"]) && !empty($_POST["terminos"])){
            $bandera = true;
        } else {
            array_push($errores,"Acepte los terminos y condiciones");
        }


    

    }




    if(isset($_POST["Enviar"]) && $good == true && $bien == true && $bandera == true){
        $db = new tablas();

        $new = $db->anadirUsuario($usr,$pass,$correo);

        setcookie("Usuario",$new,3600);
       
        
    } else

    

?>
            
            <form action="" method="post" class="registro">
                <h2 class="titulo">REGISTRO</h2>
                    <label class="lab" for="id_usuario">Nombre de Usuario</label>
                    <input class="test" type="text" name="usr" id="id_usuario" placeholder="Usuario">
                    <label class="lab" for="id_pass">Contraseña</label>
                    <input class="test" type="password" name="pass" id="id_pass" placeholder="Contraseña">
                    <label class="lab" for="id_usuario">Confirmar Contraseña</label>
                    <input class="test" type="password" name="conf" id="id_conf" placeholder="Confirmar Contraseña">
                    <label class="lab" for="id_correo">Correo Electronico</label>
                    <input class="test" type="text" name="correo" id="id_correo" placeholder="insertar_correo@aqui.com">
                    <div class="requisitos">
                        <input type="checkbox" name="terminos" id="id_term" value="acepto"> 
                        <label for="id_term">He leido y acepto los <a href="#" target="_blank"> terminos y condiciones </a></label>
                    </div>
                    <input class="test sub" type="submit" name="Enviar">
                </form>
                <?php 
                        {
                            for ($i=0; $i <count($errores); $i++) { 
                                echo "<p>". $errores[$i]."</p>";
                            }
                        }
                    ?>
        </div>

       

    </section>
     <footer class="foot fullWidth">
            <div class="container container1270">
                <h3>Siguenos en nuestras redes sociales!!</h3>
                <ul class="final">
                    <li class="final-list"> <a href="#"> Facebook </a> </li>
                    <li class="final-list"> <a href="#"> Twitter </a></li>
                    <li class="final-list"> <a href="#"> Instagram </a></li>
                    <li class="final-list"> <a href="#"> Snapchat </a></li>
                </ul>
            </div>
        </footer>

</body>
</html>