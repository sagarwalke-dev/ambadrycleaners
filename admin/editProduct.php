<?php session_start();
//import database connection file
require_once "../database.php";
    //get counter id
    $counter_id=$_GET['cid'];
    $product_id=$_GET['pid'];
    //retrive data from db
    $sql="SELECT PID,PNAME,PCATEGORY,DRY_CLEAN_PRICE,STEAM_PRESS_PRICE FROM product WHERE COUNTER_ID=$counter_id AND PID=$product_id;";
   if($result=mysqli_query($conn, $sql)){
    if ($result->num_rows > 0) {
        $flag=true;
        while($row = $result->fetch_assoc()){
            $pid=$row['PID'];
            $pname=$row['PNAME'];
            $pcategory=$row['PCATEGORY'];
            $dry_price=$row['DRY_CLEAN_PRICE'];
            $steam_price=$row['STEAM_PRESS_PRICE'];
        }
    }
    
}
else{
$_SESSION['error']="Failed to display product. Try again!";
header('Location:showProduct.php');
} 
   
?>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>
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

<body style="margin-top:0px;">
    <div class="w-full bg-grey-lightest" style="padding-top: 4rem;">
        <div class="container mx-auto py-8">
            <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
                <div class="py-4 px-8 text-black text-xl border-b border-grey-lighter">Edit Product</div>
                <div class="py-4 px-8">
                    <form method="POST" action="controller/updateController.php" id="form" name="form"
                        onsubmit="return validation();">
                        <?php if (isset($_SESSION)) {?>
                        <span style="color:red;margin-left: 170px;text-align:center">
                            <?=$_SESSION['error']?>
                        </span>
                        <span style="color:green;text-align:center">
                            <?=$_SESSION['success']?>
                        </span>
                        <?php }?>
                        <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="product_name">Product
                                    ID</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="product_id" name="product_id" type="text" value="<?php echo $pid?> " readonly="readonly" style="border: none; ">
                            </div>
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="product_name">Product
                                    Name</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="product_name" name="product_name" type="text" value="<?php echo $pname?>">
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="product_category">Product
                                    Category</label>
                                    <select class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="product_category">
                                        <option value="">Select Product Category</option>
                                        <option value="men" <?php if($pcategory=='men') echo "selected='selected'"?>>Men's</option>
                                        <option value="women" <?php if($pcategory=='women') echo "selected='selected'"?>>Women's</option>
                                        <option value="other" <?php if($pcategory=='other') echo "selected='selected'"?>>Other</option>
                                    </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="clean_price">Dry Cleaning Price</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="dry_price" name="dry_price" type="number" value="<?php echo $dry_price ?>">
                            </div>
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="steam_price">Steam Press Price</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="steam_price" name="steam_price" type="number" value='<?php echo $steam_price?>'>
                            </div>
                            <!-- <div  class="flex mb-4" >
                            <div style='text-align:right'>
                                <button type="submit" name="submit"
                                    class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-red active:bg-pink-600 font-bold uppercase px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition: all .5s ease" id="btn">
                                    <i class="fas fa-heart"></i>Save Product</button>
                            </div> -->
                            <input type="hidden" name="counter_id" id="counter_id" value='<?php echo $counter_id?>'/>
                            <div style='text-align:center'>
                                <button type="submit" name="submit"
                                    class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-red active:bg-pink-600 font-bold uppercase px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition: all .5s ease" id="btn" style="border-color: black;">
                                    Update Product</button>
                            </div>
                        <!-- </div> -->
                        </div>
                    </form>
                </div>
            </div>             
        </div>
    </div>
</body>




<!-- adding footer into page -->
<?php
 include '../common/footer.html';
?>
<?php $_SESSION['error']=null;?>
<?php $_SESSION['success']=null;?>