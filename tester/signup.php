<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_shop";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password_confirmation'];
    $password_hash = Password_hash($password, PASSWORD_DEFAULT); //hash password
}


if (empty($name) || empty($email) || empty($phone) || empty($gender) || empty($password) || empty($confirm_password)) {
    $errorMessage = "All the fields are required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage = "Invalid email";
} elseif ($password != $confirm_password) {
    $errorMessage = "Passwords do not match.";
} else {
    $stmt = $conn->prepare("INSERT INTO users (user_name, email, phone, gender, password ) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $gender, $password);
    if ($stmt->execute()) {

        echo "signup sucessfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close()
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
        <div id="form" style="margin: 10px;">
            <h2>Signup</h2>
            <form name="form" method="POST" action="signup.php">
                <div style="margin:10px">
                    <label>Name:</label>
                    <input type="text" id="name" name="name">
                </div>

                <div style="margin:10px">
                    <label>Email:</label>
                    <input type="email" id="email" name="email">
                </div>


                <div style="margin:10px">
                    <label>gender:</label>
                    <input type="radio" id="male" name="gender" value="M" />
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="F" />
                    <label for="female">female</label>
                    <input type="radio" id="others" name="gender" value="O" />
                    <label for="others">others</label>
                </div>

                <div style="margin:10px">
                    <label>PHONE:</label>
                    <input type="phone" id="phone" name="phone">
                </div>

                <div style="margin:10px">
                    <label>Password:</label>
                    <input type="password" id="password" name="password">
                </div>

                <div style="margin:10px; align-items: centre;">
                    <label>Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>

                <input type="submit" id="button" value="Signup" name="submit">

                <div class="m-2">
                    Already have an account? <a href="login.php">login here</a>

                </div>




            </form>
        </div>

    </div>


</body>

</html>