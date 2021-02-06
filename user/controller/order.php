<?php
session_start();
$data=$_GET;
$menTotal=$_GET['menTotal'];
$menTotal=$_GET['womenTotal'];
$menTotal=$_GET['otherTotal'];

// men total
$qty=1;
$menTotalCost=null;
$menTotal=$_GET['menTotal'];
while($menTotal>=1){
    $menTotalCost=$menTotalCost+$data['menQty'.$qty]*$data['menQtyPrice'.$qty];
    $qty++;
    $menTotal--;
}

// women total
$qty=1;
$womenTotalCost=null;
$womenTotal=$_GET['womenTotal'];
while($womenTotal>=1){
    $womenTotalCost=$womenTotalCost+$data['womenQty'.$qty]*$data['womenQtyPrice'.$qty];
    $qty++;
    $womenTotal--;
}

// other total
$qty=1;
$otherTotalCost=null;
$otherTotal=$_GET['otherTotal'];
while($otherTotal>=1){
    $otherTotalCost=$otherTotalCost+$data['otherQty'.$qty]*$data['otherQtyPrice'.$qty];
    $qty++;
    $otherTotal--;
}

//totalEstiment
$totalEstimateCost=$menTotalCost+$womenTotalCost+$otherTotalCost;
?>

<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<header class="text-gray-600 body-font" style="margin-top: -50px;margin-bottom: -150px;">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="../../common/images/logo.jpg" />
            <span class="ml-3 text-xl">Amba Drycleaners</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="#">Home</a>
            <a class="mr-5 hover:text-gray-900" href="../user/registration.php">Registration</a>
            <a class="mr-5 hover:text-gray-900">Contact Us</a>
            <a class="mr-5 hover:text-gray-900">About</a>
        </nav>
        <a class="btn btn-primary" href="../user/login.php" role="button">Login</a>
    </div>
</header>

<body>
    <div style="margin-top: 150px;color: black;text-align: center;">
        <center>
            <h1> Your Total Estimate Cost
                <?php echo "Rs.".$totalEstimateCost?>
            </h1>
        </center>
    </div>
    <br><br><br><br>
    <center>
    <div class="sub-main">
        
    <a href="../login.php?totalEstimateCost=<?php echo $totalEstimateCost ?>">  <button class="button-two"><span>Pick up from home</span></button></a>
          <a href="../controller/dropToShop.php?totalEstimateCost=<?php echo $totalEstimateCost ?>">  <button class="button-two" ><span>Drop to Shop</span></button></a>
        
    </div>
    </center>
</body>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700italic);

    
    button {
        height: 100px;
        color: black;
        text-align: center;
        padding: 0px;
        
    }

    .sub-main {
        width: 50%;
        margin: 0px;
        float: left;
    }

    .button-two {
        text-align: center;
        cursor: pointer;
        font-size: 25px;
        margin-left: 400px;
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
        width: 300px;
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

