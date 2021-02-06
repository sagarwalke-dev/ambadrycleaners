<?php
    session_start();
    //import database connection file
    require_once "../../database.php";
    //define empty variable
    $pname=$pcategory=$dprice=$sprice=$cid="";
    //read form data and save it into db
     if(isset($_POST)){
        $pid=$_POST['product_id'];
        $pname=$_POST['product_name'];
         $pcategory=$_POST['product_category'];
         $dprice=$_POST['dry_price'];
         $sprice=$_POST['steam_price'];
         $cid=$_POST['counter_id'];
        //insert user into db
        $sql="UPDATE PRODUCT SET PNAME='$pname',PCATEGORY='$pcategory',DRY_CLEAN_PRICE=$dprice,STEAM_PRESS_PRICE=$sprice WHERE PID=$pid AND COUNTER_ID=$cid";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success']="Product Updated Successfully!.";
            header('location:../showProducts.php');
            die();
        } else{
            $_SESSION['error']="Failed to update Product.Please try again!";
            header('location:../editProduct.php?cid='.$cid.'&pid='.$pid);
            die();
        }
     }
     
?>