<?php
session_start();
$flag=false;
 //import database connection file
 require_once "../database.php";
 //check session
if (isset($_SESSION['username'])) {
   //insert user into db
   $sql="SELECT PID,PNAME,PCATEGORY,DRY_CLEAN_PRICE,STEAM_PRESS_PRICE,COUNTER_ID FROM product";
   if($result=mysqli_query($conn, $sql)){
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

<!-- adding header -->
<!-- <?php include '../common/header.html';?> -->
<!-- Content -->
    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <!-- ... -->
    </head>
    
    <!-- This example requires Tailwind CSS v2.0+ -->
    <br>
    <h1 style="text-align:center;font-size:30px" class="font-semibold text-xl tracking-tight">All Product List</h1>
    <br><br>
    <center>
    <span style="color:red;text-align:center;"><?php echo $_SESSION['error']?></span>
    <span style="color:green;text-align:center;"><?php echo $_SESSION['success']?></span>
    </center>
    <body>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dry Cleaning Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Steam Price
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          <?php while($row = $result->fetch_assoc()) {?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $row['PID']?></div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $row['PNAME']?></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $row['DRY_CLEAN_PRICE']?></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $row['STEAM_PRESS_PRICE']?></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="editProduct.php?cid=<?php echo $row['COUNTER_ID']?>&pid=<?php echo $row['PID']?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                <input type="hidden" name="counter_id" id="counter_id"/>

                            </tr>
                          <?php } ?>
                            <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- adding footer into page -->
<?php
 include '../common/footer.html';
?>
<?php $_SESSION['error']=null;?>
<?php $_SESSION['success']=null;?>