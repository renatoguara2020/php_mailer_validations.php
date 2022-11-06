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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form class="form form-p d-flex justify-content-lg-center d-lg-flex flex-column d-sm-flex" action="envio.php"
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
            <select id="estado" name="estado">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
            </select>
        </div>
        <textarea placeholder="Mensagem" name="mensagem" id="" cols="30" rows="10" class="mt-xl-2"></textarea>
        <button class="btn btn-enviar" type="submit" name="enviarDadosForm" value="submit"> Enviar</button>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>