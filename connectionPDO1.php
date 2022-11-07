<?php
        $servername = "localhost";
        $database = "celke"; 
        $username = "root";
        $password = "";
        $sql = "mysql:host=$servername;dbname=$database; $username, $password";
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dsn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        // Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
        try { 
          $dsn = new PDO($sql, $username, $password, $dsn_Options);
          echo "Connected Successfully";
        } catch (PDOException $error) {
          echo 'Connection error: ' . $error->getMessage();
        }