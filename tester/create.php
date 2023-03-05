<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_shop";


//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$name = '';
$email = '';
$phone = '';
$gender = '';

$errorMessage = "";
$SucessMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $name = $_POST['name'] ?? '';
     $email = $_POST['email'] ?? '';
     $phone = $_POST['phone'] ?? '';
     $gender = $_POST['gender'] ?? '';

     do {
          if (empty($name) || empty($email) || empty($phone) || empty($gender)) {
               $errorMessage = "All the fields are required";
               break;
          }
          // add new client to database
          $sql = "INSERT INTO clients (clientName,email,phone,gender)" .
               "VALUES ('$name','$email','$phone','$gender')";
          $result = $conn->query($sql);
          if (!$result) {     
               $errorMessage = "Invalid Query:" . $connection->$errorMessage;
               break;
          }

          $name = '';
          $email = '';
          $phone = '';
          $gender = '';

          $SucessMessage = "client added correctly";

          header("location: /Tester/homepage.php");
          exit;
     } while (false);
}
?>







<!Doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Tester</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>
</head>

<body>
     <div class="container my-5">
          <h2>List of clients</h2>


          <?php
          if (!empty($errorMessage)) {
               echo "
            <div class='row mb-3'>
                <div class= col-sm-6'>
            <div class ='alert alert-warning alert-dismissble 'fade show' role='alret'>
                 <strong>$errorMessage</strong>
                 <buttontype='button' class='btn-close' data-bs-dissmiss 'alert' aria-label='close></button>
               </div>
               </div>
                </div> 
            ";
          }
          ?>

          <form method="post">
               <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                         <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
                    </div>
               </div>
               <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                         <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                    </div>
               </div>
               <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-6">
                         <input type="text" class="form-control" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                    </div>
               </div>
               <div class="mb-3 row align-items-center">
                    <label class="col-sm-3 col-form-label">gender</label>
                    <div class="col-sm-6">
                         <input type="radio" id="male" name="gender" value="M" />
                         <label for="male">Male</label>

                         <input type="radio" id="female" name="gender" value="F" />
                         <label for="female">Female</label>

                         <input type="radio" id="others" name="gender" value="O" />
                         <label for="others">Others</label>
                    </div>
               </div>

               <?php
               if (!empty($SucessMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class= col-sm-6'>
                    <div class ='alert alert-warning alert-dismissble 'fade show' role='alert'>
                         <strong>$SucessMessage</strong>
                         <buttontype='button' class='btn-close' data-bs-dissmiss 'alert' aria-label='close></button>
                       </div>
                       </div>
                        </div> 
                    ";
               }


               ?>

               <div class="row mb-3">
                    <div class="col-sm-3 d-grid">
                         <button class="btn btn-primary" type="login"> submit </button>
                    </div>
                    <div class="col-sm-3 d-grid">
                         <a class="btn btn-outline-primary" href="/tester/homepage.php" role="button">cancel</a>
                    </div>
               </div>

          </form>
     </div>
</body>

</html>