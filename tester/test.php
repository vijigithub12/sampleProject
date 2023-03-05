<?php
$userprofile =$_SESSION['email'];
        if($userprofile==true){
         
        } else{
          header("location:login.php");
        }
        ?>
