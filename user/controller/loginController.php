<?php
session_start();
require_once('../../database.php');
if (isset($_POST)) {
    //read user details
    $username=$_POST['username'];
    $password=$_POST['password'];
    //check user in db
    $sql="SELECT mobile,password from USER WHERE mobile=$username";
    //execute query
    $result=mysqli_query($conn,$sql);
    // print_r($result);

    if($result->num_rows!=0){
        //read data
        while($data=mysqli_fetch_array($result)){
            if($username==$data['mobile'] && $password==$data['password']){
                //store user details in session
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
            header('location: ../displayProducts.php');
            }
            else{
                $_SESSION['error']="Invalid Username and Password";
                header('location:../login.php');
                die();
            }
        }
    }
    else{
        $_SESSION['error']="User not found,Please create account first";
        header('location:../login.php');
        die();
    }
    
}
?>