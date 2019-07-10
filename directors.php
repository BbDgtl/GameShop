<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <img id ="logo"src="Blockbuster.png">
    <h1>BLOCKBUSTER</h1>
</div>
    
<style>
    img{
        width:200px;
        height:300px;
        margin: 0 100px;
        border: 2px solid red;
        
    }
    #logo{
        width:100px;
        height:100px;
        margin:0;
        border:0;
    }
    div{
        display:flex;
        justify-content: space-between;
        background-color: blue;
    }
    img:hover{
        border: 2px solid blue;
    }
    body{
        background-color: lightgrey;
    }
    h1{
        color:yellow;
        margin-right: 800px;
    }
    a{
        color:red;
        text-decoration: none;
    }
    a:hover{
        color:blue;
    }
   
    
    
</style>
    
</body>
<?php
require_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);

$db_found = mysqli_select_db($conn, DB_NAME);
$query = 'SELECT * FROM directors ORDER BY first_name';
$results = mysqli_query($conn, $query);

while($db_record = mysqli_fetch_assoc($results)){
    echo '<hr>';
?>
<img src="<?php echo $db_record['first_name']?>" alt="">
<?php 
    echo $db_record['first_name'];
    echo ' ';
    echo $db_record['last_name'].'<br>';
    
}
?>
</html>