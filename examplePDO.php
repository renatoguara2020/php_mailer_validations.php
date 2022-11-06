<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['firstName']) && !empty($_POST['firstName']) && $_POST['firstName'] != '') {
        $firstName = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['lastName']) && !empty($_POST['lastName']) && $_POST['lastName'] != '') {
        $lastName = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['email']) && !empty($_POST['email']) && $_POST['email'] != ''){
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    }
    
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->beginTransaction();

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
  $stmt->bindParam(1,':firstname', $firstname,PDO::PARAM_STR);
  $stmt->bindParam(2,':lastname', $lastname,PDO::PARAM_STR);
  $stmt->bindParam(3,':email', $email,PDO::PARAM_STR);

  // insert a row
  $firstname = "John";
  $lastname = "Doe";
  $email = "john@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Mary";
  $lastname = "Moe";
  $email = "mary@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Julie";
  $lastname = "Dooley";
  $email = "julie@example.com";
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}