<?php
/*
 * Melhor prática usando Prepared Statements
 *
 */

$id = 5;
try {
    $conn = new PDO('mysql:host=localhost;dbname=celke', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('SELECT * FROM students');
    $stmt->execute();

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

 ?>