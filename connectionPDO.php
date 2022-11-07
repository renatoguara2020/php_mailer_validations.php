<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_EMAIL);
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
    }
   
}


try {
    $conn = new PDO('mysql:host=localhost;dbname=celke', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('INSERT INTO (nome, email) VALUES (:nome, :email)');
    $stmt->bindValue(1, ':nome', $nome, PDO::PARAM_STR);
    $stmt->bindValue(2, ':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

 ?>