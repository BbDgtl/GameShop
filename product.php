<!DOCTYPE html>
<html>

<head>
  <title>Game Details</title>
</head>

<body>
  <?php require_once 'database.php'; ?>

  <h1>Game Detail</h1>
  <hr>

  <?php

  if (isset($_GET['id'])) {

    // Make sure it is a number I get
    $gameID = (int) $_GET['id'];

    // Make sure it's an number AND a valid ID
    if ($gameID > 0) {
      require_once 'database.php';

      $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
      $db_found = mysqli_select_db($db_handle, DB_NAME);

      if ($db_found) {

        $sql_query = 'SELECT * FROM games 
				WHERE id_game = ' . $gameID;

        $result_query = mysqli_query($db_handle, $sql_query);
        $db_field = mysqli_fetch_assoc($result_query);

        echo '<img height="300px" width="200px" src="images/' . $db_field['image'] . '">' . '<br>';
        echo '<p><strong>Title : </strong>' . $db_field['title'] . '</p>';
        echo '<p><strong>Year of release : </strong>' . $db_field['date'] . '</p>';
        echo '<p><strong>Price : </strong>' . $db_field['price'] . '</p>';
      } else {
        echo 'DB not found (' . DB_NAME . ')';
      }
    } else {
      echo 'Something\'s wrong...';
      echo '<a href="./">Go Back</a>';
    }
  } else {
    echo 'Something\'s wrong...';
    echo '<a href="./">Go Back</a>';
  }

  ?>


</body>

</html>