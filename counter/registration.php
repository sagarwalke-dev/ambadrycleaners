<?php session_start();?>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key="></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>

<style type="text/css">
    #map {
      width: 100%;
      height: 380px;
    }
    a:hover {
        color: green;
    }
</style>
<!-- adding header -->
<?php include '../common/header.html';?>

<!-- Content -->
<body>
<div class="w-full bg-grey-lightest" style="padding-top: 4rem;">
    <div class="container mx-auto py-8">
        <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
            <div class="py-4 px-8 text-black text-xl border-b border-grey-lighter">Register a Counter</div>
            <div class="py-4 px-8">
                <form method="POST" action="controller/createAccount.php" id="form" name="form" onsubmit="return sendCoordinate();">
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
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="display-address">Display Address</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="display_address"
                            type="text" name="display_address" placeholder="Your Counter Display Address">
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="contact">Contact</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="contact"
                            type="number" name="contact" maxlength=10 placeholder="Your Contact Number" required>
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
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="full-address">Full Address</label>
                        <textarea class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="full_address"
                            type="text" name="full_address" value="" placeholder="Your Counter Full Address"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="map">Pick up location</label>
                        <div id="map"></div>
                        <p style="font-size: 15px;">http://www.google.com/maps/place/<span id="onIdlePositionView"></span></p>
                    </div>

                    <span name="message" id="message"></span>
                    <div style='text-align:center'>
                        <button type="submit" name="submit"
                            class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-red active:bg-pink-600 font-bold uppercase px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition: all .5s ease" id="btn" onclick="return sendCoordinate();">
                            <i class="fas fa-heart"></i>Create Account</button>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center my-4">
            <a href="#" id="link">I already have an account</a>
        </p>
    </div>
</div>
</div>

<!-- google map js -->
<script>
    
    // Get element references
    var confirmBtn = document.getElementById('map');
    var onIdlePositionView = document.getElementById('onIdlePositionView');
  
    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
      setCurrentPosition: true, // You can omit this, defaults to true
    }, {
      zoom: 15 // You can set any google map options here, zoom defaults to 15
    });
  
  //   // Listen to button onclick event
  //   confirmBtn.onclick = function () {
  //     // Get current location and show it in HTML
  //     var location = lp.getMarkerPosition();
  //     onClickPositionView.innerHTML = location.lat + ',' + location.lng;
  //   };
  
    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function (event) {
      // Get current location and show it in HTML
      var location = lp.getMarkerPosition();
      var lat=location.lat;
      var lng=location.lng;
      onIdlePositionView.innerHTML = lat + ',' + lng;
    });
  </script>


<script>
   public function sendCoordinate(){
       alert("generating map url...");
       var xhttp = new XMLHttpRequest();
       xhttp.open("GET", "login.php", true);
       xhttp.send();
} 

</script>
<script type="text/javascript">
$('button').hover(function(){
    alert("h");
    $(this).css("background-color", "yellow");
},
function(){
    $(this).css("background-color", "pink");
});

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
 include '../common/footer.html';
?>
<?php $_SESSION['error']=null;?>
