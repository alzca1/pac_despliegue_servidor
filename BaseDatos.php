<?php

function createConnection($database)
{
    $host = "localhost";
    $user = "root";
    $password = "";

    $connection = mysqli_connect($host, $user, $password, $database);
    if (!$connection) {
        die("<br> Error de conexión con la base de datos: " . mysqli_connect_error());
    }

    return $connection;
}

function authenticateUSer($username, $email)
{
    $DB = createConnection("pac3_daw");

    $sql = "SELECT * FROM user WHERE FullName='" . $username . "' AND Email='" . $email . "'";
    $result = mysqli_query($DB, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "Ha habido un error con tu usuario y/o contraseña";
        echo "<script> console.log('error en la función authenticateUser')</script>";
    }

    mysqli_close($DB);

}

function killSession()
{
    $_SESSION = null;
    session_destroy();
    
}
