<?php
session_start();
// se crea la sesion con los datos traidos por POST
$texto="";
$prefereciaES = 0;
$fpes = fopen("categorias_es.txt","r");


if (isset($_COOKIE["cookitaP"]) && $_COOKIE["cookitaP"] != ""){
    if(isset($_GET)){
        if($_GET["click"]== 0){
            $prefereciaES = 2;
            setcookie("cookitaLang",$prefereciaES,time() + (60*60));
        }
    }
}

if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])){
    header("Location: index.php");
};

?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>PANEL PRINCIPAL</h1>
    <H3>Bienvenido Usuario: <?php echo $_SESSION["s_nombre"]  ?></H3>
    <nav>
        <a href="pagES.php?click=0">ES(Español)</a>
        <a href="pagEN.php?click=1">EN(English)</a>
        <br>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
    </nav>
    <h2>Lista de Prodcutos</h2>
    <p><?php while(!feof($fpes)){
        $cadena = fgets($fpes);
        $texto = nl2br($cadena);
        echo $texto;
        }
        fclose($fpes); ?>
    </p>
</body>
</html>