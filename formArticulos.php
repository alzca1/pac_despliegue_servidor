<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


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
$newArticle = true;

if (isset($_SESSION["user"]) && $_SESSION["enabled"] == 1) {
    echo "Bienvenido al formulario de creación de artículo";
    // echo "Se va a añadir un artículo nuevo";
    // echo "Se va a borrar un artículo existente";
}

?>



<form action="formArticulos.php" method="POST">
    <label for="id">ID: </label>
    <?php
if ($newArticle) {
    $articlesCount = countArticles();
    $count = mysqli_fetch_assoc($articlesCount);
    echo "<input required disabled type='number' value='" . $count["COUNT(ProductID)"] + 1 . "' />";
} else {
    echo "<input required type='number' name='id'>";
}
?>

    <label for="category">Category</label>
    <select name="category">
        <?php

$categoryList = getCategories();

if ($categoryList) {
    while ($row = mysqli_fetch_assoc($categoryList)) {
        echo "<option value='" . $row["CategoryID"] . "'>" . $row["Name"] . "</option>";
    }
}

?>
    </select>
    <label for="name">Name: </label>
    <input required type="text" name="name">
    <label for="cost">Cost: </label>
    <input required type="number" name="cost">
    <label for="price">Price: </label>
    <input required type="number" name="price">

    <input type="submit" name="login" value="Entrar" />
    </form>
</body>
</html>