<?php
session_start();
if(! empty($_SESSION['username'])){
$flag=false;
 //import database connection file
 require_once "../database.php";
 //check session
if (isset($_SESSION['username'])) {
//   $counter_id=$_SESSION['username'];
   //insert user into db
   $menArray;
   $womenArray;
   $otherArray;
   $sql="SELECT PID,PNAME,PCATEGORY,DRY_CLEAN_PRICE,STEAM_PRESS_PRICE FROM product;";

   if($result=mysqli_query($conn, $sql)){
       $i=$j=$k=0;
       while($row=$result->fetch_assoc()){
           if($row['PCATEGORY']=='men'){
           $menArray[$i]['pname']=$row['PNAME'];
           $menArray[$i]['pcategory']=$row['PCATEGORY'];
           $menArray[$i]['dprice']=$row['DRY_CLEAN_PRICE'];
           $menArray[$i]['sprice']=$row['STEAM_PRESS_PRICE'];
            $i++;
           }
           //women array
           if($row['PCATEGORY']=='women'){
            $womenArray[$j]['pname']=$row['PNAME'];
            $womenArray[$j]['pcategory']=$row['PCATEGORY'];
            $womenArray[$j]['dprice']=$row['DRY_CLEAN_PRICE'];
            $womenArray[$j]['sprice']=$row['STEAM_PRESS_PRICE'];
             $j++;
            }
             //other array
           if($row['PCATEGORY']=='other'){
            $otherArray[$k]['pname']=$row['PNAME'];
            $otherArray[$k]['pcategory']=$row['PCATEGORY'];
            $otherArray[$k]['dprice']=$row['DRY_CLEAN_PRICE'];
            $otherArray[$k]['sprice']=$row['STEAM_PRESS_PRICE'];
             $k++;
            }   
       }//end of while
       
if ($result->num_rows > 0) 
      $flag=true;
}

else{
$_SESSION['error']="Failed to display product. Try again!";
header('Location:login.php');
}
}
else{
  $_SESSION[error]="Your Session is expired. Please login again";
  header('Location:login.php');
}
    
?>

<html>
<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<header class="text-gray-600 body-font" style="margin-top: -50px;margin-bottom: -150px;">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="../common/images/logo.jpg"/>
            <span class="ml-3 text-xl">Amba Drycleaners</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="#">Home</a>
            <?php if(empty($_SESSION['username'])){?>
                <a class="mr-5 hover:text-gray-900" href="../user/registration.php">Registration</a>
                <?php }?>
            
            <a class="mr-5 hover:text-gray-900">Contact Us</a>
            <a class="mr-5 hover:text-gray-900">About</a>
        </nav>
        <?php if(!empty($_SESSION['username'])){?>
        <a class="btn btn-primary" href="../user/controller/logoutController.php" role="button">Logout</a>
        <?php }
        else{
            ?>
            <a class="btn btn-primary" href="../login.php" role="button">Login</a>
            <?php
        }
?>
    </div>
</header>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body style="font-family:courier,arial,helvetica;text-align: center; font-size: 20px;">
    <div class="container mx-auto py-5">
        <!-- <div style="display: inline-flex;"> -->
        <div>
            <center>
                <form method="get" action="controller/order.php">
                    <br><br>
                    <hr><hr  style="margin-top: -15px;"><hr  style="margin-top: -15px;">
                    <table class="min-w-full divide-y divide-gray-200"
                        style="font-size:20px; font-weight: 600;text-align: center;" border="1px" align="items-center">

                        <tbody class="bg-white divide-y divide-gray-200">
                            <h3><u><b>Men's</b></u></h3>
                            <tr>
                                <td>Product Name</td>
                                <td>Quantity</td>
                            </tr>
                            <?php
                        $menTotal=1;
                        foreach($menArray as $men){
                        ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" >
                                    <div class="flex items-center" style="margin-left: 170px;margin-right: -310px;">
                                        <div class="font-medium text-gray-900">
                                            <?php 
                                echo $men['pname'];
                                echo "<br>";
                                echo "<small>Rs.".$men['dprice']."(estimate)</small>";
                                ?>
                                            <input type="hidden" name=<?php echo "menQtyName" .$menTotal ?>
                                            value=<?php echo $men['pname'] ?> >
                                             <input type="hidden" name=<?php echo "menQtyPrice" .$menTotal ?>
                                              value=<?php echo $men['dprice'] ?> >
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" style="width: 150px;height: 50px;text-align: center;"
                                        name=<?php echo "menQty" .$menTotal ?> value="0" min="0" step="1">
                                    <!-- <div class="quantity" style="font-size: 25px;text-align: center;">
                                    <a href="#" class="quantity__minus" style="width: 30px;height: 30px;"><span>-</span></a>
                                    <input name=<?php echo "quantity".$n ?> type="text" class="quantity__input" value="1"
                                        style="width: 30px;height: 30px;color: black;font-weight: 900px;">
                                    <a href="#" class="quantity__plus" style="width: 30px;height: 30px;"><span>+</span></a>
                                </div> -->
                                </td>
                            </tr>
                            <?php
                     $menTotal++;      
                    }
                    ?>
                            <input type="hidden" name="menTotal" value=<?php echo $menTotal-1 ?>>
                        </tbody>
                    </table>

                    <hr><hr  style="margin-top: -15px;"><hr  style="margin-top: -15px;">
                    <table class="min-w-full divide-y divide-gray-200"
                        style="font-size:20px; font-weight: 600;text-align: center;" border="1px" align="items-center">


                        <tbody class="bg-white divide-y divide-gray-200">
                            <h3><u><b>Women's</b></u></h3>
                            <tr>
                                <td>Product Name</td>
                                <td>Quantity</td>
                            </tr>
                            <?php
                        $womenTotal=1;
                        foreach($womenArray as $women){
                        ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center" style="margin-left: 170px;margin-right: -310px;">                                        <div class="font-medium text-gray-900">
                                            <?php 
                                echo $women['pname'];
                                echo "<br>";
                                echo "<small>Rs.".$women['dprice']."(estimate)</small>";
                                ?>
                                            <input type="hidden" name=<?php echo "womenQtyName" .$womenTotal ?>
                                            value=<?php echo $women['pname'] ?> >
                                            <input type="hidden" name=<?php echo "womenQtyPrice" .$womenTotal ?>
                                            value=<?php echo $women['dprice'] ?>>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" style="width: 150px;height: 50px;text-align: center;"
                                        name=<?php echo "womenQty" .$womenTotal ?> value="0">
                                    <!-- <div style="margin-left: 50px;margin-right: 50px;">
                                    <button data-action="decrement" id="btn"
                                        class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input type="number" id="qty" name=<?php echo "women_qty".$n?> min="0" max="2" style="width: 50px;"
                                        class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                        name="custom-input-number" value="0"></input>
                                    <button data-action="increment" id="btn"
                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div> -->
                                </td>
                            </tr>
                            <?php  
                     $womenTotal++;     
                    }
                    ?>
                            <input type="hidden" name="womenTotal" value=<?php echo $womenTotal-1 ?>>
                        </tbody>
                    </table>
<div style="text-decoration: underline;"></div>
<hr><hr  style="margin-top: -15px;"><hr  style="margin-top: -15px;">
                    <table class="min-w-full divide-y divide-gray-200"
                        style="font-size:20px; font-weight: 600;text-align: center;" border="1px" align="items-center">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <h3><u><b>Other's</b></u></h3>
                            <tr>
                                <td>Product Name</td>
                                <td>Quantity</td>
                            </tr>
                            <?php
                    $otherTotal=1;
                    foreach($otherArray as $other){
                    ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center" style="margin-left: 170px;margin-right: -310px;">                                        <div class="font-medium text-gray-900">
                                            <?php 
                            echo $other['pname'];
                            echo "<br>";
                                echo "<small>Rs.".$other['dprice']."(estimate)</small>";
                            ?>
                                            <input type="hidden" name=<?php echo "otherQtyName" .$otherTotal ?> value=<?php echo $other['pname'] ?>>
                                             <input type="hidden" name=<?php echo "otherQtyPrice" .$otherTotal ?> value=<?php echo $other['dprice'] ?>>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" style="width: 150px;height: 50px;text-align: center;"
                                        name=<?php echo "otherQty" .$otherTotal ?> value="0">
                                    <!-- <div style="margin-left: 50px;margin-right: 50px;">
                                <button data-action="decrement" id="btn"
                                    class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="number" id="qty" name=<?php echo "other_qty".$n?> min="0" max="2" style="width: 50px;"
                                    class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                    name="custom-input-number" value="0"></input>
                                <button data-action="increment" id="btn"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div> -->
                                </td>
                            </tr>
                            <?php  
                 $otherTotal++;     
                }
                ?>
                            <input type="hidden" name="otherTotal" value=<?php echo $otherTotal-1 ?>>
                        </tbody>
                    </table>
                    <hr><hr  style="margin-top: -15px;"><hr  style="margin-top: -15px;">
                    <div class="sub-main" style="text-align: center;">
                        <center>
                            <button class="button-two"><span>Next</span></button>
                        </center>
                    </div>

                </form>
            </center>

</body>

</html>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700italic);

    h1,
    button {
        height: 50px;
        color: #fff;
        text-align: center;
        padding: 0px;
        margin-left: -200px;
    }

    .sub-main {
        width: 20%;
        margin: 0px;
        float: left;
    }

    .button-two {
        text-align: center;
        cursor: pointer;
        font-size: 25px;
        margin-left: 450px;
        margin-top: 20px;
        margin-bottom: 50px;
    }



    /*Button Two*/
    .button-two {
        align-self: center;
        border-radius: 4px;
        background-color: #71fc20;
        color: black;
        font-weight: 900;
        border: none;
        padding: 0px;
        width: 150px;
        transition: all 0.5s;
    }


    .button-two span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button-two span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button-two:hover span {
        padding-right: 25px;
    }

    .button-two:hover span:after {
        opacity: 1;
        right: 0;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    document.getElementById("input").onkeypress = function (e) {
        /^[a-zA-Z0-9]+$/.test(this.value) // return true or false
    };

    document.getElementById("input").onkeypress = function (e) {
        var chr = String.fromCharCode(e.which);
        if ("></\"".indexOf(chr) >= 0)
            return false;
    };

    $(document).ready(function () {
        const minus = $('.quantity__minus');
        const plus = $('.quantity__plus');
        const input = $('.quantity__input');
        minus.click(function (e) {
            e.preventDefault();
            var value = input.val();
            if (value > 1) {
                value--;
            }
            input.val(value);
        });

        plus.click(function (e) {
            e.preventDefault();
            var value = input.val();
            value++;
            input.val(value);
        })
    });
</script>

<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number-input input:focus {
        outline: none !important;
    }

    .custom-number-input button:focus {
        outline: none !important;
    }

    #btn {
        cursor: pointer;
    }
</style>

<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        target.value = value;
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>
<?php }
else{
    $_SESSION['error']="Session expire. Please login again.";
    return header("Location:login.php");
}