<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GameShop</title>
</head>

<body>

  <?php
  echo '<h1>Welcome to the GameShop</h1>';

  require_once 'database.php';

  $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
  // echo 'Connection successful.' . '<br>';
  $db_name = DB_NAME;
  $db_found = mysqli_select_db($conn, $db_name);

  echo '<h2>The 3 best sellers :</h2>';

  if ($db_found) {
    // echo "$db_name found!<br>";
    // Prepare the query:
    $query = 'SELECT  FROM games ORDER BY n_purchase LIMIT 3';
    SELECT movies.title, directors.first_name, movies.release_year
FROM movies
INNER JOIN directors ON directors.director_id=movies.directorID;
    // Send the query to the DB
    $results = mysqli_query($conn, $query);
    // $db_record = mysqli_fetch_assoc($results);
    // $db_record2 = mysqli_fetch_assoc($results);
    while ($db_record = mysqli_fetch_assoc($results)) {
      echo '<br>';
      echo $db_record['title'] . '<br>';
    }
  } else {
    echo "$db_name not found!";
  }

  mysqli_close($conn);
  ?>

</body>

</html>