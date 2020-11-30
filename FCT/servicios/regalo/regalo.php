<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Surprizo </title>
    <link rel="stylesheet" href="../../CSS/regalos.css">
    <link rel="shortcut icon" href="../../img/ms-icon-310x310.png" type="image/x-icon">
</head>
<body>
    <header class="principal fullWidth">
        <div class="container container1270">
            <div class="logo_meet">
                <img src="../../img/Meet & Surprizo.png" alt="Meet & Surprizo" class="logo">
            </div>
            <div class="barra">
                <button class="toogle" id="toogle">☰</button>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item"> <a href=".."><button class="bot">Principal</button></a></li>
                        <li class="list-group-item"> <a href="../../Q_somos/quienes.html"><button class="bot">Quienes somos</button></a>   </li>
                        <li class="list-group-item"> <a href=".."><button class="bot">Servicios</button></a> </li>                        
                        <li class="list-group-item"> <a href="../../historial/lista.php"><button class="bot">Historial</button></a></li>
                        <li class="list-group-item"> <a href="../../Registro/login.php"><button class="bot">Log in</button></a></li>
                    </ul>
            </div>
        </div>
    </header>

   
    <section class="fullWidth">

        <div class="container container1270">

     <?php   
       

       include("../../BD/tablas.php");
           $name;$dirR;$dirE; $horaE;$horaR;$errores = [];
          
           if(empty($_SESSION["Correo"])){
                header("location: ../../Registro/login.php");
            } else {
           $good = false;$bien= false;
           if (isset($_POST["Enviar"])) {

                if (isset($_POST["name"]) && !empty("name")) {
                    
                  $name = $_POST["name"];
                    
                }else {
                    array_push($errores,"Por favor, introduzca un nombre");
                }

               if (isset($_POST["calle"]) && !empty($_POST["calle"])) {
                   $dirR = $_POST["calle"];
               } else {
                   array_push($errores,"No ha introducido dirección");
               }

               if (isset($_POST["place"]) && !empty($_POST["place"])) {

                $dirE = $_POST["place"];

                } else {

                array_push($errores,"No ha introducido dirección");

                }

               if (isset($_POST["hora1"]) && !empty($_POST["hora1"])) {
                   $mañana = time() + (2 * 24 * 60 * 60);
                 
                   $mañana =  date("Y-m-d G-i");
                   if ($_POST["hora1"] > $mañana) {
                       $horaR = $_POST["hora1"];
                       $good = true;
                   } else {
                       array_push($errores,"La fecha de recogida debe pedirse con 2 día de antelación");
                   }
               } else {
                   array_push($errores,"No ha introducido fecha");
               }

               if (isset($_POST["hora2"]) && !empty($_POST["hora2"])) {
                $mañana = time() + (3 * 24 * 60 * 60);
              
                $mañana =  date("Y-m-d G-i");
                if ($_POST["hora2"] > $mañana) {
                    $horaE = $_POST["hora2"];
                    $bien = true;
                } else {
                    array_push($errores,"La fecha de entrga debe pedirse mínimo 1 día despúes de la fecha de recogida");
                }
            } else {
                array_push($errores,"No ha introducido fecha");
            }
           }

           if (isset($_POST["Enviar"]) && $good == true) {
             
                $banda = new tablas();
                echo $name ."<br>";
                echo $dirR ."<br>";
                echo $dirE ."<br>";
                echo $horaR ."<br>";
                echo $horaE ."<br>";
               print_r($_SESSION);
               
                $banda->anadirRegalo($_SESSION["Nombre"],$dirR,$dirE,$horaR,$horaE);

                $banda->anadirServicio($_SESSION["Correo"],"Regalo",$dirR,$horaR);
                
                echo "<h2 class='title'> Gracias por utilizar nuestros servicios, en unos segundos, le enviaremos a la página principal</h2>";
                sleep(5);
                header("Location: ../../index.html");
           } else {

            ?>
            <form action= "<?php $_SERVER ["PHP_SELF"];?>" method="post" class="registro">


           
                 <label class="lab" for="id_nombre">Nombre del Destinatario</label>
                <input class="test" type="text" name="name" id="id_nombre">

                 <label class="lab" for="id_calle">Dirección de Recogida</label>
                 <input class="test"  type="text" name="calle" id="id_calle">

                 

                 <label class="lab" for="id_place">Dirección de entrega</label>
                 <input class="test"  type="text" name="place" id="id_place">
                 
                 <div class="hora">
                    <div class="time">
                        <label class="lab" for="id_hora">Hora de Recogida</label>
                        <input class="test"  type="datetime-local" name="hora1" id="id_hora">
                    </div>
                    
                    <div class="time">
                        <label class="lab" for="id_hora">Hora de Entrega</label>
                        <input class="test"  type="datetime-local" name="hora2" id="id_hora">
                    </div>
                    
                 </div>
                <input class="test sub" type="submit" name="Enviar">
                </form>
            <?php 
                for ($i=0; $i < count($errores); $i++) { 
                    echo "<p class='card-text'>".$errores[$i] ."</p><br>";
                }
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
      <script src="../../JS/form.js"></script>
  
</body>
</html>