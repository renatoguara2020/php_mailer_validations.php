<?php 
  define('ADMIN_LOGIN','root'); 
  define('ADMIN_PASSWORD','123456'); // Could be hashed too.
  
  if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW']) && ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) 
      && ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) { 
    header('HTTP/1.1 401 Unauthorized'); 
    header('WWW-Authenticate: Basic realm="Password For Blog"'); 
    exit("Access Denied: Username and password required."); 
  } else{

    header('HTTP/1.1 200 OK Authorized'); 
    echo 'Usuário  '.$_SERVER['PHP_AUTH_USER']. '  Logado!!!!';
    
  }
?>