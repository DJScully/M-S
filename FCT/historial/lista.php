<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="../CSS/historial.css">
    <title>Document</title>
</head>
<body>
    <header class="principal fullWidth">
        <div class="container container1270">
            <div class="logo_meet">
                <img src="../img/Meet & Surprizo.png" alt="Meet & Surprizo" class="logo">
            </div>
            <div class="barra">
            <button class="toogle" id="toogle">☰</button>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item"> <a href=".."><button class="bot">Principal</button></a></li>
                        <li class="list-group-item"> <a href="../Q_somos/quienes.html"><button class="bot">Quienes somos</button></a>   </li>
                        <li class="list-group-item"> <a href="../servicios/opcion.html"><button class="bot">Servicios</button></a> </li>                        
                        <li class="list-group-item"> <a href="#"><button class="bot">Foro</button></a></li>
                        <li class="list-group-item"> <a href="../login.php"><button class="bot">Log in</button></a></li>
                    </ul>
            </div>
        </div>
    </header>
    <section class="informe">
        <?php

        if(empty($_SESSION["Correo"])){
            header("location: ../Registro/login.php");
        } else {
            include("../BD/tablas.php");

            $diario = new tablas();
            $nya = $diario->informes($_SESSION["Correo"]);
            echo "<table class='historial'>";
            echo "<th class='sector'>Correo</th>";
               
                
            echo "<th class='sector'>Estilo</th>";
        
      
            echo "<th class='sector'>Dirección</th>";
        
       
            echo "<th class='sector'>Fecha</th>";
            for ($i=0; $i <count($nya) ; $i++) { 

               
                   
                
                echo "<tr class='sector'>";
                for ($j=0; $j < 4; $j++) { 
                    echo "<td class='statue'>".$nya[$i][$j]. "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        }
        ?>
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
    <script src="../Js/historial.js"></script>
</body>
</html>