<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Surprizo </title>
    <link rel="stylesheet" href="../CSS/log.css">
    <link rel="shortcut icon" href="../img/ms-icon-310x310.png" type="image/x-icon">
    <script src="../JS/test.js"></script>
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
                        <li class="list-group-item"> <a href="#"><button class="bot">Log in</button></a></li>
                    </ul>
            </div>
        </div>
    </header>

    <section class="fullWidth">

        <div class="container container1270">

        <?php 

        include("../BD/tablas.php");

            $correo;$pass;$errores=[];
            $good = false;
            $bien = false;

            if(isset($_POST["Enviar"])){

                if(isset($_POST["correo"]) && !empty($_POST["correo"])){

                    $correo = $_POST["correo"];
                    $good = true;
                 
                } else {

                   array_push($errores,"No se ha introducido ningún correo electrónico");

                }

                if(isset($_POST["pass"]) && !empty($_POST["pass"])){

                    $pass = $_POST["pass"];
                    $bien = true;

                } else {

                    array_push($errores,"No se ha introducido ninguna contraseña");

                }

            }

   

        
            if(isset($_POST["Enviar"]) && count($errores) == 0){
                $db = new tablas();
                $new = $db->buscar($correo,$pass);
                setcookie("Usuario",$new,3600);
                
                
            } else

            
        
        ?>
            
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" class="registro">
                <h2 class="titulo">REGISTRO</h2>
                    <label class="lab" for="id_usuario">Correo</label>
                    <input class="test" type="text" name="correo" id="id_usuario" placeholder="Usuario">
                    <label class="lab" for="id_pass">Contraseña</label>
                    <input class="test" type="password" name="pass" id="id_pass" placeholder="Contraseña">

                    <?php 
                        {
                            for ($i=0; $i <count($errores); $i++) { 
                                echo "<p>". $errores[$i]."</p>";
                            }
                        }
                    ?>
                  
                    <input class="test sub" type="submit" name="Enviar">

                    <p>¿No tienes una cuenta? <a href="registro.php">Registrate ahora</a> </p>
                </form>

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