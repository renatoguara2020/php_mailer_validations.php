<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
$servername = "mysql.hostinger.com";
$database = "u266072517_name"; 
$username = "u266072517_user";
$password = "buystuffpwd";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
  echo "Connected successfully";
} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['first_Name']) && !empty($_POST['first_Name'])) {
               $first_Name = filter_input(INPUT_POST, 'first_Name');
     }
    if (isset($_POST['last_Name']) && !empty($_POST['last_Name'])) {
               $last_Name = filter_input(INPUT_POST,'last_Name');
    }
    if(isset($_POST['email']) && !empty($_POST['email'])) {
               $email = filter_input(INPUT_POST,'email');
    }
  }

// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO Students (nome, lastname, email) VALUES (:first_name, :last_name, :email)");
// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
$my_Insert_Statement->bindParam(':first_name', $first_Name);
$my_Insert_Statement->bindParam(':last_name', $last_Name);
$my_Insert_Statement->bindParam(':email', $email);
// Execute the query using the data we just defined
// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
if ($my_Insert_Statement->execute()) {
  echo "<h3>New record created successfully</h3>";
} else {
  echo "Unable to create record";
}

$my_Insert_Statement->execute();
// Execute again now that the variables have changed
if ($my_Insert_Statement->execute()) {
  echo '<div class="alert alert-success" role="alert">
  Sucessfully created!
</div>';
} else {
  echo  '<div class="alert alert-danger" role="alert">
  Unable to create new record!
</div>';
}
?>

</body>

</html>