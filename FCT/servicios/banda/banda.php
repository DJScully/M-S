<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Surprizo </title>
    <link rel="stylesheet" href="../../CSS/banda.css">
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
                        <li class="list-group-item"> <a href="../.."><button class="bot">Principal</button></a></li>
                        <li class="list-group-item"> <a href="../../Q_somos/quienes.html"><button class="bot">Quienes somos</button></a>   </li>
                        <li class="list-group-item"> <a href="../"><button class="bot">Servicios</button></a> </li>                        
                        <li class="list-group-item"> <a href="#"><button class="bot">Foro</button></a></li>
                        <li class="list-group-item"> <a href="../../Registro/login.html"><button class="bot">Log in</button></a></li>
                    </ul>
            </div>
        </div>
    </header>

  

    <section class="fullWidth">

        <div class="container container1270">
            
            <form action= "" method="post" class="registro">

                <h2 class="titulo"> Estilo instrumental </h2>

                <select name="style" id="id_style" class="select">
                <option class="opcion" value="null">Escoga estilo</option>
                    <option class="opcion" value="electro">Acústica</option>
                    <option class="opcion" value="concierto">Eléctrica</option>
                </select>
                
                <div class="inactive">
                    <label class="lab" for="id_calle">Dirección del Evento</label>
                    <input class="test"  type="text" name="calle" id="id_calle">

                    <div class="hora">
                        <div class="time">
                            <label class="lab" for="id_hora">Hora de Llegada</label>
                            <input class="test"  type="datetime-local" name="hora" id="id_hora">
                    </div>

                    
                    </div>
                    
                    <label for="id_duracion" class="lab"> Tiempo de Servicio </label>
                    <input class="test" type="number" name="alquiler" id="id_duracion">
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
    <script src="../../JS/banda.js"></script>
</body>
</html>