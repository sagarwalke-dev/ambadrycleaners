<?php
    session_start();
    print_r($_POST);
    return;
    //import database connection file
    require_once "../../database.php";
    //define empty variable
    $fname=$lname=$dspAddress=$fullAddress=$email=$contact=$password="";
    //read form data and save it into db
     if(isset($_POST)){
         $fname=$_POST['first_name'];
         $lname=$_POST['last_name'];
         $display_address=$_POST['display_address'];
         $email=$_POST['email'];
         $contact=$_POST['contact'];
         $full_address=$_POST['full_address'];
         $password=$_POST['password'];
        //insert user into db
        $sql="INSERT INTO counter(EMAIL,DISPLAY_ADDRESS,FNAME,LNAME,MOBILE,FULL_ADDRESS,PASSWORD) VALUES('$email','$display_address','$fname','$lname',$contact,'$full_address','$password')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success']="Counter created Successfully!.";
            header('location:../login.php');
            die();
        } else{
            $_SESSION['error']="Failed to create Counter.Please try again!";
            header('location:../registration.php');
            die();
        }
     }
     
?>