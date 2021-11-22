<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="./Articulos.php">Volver atrás</a>
<br>
<?php

// - Al llegar a la página se comprueba si existen variables GET
// - Si las variables existen, se pinta el formulario con los valores dentro de cada campo
// - Si las variables no existen, se pinta el formulario en blanco.
// - El botón del formulario será "Añadir" si se pinta vacío, "Modificar" si viene con datos
// y "Borrar" si viene con el valor de borrar.
// - Si es formulario en blanco => no hay variable en GET
// - Si es formulario modificar/borrar => hay variable en GET (modify || delete)

session_start();
include "./BaseDatos.php";
include "./GeneradorElementos.php";
$newArticle = true;

if (isset($_SESSION["user"]) && $_SESSION["enabled"] == 1) {
    echo "Bienvenido al formulario de creación de artículo <br>";

    if (isset($_GET["id"])) {
        $articleID = $_GET["id"];
        $articleData = getArticle($articleID);

        // generateFilledArticleForm($articleID);

    } else {
        generateEmptyArticleForm();
    }

} else {
    header("Location: http://localhost/pac/Acceso.php");
}

?>




</body>
</html>