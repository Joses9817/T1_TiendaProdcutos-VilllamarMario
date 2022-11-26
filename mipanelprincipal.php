<?php
session_start();
$_nombre = $_POST["nombre"];
$_clave = $_POST["clave"];
$gpreferencias = "";
$prefereciaEN = "";
$texto="";
$fpes = fopen("categorias_es.txt","r");
$fpen = fopen("categorias_en.txt","r");
$tituloes = "Lista de Prodcutos";
$tituloen = "Producto list";

// se crea la sesion con los datos traidos por POST
if(isset($_nombre) && isset($_clave)){
    $_SESSION["s_nombre"] = $_nombre;
    $_SESSION["s_clave"] = $_clave;
}

//se controla el inicio de sesion
if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])){
    header("Location: index.php");
};

//comprobar si las si el usario escogio preferencias
if(isset($_POST["chkrecuerdame"])){
    $gpreferencias = $_POST["chkrecuerdame"];
}

// La preferencia cmmbia segun lo escogido por el usuario
if (isset($_COOKIE["cookitaLang"]) && $_COOKIE["cookitaLang"] != ""){
    $prefereciaEN = $_COOKIE["cookitaLang"];
}
// se setea las Cookiess en caso de que el usario se recuerde
//caso contrario se eliminan
if($gpreferencias != ""){
    setcookie("cookitaN",$_nombre,0);
    setcookie("cookitaC",$_clave,0);
    setcookie("cookitaP",$gpreferencias,0);
}else {
    setcookie("cookitaN","");
    setcookie("cookitaC","");
    setcookie("cookitaP","");
    setcookie("cookitaLang","");
}


//muestra la pagina de preferencia
if($prefereciaEN == 1){
    $tituloes = $tituloen;
    $fpes = $fpen;
}

?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>PANEL PRINCIPAL</h1>
    <H3>Bienvenido Usuario: <?php echo $_SESSION["s_nombre"];   ?></H3>
    <nav>
        <a href="pagES.php?click=0">ES(Español)</a>
        <a href="pagEN.php?click=1">EN(English)</a>
        <br>
        <a href="cerrarSesion.php?">Cerrar Sesion</a>
    </nav>
    <h2><?php echo $tituloes ?> </h2>
    <p><?php while(!feof($fpes)){
        $cadena = fgets($fpes);
        $texto = nl2br($cadena);
        echo $texto;
        }
        fclose($fpes); ?>
    </p>
    
</body>
</html>