<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_shop";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$id = "";
$name = "";
$email = "";
$phone = "";
$gender = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET method: show the data of the client
    if (!isset($_GET["id"])) {
        header("location:/Tester/index.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected cilent from database table
    $sql = "SELECT * FROM clients WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        $errorMessage = "Client not found.";
    } else {
        $name = $row["clientName"];
        $email = $row["email"];
        $phone = $row["phone"];
        $gender = $row["gender"];
    }

} else {
    // POST method: update the data of the client
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];


    if (empty($name) || empty($email) || empty($phone)|| empty($gender)) {
        $errorMessage = "All the fields are required.";
    } else {
        $sql = "UPDATE clients SET clientName ='$name', email ='$email', phone ='$phone', gender ='$gender' WHERE id =$id";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $conn->error;
        } else {
            $successMessage = "Client updated correctly.";
            header("location:/Tester/index.php");
            exit;
        }
    }
}
?>
 
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sample</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>
</head>
<body>
      <div class="container my-5">
           <h2>List of clients</h2>

           
           <?php
           if(!empty($errorMessage)){
            echo"
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
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
                <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="mb-3 row">
                  <label  class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-6">
                       <input type="text"  class="form-control" name="name" value="<?php echo $name; ?>">
                  </div>
               </div>
                 <div class="mb-3 row">
                       <label  class="col-sm-3 col-form-label">Email</label>
                       <div class="col-sm-6">
                       <input type="text"  class="form-control" name="email" value="<?php echo $email; ?>">
                  </div> 
                </div>
                <div class="mb-3 row">
                       <label  class="col-sm-3 col-form-label">Phone</label>
                       <div class="col-sm-6">
                       <input type="text"  class="form-control" name="phone" value="<?php echo $phone; ?>">
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
                  if(!empty($SucessMessage)){
                    echo"
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                    <div class ='alert alert-warning alert-dismissble 'fade show' role='alret'>
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
                         <button class="btn btn-primary" type="submit"> Submit </button>
                 </div>
                 <div class="col-sm-3 d-grid">
                      <a class="btn-btn-outline-primary" href="/tester/index.php" role="button">cancel</a>
                 </div> 
                </div>

         </form>
        </div>
</body>
</html>