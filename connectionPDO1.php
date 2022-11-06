<?php
        $servername = "mysql.hostinger.com";
        $database = "u266072517_name"; 
        $username = "u266072517_user";
        $password = "buystuffpwd";
        $sql = "mysql:host=$servername;dbname=$database;";
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dsn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        // Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
        try { 
          $dsn = new PDO($sql, $username, $password, $dsn_Options);
          echo "Connected Successfully";
        } catch (PDOException $error) {
          echo 'Connection error: ' . $error->getMessage();
        }