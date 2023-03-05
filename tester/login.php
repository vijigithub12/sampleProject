<?php
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  //connected to the database
  $conn = new mysqli("localhost", "root", "", "my_shop");
  if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM users WHERE password ='$password' AND email =  '$email' ";
  $result = $conn->query($sql);
  if (!$result) {
    die("invalid Query: " . $conn->connect_error);
  }
  
  
    if ($result->num_rows > 0) {
      $_SESSION['email'] = $email;
      header("location:homepage.php");
      $conn->close();

      exit();
    } else {
      echo "invalid email or password";
      $conn->close();

      return false;
    }
  }
  ?>

    
    
<!Doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial scaled=1">
  <title>loginform</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>

<body>
  <div style="display: flex; flex-direction:column; justify-content: center; align-items: center;">
    <div id="form">
      <h2>Login form</h2>
      <form name="form" method="POST">
        <div style="margin:10px">
          <label>Email:</label>
          <input type="email" id="email" name="email">
        </div>
        <div style="margin:10px">
          <label>Password:</label>
          <input type="password" id="password" name="password">
        </div>

        <button class="btn btn-primary  col-12">Login</button>
        <div class="m-2">
          Dont have an account? <a href="Signup.php">Signup here</a>

        </div>

      </form>
    </div>
  </div>
</body>

</html>