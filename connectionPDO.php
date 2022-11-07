<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['emailAddress']) && !empty($_POST['emailAddress'])) {
        $emailAddress = filter_input(INPUT_POST,'emailAddress',FILTER_SANITIZE_EMAIL);
    }

    if(isset($_POST['password']) && !empty($_POST['password']) && $_POST['password']) {
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
    }
   
}


try {
    $conn = new PDO('mysql:host=localhost;dbname=celke', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('SELECT * FROM students');
    $stmt->execute();

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

 ?>