<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include("tablas.php");
$option;$dir;$hora;$aceptada;
$good = false;
if(isset($_POST["Enviar"])){
    if(isset($_POST["usr"]) && !empty($_POST["usr"])){
        $option = $_POST["usr"];
    }

    if (isset($_POST["pass"]) && !empty($_POST["pass"])) {
        $dir = $_POST["pass"];
    }

    if (isset($_POST["conf"]) && !empty($_POST["conf"])) {
        $hora = $_POST["conf"];

        if (strcmp($_POST["conf"],$_POST["pass"])) {

        }
    }

    if (isset($_POST["cooreo"]) && !empty($_POST["cooreo"])) {

           $dura = $_POST["cooreo"];$good = true;
       
    }

  
    
}

if(isset($_POST["Enviar"]) && $good == true){
    $new = new tablas();

    $new->anadirUsuario($option,$dir,$dura);
    $new->buscar($dura,$dir);
}

?>
    <form action= "<?php $_SERVER["PHP_SELF"] ?>" method="post" class="registro">

    <h2 class="titulo">REGISTRO</h2>
                    <label class="lab" for="id_usuario">Nombre de Usuario</label>
                    <input class="test" type="text" name="usr" id="id_usuario" placeholder="Usuario">
                    <label class="lab" for="id_pass">Contraseña</label>
                    <input class="test" type="password" name="pass" id="id_pass" placeholder="Contraseña">
                    <label class="lab" for="id_usuario">Confirmar Contraseña</label>
                    <input class="test" type="password" name="conf" id="id_conf" placeholder="Confirmar Contraseña">
                    <label class="lab" for="id_correo">Correo Electronico</label>
                    <input class="test" type="text" name="cooreo" id="id_correo" placeholder="insertar_correo@aqui.com">
                    <div class="requisitos">
                        <input type="checkbox" name="terminos" id="id_term" value="aceptada"> 
                        <label for="id_term">He leido y acepto los <a href="#" target="_blank"> terminos y condiciones </a></label>
                    </div>
                    <input class="test sub" type="submit" name="Enviar">
        </form>

</body>
</html>