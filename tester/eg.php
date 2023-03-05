<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `biodata` (`id`, `name`, `age`, `email`) VALUES (NULL, '".$fname."', '".$age."', '".$email."')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>document.getElementById('success_message').style.display = 'block';</script>";
        echo "<script>setTimeout(function(){ document.getElementById('success_message').style.display = 'none'; }, 2000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form action="add.php" method="POST">
    Enter your first name
    <input type="text" name="fname" id="fname">
    Enter your age
    <input type="number" name="age" id="gender]">
    Enter your email
    <input type="email" name="email" id="email">
    <input type="submit">
    <span style="display:none;" id="success_message">New record created successfully</span>
</form>