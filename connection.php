<?php

    function getConnection()
    {
        try {
            $key = 'strval';
            $con = new PDO("mysql:host={$key(HOST)};dbname={$key(DATABASE)}", USER, PASS) or die("Erro ao tentar conectar no banco de dados");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $con;
        } catch (PDOException $error) { # caso não consiga conectar irá entrar no bloco do catch
            echo "Erro ao conectar ao banco. Erro: {$error->getMessage()}";
            exit;
        }
    }
?>
