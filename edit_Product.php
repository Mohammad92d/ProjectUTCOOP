<?php 
include('include/conct.php');

   if(isset($_POST['submit']))
    {

        $pro_image = $_FILES['pro_image']['name'];
        $tmp_name    = $_FILES['pro_image']['tmp_name'];
        $path        = 'images/';
        move_uploaded_file($tmp_name,$path.$pro_image);


        $name=$_POST['pro_name'];
        $Description=$_POST['pro_des'];
        $pro_price=$_POST['pro_price'];
        $pro_qty=$_POST['pro_qty'];


         
     $query = "update products set pro_name        = '$name',
                               pro_desc            = '$Description',
                               pro_price           = '$pro_price',
                               pro_image           = '$pro_image',
                               qty                 = '$pro_qty'

             where pro_id = {$_GET['id']}";

        mysqli_query($conn,$query);


        header("location:manegar_product.php");
    }


$query    = "select * from products where pro_id = {$_GET['id']}";
$result   = mysqli_query($conn,$query);
$adminSet = mysqli_fetch_assoc($result); 

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
                                <h3 class="text-center title-2">Edit product</h3>
                            </div>
                            <hr>
                                        <form action="" method="post" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name </label>
                                             <input name="pro_name" value="<?php echo $adminSet['pro_name']; ?>"  type="text" class="form-control">
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Description</label>
                                                <input name="pro_des" value="<?php echo $adminSet['pro_desc']; ?>"   type="text" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Price</label>
                                                <input name="pro_price" value="<?php echo $adminSet['pro_price']; ?>" type="text" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product qty</label>
                                                <input name="pro_qty" value="<?php echo $adminSet['qty']; ?>" type="text" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Image</label>
                                                <input name="pro_image" type="file" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                          
                                            <div>
                                                <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fas fa-save"></i>&nbsp;
                                                    <span id="payment-button-amount">Save</span>
                                                </button>
                                            </div>
                                        </form>
                              

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