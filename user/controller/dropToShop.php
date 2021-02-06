<?php
session_start();
require_once('../../database.php');
    if(isset($_SESSION['username'])){
        $_COOKIE['totalEstimateCost']=$_GET['totalEstimateCost'];
        // if(true){
         //check user in db
    $sql="SELECT * from COUNTER";
    //execute query
    $result=mysqli_query($conn,$sql);
    // print_r($result);

    if($result->num_rows!=0){
        //read data
        $i=1;
        while($data=mysqli_fetch_array($result)){
            $counter[$i]=array(
                'display_address'=>$data['display_address'],
                'mobile'=>$data['mobile'],
            );
            $i++;
        }
        $totalCounter=$i;
    }

    }
    else{
        $_SESSION['error']="Session Expire Please login again.";
        header('location:../login.php');
        die();
    }
?>
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
    <h1 style="text-align:center;font-size:30px" class="font-semibold text-xl tracking-tight">Select Counter</h1>
    <br><br>
<body>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <form method="get" action="../../index.php">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Counter Number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Counter Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact Number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                   
                                </th>
                                <!-- </th>
                                <th scope="col" class="relative px-6 py-3">
                                    Drop
                                    <span class="sr-only">Edit</span>
                                </th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            
                          <?php
                          $i=1;
                           while($i<$totalCounter) {?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $i?></div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $counter[$i]['display_address']?></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $counter[$i]['mobile']?></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="../../index.php?counter=<?php echo $counter[$i]['display_address']?>&totalEstimateCost=<?php echo $_GET['totalEstimateCost']?>" class="text-indigo-600 hover:text-indigo-900">Drop here</a>
                                </td>

                            </tr>

                          <?php
                          $i++;
                         } ?>
                            <!-- More items... -->
                        </tbody>
                    </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
