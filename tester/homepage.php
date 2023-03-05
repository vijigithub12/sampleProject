<?php
  session_start();

if (!isset($_SESSION['email'])) {
  header("location:login.php");
  exit();
}

// your code for the home page
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tester</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">



</head>

<body>
  <div class="container my-5">
    <h2>List of cilents</h2>
    <a class="btn btn-primary" href="/Tester/create.php" role="button">New Client</a>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>phone</th>
          <th>gender</th>
          <th>created_at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my_shop";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
       

        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if (!$result) {
          die("invalid Query: " . $conn->connect_error);
        }

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "
              <tr>
                <td>$row[id]</td>
                <td>$row[clientName]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[gender]</td>
                <td>$row[created_at]</td>
                <td>
                  <a class='btn btn-primary btn-sm' href='/Tester/edit.php?id=$row[id]&edit=true'>Edit</a>
                  <a class='btn btn-danger btn-sm' href='/Tester/delete.php?id=$row[id]&delete=true'>Delete</a>
                </td>
              </tr>
            ";
        }
        ?>
      </tbody>
    </table>
    <div>
    <a class='btn btn-primary btn-sm' href='/Tester/logout.php?id=$row[id]&logout=true'>logout</a>
    </div>
  </div>
</body>

</html>