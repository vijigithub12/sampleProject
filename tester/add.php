                                                                                                                                                                                     
<form action="add.php" method="POST">
    Enter your first name
    <input type="text" name="fname" id="fname">
    Enter your age
    <input type="number" name="age" id="gender]">
    Enter your email
    <input type="email" name="email" id="email">
    <input type="submit" >
    <span style="display:none;" id="success_message">New record created successfully</span>
</form>
</body>
</html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
      
if(isset($_POST['fname'])){
$fname=$_POST['fname'];
$age=$_POST['age'];
$email=$_POST['email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `biodata` (`id`, `name`, `age`, `email`) VALUES (NULL, '".$fname."', '".$age."', '".$email."')";
//$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  echo"<script>document.getElementById('success_message').style.display = 'block'; </script>";
  echo "<script>setTimeout(function(){ document.getElementById('success_message').style.display = 'none'; }, 2000);</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>