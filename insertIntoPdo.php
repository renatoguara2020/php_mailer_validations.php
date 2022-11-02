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

    <?php
        $servername = "localhost";
        $database = "u266072517_name"; 
        $username = "u266072517_user";
        $password = "buystuffpwd";
        $sql = "mysql:host=$servername;dbname=$database;";
        $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        // Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
        try { 
          $dsn = new PDO($sql, $username, $password, $dsn_Options);
          echo "Connected Successfully";
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
        $stmt = $dsn->prepare("INSERT INTO Students (firstname, lastname, email) VALUES (:first_name, :last_name, :email)");
        // Now we tell the script which variable each placeholder actually refers to using the bindParam() method
        // First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
        $stmt->bindParam(':first_name', $first_Name);
        $stmt->bindParam(':last_name', $last_Name);
        $stmt->bindParam(':email', $email);
        // Execute the query using the data we just defined
        // The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
        if ($stmt->execute()) {
          echo  '<div class="alert alert-success" role="alert">
          New record created Sucessfully !
        </div>';
        } else {
          echo  '<div class="alert alert-danger" role="alert">
          Unable to create new record!
        </div>';
        }

        $stmt->execute();
        // Execute again now that the variables have changed
        if ($stmt->execute()) {
          echo '<div class="alert alert-success" role="alert">
          Sucessfully created!
        </div>';
        } else {
          echo  '<div class="alert alert-danger" role="alert">
          Unable to create new record!
        </div>';
        }
?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>