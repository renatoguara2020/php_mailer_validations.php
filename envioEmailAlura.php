<?php
require 'ConnectionPDO.php';
try {
    //dados pessoais
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $nascimentoData = $_POST['nascimentodata'];
    $email = $_POST['email'];

    //endereco
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];


    $sql = "INSERT INTO pessoas (cpf, nome, sexo, nascimentodata, email) 
  VALUES (:cpf,:nome,:sexo,:nascimentodata,:email)
    ";


    $stm = $pdo->prepare($sql);
    $stm->bindValue(":cpf", $cpf);
    $stm->bindValue(":nome", $nome);
    $stm->bindValue(":sexo", $sexo);
    $stm->bindValue(":nascimentodata", $nascimentoData);
    $stm->bindValue(":email", $email);


    $sql2 = "INSERT INTO enderecos (logradouro, bairro, cidade, uf, cep) 
  VALUES (:logradouro,:bairro,:cidade,:uf,:cep)
    ";

    $stm = $pdo->prepare($sql2);
    $stm->bindValue(":logradouro", $logradouro);
    $stm->bindValue(":bairro", $bairro);
    $stm->bindValue(":cidade", $cidade);
    $stm->bindValue(":uf", $uf);
    $stm->bindValue(":cep", $cep);


    $stm->execute();
    header('Location: listar_pessoas.php');
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}