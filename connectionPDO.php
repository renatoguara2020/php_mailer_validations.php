<?php

 


try{
    $conn = new PDO('mysql:host=localhost;dbname=celke', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('INSERT INTO students (firstname, lastname, datanascimento) VALUES (:nome, :email, :message11)');
    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':message1',$message, PDO::PARAM_STR);
    $stmt->execute();

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

 ?>