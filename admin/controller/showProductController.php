<?php
    session_start();
    //import database connection file
    require_once "../../database.php";
    //define empty variable
    $pname=$pcategory=$dprice=$sprice=$cid="";
    //read form data and save it into db
     if(isset($_POST)){
         $pname=$_POST['product_name'];
         $pcategory=$_POST['product_category'];
         $dprice=$_POST['dry_price'];
         $sprice=$_POST['steam_price'];
         $cid=$_SESSION['username'];
        //insert user into db
        $sql="INSERT INTO product(PNAME,PCATEGORY,DRY_CLEAN_PRICE,STEAM_PRESS_PRICE,COUNTER_ID) VALUES('$pname','$pcategory',$dprice,$sprice,$cid)";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success']="Product Added Successfully!.";
            header('location:../addProduct.php');
            die();
        } else{
            $_SESSION['error']="Failed to add Product.Please try again!";
            header('location:../addProduct.php');
            die();
        }
     }
     
?>