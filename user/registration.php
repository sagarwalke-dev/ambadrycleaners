<?php session_start();?>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<style>
    a:hover {
        color: green;
    }
</style>
<!-- adding header -->
<?php include 'common/header.php';?>

<!-- Content -->
<body>
<div class="w-full bg-grey-lightest" style="padding-top: 4rem;">
    <div class="container mx-auto py-8">
        <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
            <div class="py-4 px-8 text-black text-xl border-b border-grey-lighter">Register for a free account</div>
            <div class="py-4 px-8">
                <form method="POST" action="controller/createAccount.php" id="form" name="form" onsubmit="return validation();">
                    <span style="color:red"><?=$_SESSION['error']?></span>
                    <div class="flex mb-4">
                        <div class="w-1/2 mr-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="first_name">First
                                Name</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                id="first_name" name="first_name" type="text" placeholder="Your first name">
                        </div>
                        <div class="w-1/2 ml-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="last_name">Last
                                Name</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                id="last_name" name="last_name" type="text" placeholder="Your last name">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="contact">Contact</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="contact"
                            type="number" name="contact" maxlength=10 placeholder="Your Contact Number">
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">Email Address  (optional)</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email"
                            type="email" name="email" placeholder="Your email address">
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Password</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password"
                            type="password"  name="password" placeholder="Your secure password">
                        <p class="text-grey text-xs mt-1">At least 6 characters</p>
                    </div>
                    <span name="message" id="message"></span>
                    <div style='text-align:center'>
                        <button type="submit" name="submit"
                            class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-red active:bg-pink-600 font-bold uppercase px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition: all .5s ease" id="btn">
                            <i class="fas fa-heart"></i>Create Account
</button>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
</div>
</div>

<script type="text/javascript">
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
  function validation(){
     $fname= document.getElementById('fname').value;
     $lname=document.getElementById('lname').value;
     $email=document.getElementById('email').value;
     $contact=document.getElementById('contact');
     $pwd=document.getElementById('password').value;
     $confirmpdw=document.getElementById('confirmpwd').value;
    if($pwd!=$confirmpdw){
        alert("Please make sure confirm password should be same as password");
        return false;
    }
    else
    alert(Equal);
  }
    </script>
<!-- adding footer into page -->
<?php
 include 'common/footer.php';
?>
<?php $_SESSION['error']=null;?>
