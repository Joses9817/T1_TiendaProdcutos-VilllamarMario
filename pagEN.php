<?php
session_start();
// se crea la sesion con los datos traidos por POST
$prefereciaEN = 0;
$textoEN= "";
$fpen = fopen("categorias_en.txt","r");


//se crea la prefrencia de idioma ingles solo si el usario escogio
//la opcion de ""Recuerdame"
if (isset($_COOKIE["cookitaP"]) && $_COOKIE["cookitaP"] != ""){
    if(isset($_GET)){
        if($_GET["click"]== 1){
            $prefereciaEN = 1;
            setcookie("cookitaLang",$prefereciaEN,time() + (60*60));
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
    <h2>Product List</h2>
    <p><?php while(!feof($fpen)){
        $cadena = fgets($fpen);
        $textoEN = nl2br($cadena);
        echo $textoEN;
        }
        fclose($fpen); ?>
    </p>
</body>
</html>