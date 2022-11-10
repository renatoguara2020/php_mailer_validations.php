<?php

 // Definimos dos constantes con el nombre de usuario y su palabra clave
 define('USUARIO', 'root');
 define('PASSWORD', '123456');
 
   // Comprobamos si existe el nombre de usuario y es correcto
   if (!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != $usuario || $_SERVER['PHP_AUTH_PW'] != $password)){
      header('WWW-Authenticate: Basic realm="Zona Restrita do site!!!!" ');
      header('HTTP/1.0 401 Unauthorized');
      echo 'ZONA RESTRINGIDA: se requiere autorización.';
      exit();
      }else{

         try{
         
            $conn = new PDO("mysql:host=localhost;dbname=login", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            // $conn->exec("set names utf8");
            $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
            $query = "SELECT * FROM autenticar WHERE username = '$usuario' and password = '$password'";

         }catch(PDOException $e){

            echo $e->getMessage();
         }
        
        
         
      echo '<h2 align="center">Zona Restrita do site !!!</h2>';
      echo '<p>Bom dia USUARIO'.' '.$_SERVER['PHP_AUTH_USER']. '</p>';
   }