<?php

try {
  $dsn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
  $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $dsn->prepare('INSERT INTO minhaTabela (nome) VALUES(:nome)');
  $stmt->execute(array(
    ':nome' => 'Ricardo Arrigoni'
  ));

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();

}