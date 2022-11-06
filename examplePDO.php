<?php

include_once 'config.php';
include_once 'connectionPDO1.php';

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['firstName']) && !empty($_POST['firstName']) && ($_POST['firstName'] != '')) {
        $firstName = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['lastName']) && !empty($_POST['lastName']) && ($_POST['lastName'] != '')) {
        $lastName = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['email']) && !empty($_POST['email']) && ($_POST['email'] != '')){
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
  $dsn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dsn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $dsn->beginTransaction();

  // prepare sql and bind parameters
  $stmt = $dsn->prepare("INSERT INTO MyGuests (firstname, lastname, email, senha, datanascimento) VALUES (:firstname, :lastname, :email, :senha, :datanascimento)");
  $stmt->bindParam(1,':firstname', $firstName, PDO::PARAM_STR);
  $stmt->bindParam(2,':lastname', $lastName, PDO::PARAM_STR);
  $stmt->bindParam(3,':email', $email, PDO::PARAM_STR); 
  $stmt->bindParam(4,':senha', $senha, PDO::PARAM_STR);
  $stmt->bindParam(5,':datanascimento', $dataNascimento, PDO::PARAM_STR);

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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                    <label class="form-check-label" for="form2Example34"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>