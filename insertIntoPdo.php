<?php
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
    //         $firstName = filter_input(
    //             INPUT_POST,
    //             'firstName',
    //             FILTER_SANITIZE_SPECIAL_CHARS
    //         );
    //     }
    //     if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
    //         $lastName = filter_input(
    //             INPUT_POST,
    //             'lastName',
    //             FILTER_SANITIZE_SPECIAL_CHARS
    //         );
    //     }
    //     if (isset($_POST['email']) && !empty($_POST['email'])) {
    //         $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    //     }
    //     if (
    //         isset($_POST['dataNascimento']) &&
    //         !empty($_POST['dataNascimento'])
    //     ) {
    //         $dataNascimento = filter_input(
    //             INPUT_POST,
    //             'dataNascimento',
    //             FILTER_SANITIZE_SPECIAL_CHARS
    //         );
    //     }
    // } else {
    //     echo '<div class="alert alert-danger" role="alert">Preencha os campos corretamente</div>';
    // }

    $servername = 'localhost';
    $database = 'celke';
    $username = 'root';
    $password = '';
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsnOptions = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    // Create a new connection to the MySQL database using PDO, $dsn is an object
    try {
        $dsn = new PDO($sql, $username, $password, $dsnOptions);
        echo 'Connected Successfully';
    } catch (PDOException $error) {
        echo 'Connection error: ' . $error->getMessage();
    }