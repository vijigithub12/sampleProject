<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>proile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">



</head>

<body>
    <div class="container my-5">
        <h2>USER PROFILE</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>password</th>
                    <th>gender</th>
                    <th>phone</th>
               


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
                

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if (!$result) {
                    die("invalid Query: " . $conn->connect_error);
                }

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
              <tr>
                <td>$row[email]</td>
                <td>$row[password]</td>
                <td>$row[gender]</td>
                <td>$row[phone]</td>
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