<?php 
include('include/conct.php');

   if(isset($_POST['submit']))



    { 

        $product_image = $_FILES['pro_image']['name'];
        $tmp_name      = $_FILES['pro_image']['tmp_name'];
        $path          = 'images/';
        move_uploaded_file($tmp_name,$path.$product_image);
        $name=$_POST['pro_name'];
        $cat_name=$_POST['cat'];
        $Description=$_POST['pro_desc'];
        $pro_price=$_POST['pro_price'];
        $pro_qty=$_POST['pro_qty'];
         

         $query_select = "select cat_id from category where cat_name ='$cat_name'";
         $result       =  mysqli_query($conn,$query_select);
         $row          =  mysqli_fetch_assoc($result);
         $cat          =  $row['cat_id']; 


         
   $query = "insert into products(pro_name,pro_desc,pro_price,pro_image,cat_id,qty)
        values('$name','$Description','$pro_price','$product_image','$cat','$pro_qty') ";

        mysqli_query($conn,$query);


        
    }




include('include/header_admin.php');




   
?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">product Maneger</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create product</h3>
                            </div>
                            <hr>
                                        <form action="" method="post" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name </label>
                                             <input name="pro_name"  type="text" class="form-control">
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Description</label>
                                                <input name="pro_desc"    type="text" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Price</label>
                                                <input name="pro_price"   type="text" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product qty</label>
                                                <input name="pro_qty"  type="text" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                              </div>
                                               <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Category</label>
                                              
                                                <select name="cat">

                                                <?php
                                                $query = "select * from category";
                                                $result = mysqli_query($conn,$query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                echo "<option> ".$row['cat_name']." </option>";
                                                }
                                                ?>
                                                </select>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product image</label>
                                                <input name="pro_image"  type="file" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                          
                                            <div>
                                                <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fas fa-save"></i>&nbsp;
                                                    <span id="payment-button-amount">Save</span>
                                                </button>
                                            </div>
                                        </form>
                                  <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>cat_ID</th>
                                <th>cat_Name</th>
                                <th>qty</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php

                                 $query = "select products.pro_id,products.pro_name,products.pro_desc,
                                 products.pro_price,products.pro_image,products.qty,category.cat_id,
                                 category.cat_name  from products inner join category ON products.cat_id=category.cat_id";
                                  
                                 


                                 // $query  = "select * from products";
                                 $result = mysqli_query($conn,$query);
                                 while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>{$row['pro_id']}</td>";
                                echo "<td>{$row['pro_name']}</td>";
                                echo "<td>{$row['pro_desc']}</td>";
                                echo "<td>{$row['pro_price']}</td>";
                                echo "<td><img src='images/{$row['pro_image']}' width='100' height='140'></td>";
                                echo "<td>{$row['cat_id']}</td>";
                                echo "<td>{$row['cat_name']}</td>";
                                echo "<td>{$row['qty']}</td>";
                                echo "<td><a href='edit_Product.php?id={$row['pro_id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_Product.php?id={$row['pro_id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }

                          ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>

                                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>

    <?php include('include/footer_admin.php');?>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    </body>

    </html>
    <!-- end document-->