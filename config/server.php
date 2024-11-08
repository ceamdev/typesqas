<?php
/** Datos de conexion a base de datos, bajo constantes. */
    const DB_SERVER="localhost";
    const DB_NAME="typesqasdb";
    const DB_USER="root";
    const DB_PASS="";
    const DB_PORT="3306";

    $mysqli = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    /*
    * Esta es la forma OO "oficial" de hacerlo,
    * AUNQUE $connect_error estaba averiado hasta PHP 5.2.9 y 5.3.0.
    */
    if ($mysqli->connect_error) {
        die('Error de Conexión (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }