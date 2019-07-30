<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <title>GameShop</title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><i class="fal fa-gamepad"></i>GameShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="products.php">Products <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Games
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"></a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signin.php">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

  </header>
  <main>
    <h1>Products Page</h1>
    <nav>
      <ul>
        <a href="products.php?filter=1">
          <li id="ps4">PS4</li>
        </a>
        <a href="products.php?filter=2">
          <li id="xbox">XBONE</li>
        </a>
        <a href="products.php?filter=3">
          <li id="nintendo">SWITCH</li>
        </a>
        <a href="products.php?filter=4">
          <li id="computer">PC</li>
        </a>
      </ul>
      <ul>
        <a id="action" href="products.php?filter=ACTION">
          <li>Action</li>
        </a>
        <a id="mmo" href="products.php?filter=MMO">
          <li>MMO</li>
        </a>
        <a id="rpg" href="products.php?filter=RPG">
          <li>RPG</li>
        </a>
        <a id="fps" href="products.php?filter=FPS">
          <li>FPS</li>
        </a>
        <a id="platform" href="products.php?filter=PLATFORM">
          <li>PLATFORM</li>
        </a>
        <a id="simulation" href="products.php?filter=SIMULATION">
          <li>SIMULATION</li>
        </a>
      </ul>
      <!-- <ul>
        <a id="simulation" href="products.php?">
          <li>ALL</li>
        </a>
      </ul> -->
    </nav>

  </main>

  <?php

  require_once 'database.php';

  $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
  // echo 'Connection successful.' . '<br>';
  $db_name = DB_NAME;
  $db_found = mysqli_select_db($conn, $db_name);
  $filter = $_GET['filter'];
  ?>
  <div>

    <?php

    if ($db_found) {
      // Prepare the query:
      $query = "SELECT games.title, games.image, games.id_game 
        FROM games INNER JOIN platform ON platform.id_platform=games.id_platform 
        WHERE platform.id_platform = $filter";
      $query2 = "SELECT title, image FROM games WHERE category = '$filter'";
      // Send the query to the DB

      $results = mysqli_query($conn, $query);
      $results2 = mysqli_query($conn, $query2);

      while ($db_record = mysqli_fetch_assoc($results)) {
        echo '<br>';
        echo $db_record['title'] . '<br>';
        echo '<img height="300px" width="200px" src="images/' . $db_record['image'] . '">' . '<br>';
        echo "<a href='product.php?id=" . $db_record['id_game'] . "'>click</a>";
        ?>
        <button>Add To Cart</button>
      <?php
      }
      // Loops for Category filter
      while ($db_record = mysqli_fetch_assoc($results2)) {
        echo '<br>';
        echo $db_record['title'] . '<br>';
        echo '<img height="300px" width="200px" src="images/' . $db_record['image'] . '">' . '<br>';
        echo "<a href='product.php?id=$id_game'>click</a>";
        ?>
        <button>Add To Cart</button>
      <?php
      }
    } else {
      echo "$db_name not found!";
    }

    mysqli_close($conn);
    ?>
  </div>

</body>

</html>