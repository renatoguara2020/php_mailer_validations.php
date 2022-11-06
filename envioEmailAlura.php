<?php

$destinatario = "teste@spying.com.br";

$nome = $_REQUEST['nome'];
$sobrenome = $_REQUEST['sobrenome'];
$email = $_REQUEST['email'];
$mensagem = $_REQUEST['mensagem'];
$assunto = $_REQUEST['assunto'];
$telefone = $_REQUEST['telefone'];

$body = "===================================" . "\n";
$body = $body . "FALE CONOSCO - TESTE COMPROVATIVO" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Nome: " . $nome . "\n";
$body = $body . "Nome: " . $sobrenome . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Telefone: " . $telefone . "\n";
$body = $body . "Mensagem: " . $mensagem . "\n\n";
$body = $body . "===================================" . "\n";

// envia o email
mail($destinatario, $assunto , $body, "From: $email\r\n");




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form class="form form-p d-flex justify-content-lg-center d-lg-flex flex-column d-sm-flex" action="envia_fale.php"
        method="post" name="form">
        <div
            class="group1 d-md-flex mx-md-0 d-lg-flex d-xl-flex align-items-xl-center ml-xl-0 mr-xl-0 mx-lg-auto mx-auto mx-sm-auto">
            <input type="text" placeholder="Nome" id="nome" class="my-xl-auto  mr-md-5 mb-md-0" name="nome">
            <input type="text" placeholder="Sobrenome" id="sobrenome" name="sobrenome">
        </div>
        <div
            class="group1 d-md-flex mx-md-0 d-lg-flex d-xl-flex align-items-xl-center ml-xl-0 mr-xl-0 mx-lg-auto mx-auto mx-sm-auto mt-md-5">
            <input type="text" placeholder="Email" id="email" class="my-xl-auto pt-xl-5 m-md-0 mr-md-5" name="email">
            <input type="text" placeholder="Telefone" id="telefone" class="pt-xl-5" name="telefone">
        </div>
        <div class="group1 ml-xl-0 mx-sm-auto mb-sm-4 mb-lg-3 mx-lg-auto mb-xl-0">
            <select name="assunto" id="assunto" class="mt-xl-5 mt-md-5">
                <option value="seg">Assunto</option>
                <option value="seg">Segurança</option>
                <option value="seg">Segurança</option>
                <option value="seg">Segurança</option>
            </select>
        </div>
        <textarea placeholder="Mensagem" name="mensabem" id="" cols="30" rows="10" class="mt-xl-2"></textarea>
        <button class="btn btn-enviar" type="submit" name="submit" value="submit"> Enviar</button>
    </form>
</body>

</html>