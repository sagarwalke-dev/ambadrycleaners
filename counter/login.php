<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg.svg">
		</div>
		<div class="login-content">
			<form action="controller/loginController.php" method="POST">
				<img src="images/avatar.svg">
				<h3 class="title">Welcome Back</h3>
				<br><br>
				<span style="color:red"><?=$_SESSION['error']?></span>
				<span style="color:green"><?=$_SESSION['success']?></span>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
							  <h5>Username</h5>							  
           		   		<input type="text" class="input" name="username" maxlength="10"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<!-- <a href="#">Forgot Password?</a> -->
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php
//invalidate session msg
 $_SESSION['error']=null;
 $_SESSION['success']=null;
?>