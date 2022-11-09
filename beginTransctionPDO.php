<?php
// Connection data (server_address, database, name, poassword)
$hostdb = 'localhost';
$namedb = 'tests';
$userdb = 'username';
$passdb = 'password';

try {
  // Connect and create the PDO object
  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       // Sets exception mode for errors
  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

  $conn->beginTransaction();        // Start writting the SQL commands

  // 1. Update the columns "name" and "link", in rows with id=3
  $conn->exec("UPDATE `sites` SET `name`='Spanish Course', `link`='marplo.net/spaniola' WHERE `id`=3");
  // 2. Add a new row
  $conn->exec("INSERT INTO `sites` (`name`, `category`, `link`) VALUES ('JavaScript', 'programming', 'coursesweb.net/javascript')");
  $last_id = $conn->lastInsertId();            // Get the auto-inserted id
  // 3. Selects the rows with id lower than $last_id
  $result = $conn->query("SELECT `name`, `link` FROM `sites` WHERE `id`<'$last_id'");

  $conn->commit();        // Determine the execution of all SQL queries


  // If the SQL select is succesfully performed ($result not false)
  if($result !== false) {
    echo 'Last inserted id: '. $last_id. '<br />';        // Displays the last inserted id

    // Traverse the result set and shows the data from each row
    foreach($result as $row) {
      echo $row['name']. ' - '. $row['link']. '<br />';
    }
  }
  
  $conn = null;        // Disconnect
}
catch(PDOException $e) {
  echo $e->getMessage();
}
?>