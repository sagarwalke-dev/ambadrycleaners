<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<header class="text-gray-600 body-font" style="margin-top: -50px;margin-bottom: -150px;">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="images/logo.jpg"/>
            <span class="ml-3 text-xl">Amba Drycleaners</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="displayProducts.php">Home</a>
            <?php if(empty($_SESSION['username'])){?>
            <a class="mr-5 hover:text-gray-900" href="registration.php">Registration</a>
            <?php }?>
            <a class="mr-5 hover:text-gray-900">Contact Us</a>
            <a class="mr-5 hover:text-gray-900">About</a>
        </nav>
        <?php if(!empty($_SESSION['username'])){?>
        <a class="btn btn-primary" href="../controller/logoutController.php" role="button">Logout</a>
        <?php }
        else{
            ?>
            <a class="btn btn-primary" href="../user/login.php" role="button">Login</a>
            <?php
        }
?>
    </div>
</header>