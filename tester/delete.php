<?php
if (isset ($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_shop";

    //create connection
    $connection = new mysqli($servername,$username,$ $password,$dbname);

    $sql ="DELETE FROM clients WHERE id=$id";
    $connection->query($sql);
}

header("location:/Tester/homepage.php");
exit;
?>
