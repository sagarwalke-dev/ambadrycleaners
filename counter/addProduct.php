<?php session_start();?>
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
                <div class="py-4 px-8 text-black text-xl border-b border-grey-lighter">Add Product</div>
                <div class="py-4 px-8">
                    <form method="POST" action="controller/productController.php" id="form" name="form"
                        onsubmit="return validation();">
                        <span style="color:red;margin-left: 170px;">
                            <?=$_SESSION['error']?>
                        </span>
                        <span style="color:green;">
                            <?=$_SESSION['success']?>
                        </span>
                        
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="product_name">Product
                                    Name</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="product_name" name="product_name" type="text" placeholder="Enter Product name">
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="product_category">Product
                                    Category</label>
                                    <select class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="product_category">
                                        <option value="">Select Product Category</option>
                                        <option value="men" >Men's</option>
                                        <option value="women">Women's</option>
                                        <option value="other">Other</option>
                                    </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="clean_price">Dry Cleaning Price</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="dry_price" name="dry_price" type="number" placeholder="Enter Product Dry Cleaning Price">
                            </div>
                            <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="steam_price">Steam Press Price</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                    id="steam_price" name="steam_price" type="number" placeholder="Enter Product Steam Press Price">
                            </div>
                            <!-- <div  class="flex mb-4" >
                            <div style='text-align:right'>
                                <button type="submit" name="submit"
                                    class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-red active:bg-pink-600 font-bold uppercase px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition: all .5s ease" id="btn">
                                    <i class="fas fa-heart"></i>Save Product</button>
                            </div> -->
                            <div style='text-align:center'>
                                <button type="submit" name="submit"
                                    class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-red active:bg-pink-600 font-bold uppercase px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition: all .5s ease" id="btn">
                                    <i class="fas fa-heart"></i>Add Product</button>
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