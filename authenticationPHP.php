<?php

 // Definimos dos constantes con el nombre de usuario y su palabra clave
 define('USUARIO', 'root');
 define('PASSWORD', '123456');
 
   // Comprobamos si existe el nombre de usuario y es correcto
   if (!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != USUARIO || $_SERVER['PHP_AUTH_PW'] != PASSWORD))
      {
      header('WWW-Authenticate: Basic realm="Zona Restrita do site!!!!" ');
      header('HTTP/1.0 401 Unauthorized');
      echo 'ZONA RESTRINGIDA: se requiere autorización.';
      exit();
      }

   // Todo es correcto, le dejamos pasar...
   else
      {
         
      echo '<h2 align="center">Zona Restrita do site !!!</h2>';
      echo '<p>Bom dia USUARIO'.' '.$_SERVER['PHP_AUTH_USER']. '</p>';
      }
?>