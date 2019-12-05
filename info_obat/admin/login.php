<?php 
session_start();
if(isset($_SESSION["login"])){ 
    header("Location: home.php");
}
require 'functions.php';
    
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($kon, "SELECT * FROM admin WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
        
            header("Location: home.php");
            exit;   
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Halaman Login</title>
  <style>
  body{
    background-color: #acacac;
  }
    label {
      display: block;
    }
    .container{
      width: 350px;
    }
  </style>
</head>
<body>
  <br><br><br>

  <h1 class="display-4 text-center">Halaman Login</h1>

  <form action="" method="post">
<div class="container">
    <div class="form-group">
      <div>
        <label class="form-label" for="username">Username</label>
        <input class="form-control" type="text" name="username" id="username">
      </div>
      <div>
        <label class="form-label" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
      </div>
      <br>
      <div>
        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
      </div>
    </div>
</div>
    
  </form>

</body>
</html>