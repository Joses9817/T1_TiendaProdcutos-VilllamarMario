<?php
$preferencias= false;
$_nombre= "";
$_clave= "";
$c_nombre = "";
$c_clave = "";
$c_lang = false;

//comprubar si las preferncias estan creadas

if(isset($_COOKIE["cookitaP"]) && $_COOKIE["cookitaP"] != ""){
    $preferencias= true;
    $c_nombre = isset($_COOKIE["cookitaN"])?$_COOKIE["cookitaN"] : "";
    $c_clave = isset($_COOKIE["cookitaC"])?$_COOKIE["cookitaC"] : "";
    $c_lang = isset($_COOKIE["cookitaLang"])?$_COOKIE["cookitaLang"] : false;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MyTiendaRApida</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form method="POST" action="mipanelprincipal.php">
       <fieldset>
        <label for="nombre">Usuario*:</label>  
        <input type="text" name= "nombre" required value="<?php echo $c_nombre?>" > <br>
        <label for="clave">Clave*:</label>
        <input type="password" name = "clave" required value="<?php echo $c_clave ?>"> <br>
        <input type="checkbox" name= "chkrecuerdame"> Recuerdame
        <br>
        <br>
        <input type="submit" value="Enviar">
       </fieldset>
    </form>
    
</body>
</html>