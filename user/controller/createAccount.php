<?php
    session_start();
    //import database connection file
    require_once "../../database.php";
    //define empty variable
    $fname=$lname=$email=$contact=$password="";
    //read form data and save it into db
     if(isset($_POST)){
         $fname=$_POST['first_name'];
         $lname=$_POST['last_name'];
         $email=$_POST['email'];
         $contact=$_POST['contact'];
         $password=$_POST['password'];
        //insert user into db
        $sql="INSERT INTO user(EMAIL,FNAME,LNAME,MOBILE,PASSWORD) VALUES('$email','$fname','$lname',$contact,'$password')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success']="Account created successfully.";
            header('location:../login.php');
            die();
        } else{
            $_SESSION['error']="failed to create account.Please try again";
            header('location:../registration.php');
            die();
        }
     }
     
?>