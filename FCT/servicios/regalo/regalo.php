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
                
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item"> <a href=".."><button class="bot">Principal</button></a></li>
                        <li class="list-group-item"> <a href="../../Q_somos/quienes.html"><button class="bot">Quienes somos</button></a>   </li>
                        <li class="list-group-item"> <a href=".."><button class="bot">Servicios</button></a> </li>                        
                        <li class="list-group-item"> <a href="#"><button class="bot">Foro</button></a></li>
                        <li class="list-group-item"> <a href="../../Registro/login.html"><button class="bot">Log in</button></a></li>
                    </ul>
            </div>
        </div>
    </header>

   
    <section class="fullWidth">

        <div class="container container1270">
            
            <form action= "" method="post" class="registro">

            <?php
       

       include("../../BD/tablas.php");
           $estilo;$dir;$hora;$duracion;$errores = [];

           $good = false;
           if (isset($_POST["Enviar"])) {
               if (isset($_POST["style"]) && !empty("style")) {
                   if ($_POST["style"] == "electro" || $_POST["style"] == "concierto") {
                      $estilo = $_POST["style"];
                   } else {
                       array_push($errores,"Por favor, escoja un estilo");
                   }
               }

               if (isset($_POST["calle"]) && !empty($_POST["calle"])) {
                   $dir = $_POST["calle"];
               } else {
                   array_push($errores,"No ha introducido dirección");
               }

               if (isset($_POST["hora"]) && !empty($_POST["hora"])) {
                   $mañana = time() + (7 * 24 * 60 * 60);
                 
                   $mañana =  date("Y-m-d G-i");
                   if ($_POST["hora"] > $mañana) {
                       $hora = $_POST["hora"];
                       $good = true;
                   } else {
                       array_push($errores,"Se debe alquilar con una semana de antelación");
                   }
               } else {
                   array_push($errores,"No ha introducido fecha");
               }

               if (isset($_POST["alquiler"]) && !empty($_POST["alquiler"])) {
                   if ($_POST["alquiler"] > 2) {
                       $duracion = $_POST["alquiler"];
                   } else {
                       array_push($errores, "Las horas mínimas de alquiler son de 2 horas");
                   }
               }
           }

           if (isset($_POST["Enviar"]) && $good == true) {
             
               $banda = new tablas();

               $banda->anadirBanda($estilo,$dir,$hora,$duracion);
               $banda->anadirServicio("Banda",$dir,$hora);
           }

           ?>
                 <label class="lab" for="id_nombre">Nombre del Destinatario</label>
                <input class="test" type="text" name="name" id="id_nombre">

                 <label class="lab" for="id_calle">Dirección de Recogida</label>
                 <input class="test"  type="text" name="calle" id="id_calle">

                 

                 <label class="lab" for="id_place">Dirección de entrega</label>
                 <input class="test"  type="text" name="place" id="id_place">
                 
                 <div class="hora">
                    <div class="time">
                        <label class="lab" for="id_hora">Hora de Recogida</label>
                        <input class="test"  type="datetime-local" name="hora" id="id_hora">
                    </div>
                    
                    <div class="time">
                        <label class="lab" for="id_hora">Hora de Entrega</label>
                        <input class="test"  type="datetime-local" name="hora" id="id_hora">
                    </div>
                    
                 </div>
                <input class="test sub" type="submit" name="Enviar">
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