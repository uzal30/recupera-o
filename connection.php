<?php

    define("HOST", "");
    define("USER", "");
    define("PASS", "");
    define("DATABASE", "");

    $con = new PDO("mysql:host={$key(HOST)};dbname={$key(DATABASE)}", USER, PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>