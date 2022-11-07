<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_EMAIL);
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['message']) && !empty($_POST['message'])) {
        $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);
    }
    var_dump($_POST);
}


try{
    $conn = new PDO('mysql:host=localhost;dbname=celke', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('INSERT INTO (nome, email) VALUES (:nome, :email, :message11)');
    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':message1',$message, PDO::PARAM_STR);
    $stmt->execute();

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

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
    <form method="POST" action="">
        <label for="name">Name: <input type="text" name="nome" id="name"></label><br><br>
        <label for="email">Email: <input type="email" name="email" id="email"></label><br><br>
        <label for="message">Message: <textarea name="message" id="message" rows="8"
                cols="20"></textarea></label><br><br>
        <input type="submit" value="Send">
    </form>
</body>

</html>