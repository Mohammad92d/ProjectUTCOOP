<?php

include('include/conct.php');


 if(isset($_POST['submit']))
 	
    {
    $name=$_POST['cust_name'];
    $email=$_POST['cust_email'];
    $Password=$_POST['cust_password'];
    $Mobile=$_POST['cust_mobile'];
    $Address=$_POST['cust_address'];

         
     $query = "update customer set cust_name        = '$name',
                               cust_email      = '$email',
                               cust_password      = '$Password',
                               cust_mobile       ='$Mobile',
                               cust_address      ='$Address'

             where cust_id = {$_GET['id']}";

        mysqli_query($conn,$query);


        header("location:manager_customer.php");
    }

include('include/header_admin.php');



$query="select * from customer where cust_id={$_GET['id']}";

$result=mysqli_query($conn,$query);

$adminSet=mysqli_fetch_assoc($result);



?>



<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">customer Maneger</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit customer</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                              
                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Name </label>
                                                <input name="cust_name" value="<?php echo $adminSet['cust_name'] ;?> " type="text" class="form-control">
                                            </div>

                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Customer Email</label>
                                                <input name="cust_email" value="<?php echo $adminSet['cust_email']; ?>" type="email" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Customer Password</label>
                                                <input name="cust_password" value="<?php echo $adminSet['cust_password']; ?>" type="Password" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Customer Mobile</label>
                                                <input name="cust_mobile" value="<?php echo $adminSet['cust_mobile']; ?>" type="number" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Customer Address</label>
                                                <input name="cust_address" value="<?php echo $adminSet['cust_address']; ?>" type="text" class="form-control cc-number identified visa">    
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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