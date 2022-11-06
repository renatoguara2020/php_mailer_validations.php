<?php

include_once 'config.php';

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['firstName']) && !empty($_POST['firstName']) && ($_POST['firstName'] != '')) {
        $firstName = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['lastName']) && !empty($_POST['lastName']) && $_POST['lastName'] != '') {
        $lastName = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['email']) && !empty($_POST['email']) && $_POST['email'] != ''){
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    }

    if(isset($_POST['password']) && !empty($_POST['password']) && $_POST['password'] != ''){
        $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['dataNascimento']) && !empty($_POST['dataNascimento']) && $_POST['dataNascimento'] != ''){
        $dataNascimento = filter_input(INPUT_POST,'dataNascimento',FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
}

$servername = "BD_SERVIDOR";
$username = "BD_USUARIO";
$password = "BD_SENHA";
$dbname = "BD_BANCO";
$port =  "BD_PORT";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $conn->beginTransaction();

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email, senha, datanascimento) VALUES (:firstname, :lastname, :email, :senha, :datanascimento)");
  $stmt->bindParam(1,':firstname', $firstname,PDO::PARAM_STR);
  $stmt->bindParam(2,':lastname', $lastname,PDO::PARAM_STR);
  $stmt->bindParam(3,':email', $email,PDO::PARAM_STR);
  $stmt->bindParam(4,':senha', $senha,PDO::PARAM_STR);
  $stmt->bindParam(5,':datanascimento', $dataNascimento,PDO::PARAM_STR);

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

</body>

</html>