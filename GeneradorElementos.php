<?php

include "./BaseDatos.php";

function generateEmptyArticleForm()
{
    $articlesCount = countArticles();
    $count = mysqli_fetch_assoc($articlesCount);
    $categoryList = getCategories();

    echo "<form action='formArticulos.php' method='POST'>
    <label for='id'>ID: </label>
    <input required disabled type='number' value='" . $count["COUNT(ProductID)"] + 1 . "' />
    <label for='category'>Category</label>
    <select name='category'>";

    if ($categoryList) {
        while ($row = mysqli_fetch_assoc($categoryList)) {
            echo "<option value='" . $row["CategoryID"] . "'>" . $row["Name"] . "</option>";
        }
    } else {
        echo "Hubo un problema cargando las categorías";
    }

    echo "
    </select>
    <label for='name'>Name: </label>
    <input required type='text' name='name'>
    <label for='cost'>Cost: </label>
    <input required type='number' name='cost'>
    <label for='price'>Price: </label>
    <input required type='number' name='price'>

    <input type='submit' name='login' value='Entrar' />
    </form>";

}

function generateFilledArticleForm($id)
{

    $articlesCount = countArticles();
    $count = mysqli_fetch_assoc($articlesCount);
    $categoryList = getCategories();
    $articleData = getArticle($id);
    $article = mysqli_fetch_assoc($articleData);

    if ($articlesCount && $categoryList && $articleData) {
        echo "<form action='formArticulos.php' method='POST'>
        <label for='id'>ID: </label>
        <input required disabled type='number' value='" . $article["ProductID"] . "' />
        <label for='category'>Category</label>
        <select name='category'>";

        if ($categoryList) {
            while ($row = mysqli_fetch_assoc($categoryList)) {
                if ($row["CategoryID"] == $article["CategoryID"]) {
                    echo "<option value='" . $row["CategoryID"] . "' selected>" . $row["Name"] . "</option>";
                } else {
                    echo "<option value='" . $row["CategoryID"] . "'>" . $row["Name"] . "</option>";
                }
            }
        } else {
            echo "Hubo un problema cargando las categorías";
        }

        echo "
        </select>
        <label for='name'>Name: </label>
        <input required type='text' name='name' value='" . $article["Name"] . "'>
        <label for='cost'>Cost: </label>
        <input required type='number' name='cost' value='" . $article["Cost"] . "'>
        <label for='price'>Price: </label>
        <input required type='number' name='price' value='" . $article["Price"] . "'>

        <input type='submit' name='login' value='Entrar' />
        </form>";

    }
    ;

}
