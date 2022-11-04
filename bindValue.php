<?php

$connection = new PDO("mysql:dbname=hcode_pdo;host=127.0.0.1", "root", "root");

$statemet = $connection->prepare("INSERT INTO table_users (nameUser, emailUser) VALUES(:userName, :userEmail)");

$statemet->bindParam(':userName', "Gláucio Daniel");

$statemet->bindParam(':userEmail', "glaucio@hcode.com.br");

$statemet->execute();

echo "Dados inseridos!";