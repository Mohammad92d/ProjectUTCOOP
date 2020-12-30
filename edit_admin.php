<?php 
include('class_admin.php');

    

     $x=new Admin();
     $id=$_GET['id'];

   if(isset($_POST['submit']))
    {
        $admin_image = $_FILES['admin_image']['name'];
        $tmp_name    = $_FILES['admin_image']['tmp_name'];
        $path        = 'images/';
        move_uploaded_file($tmp_name,$path.$admin_image);

        $email     =$_POST['email'];
        $password  =$_POST['password'];
        $fullname  =$_POST['fullname'];

         
        $x->updatadmin($conn,$id,$email,$password,$fullname,$admin_image);

        // print_r($adminSet);
        // die('fgfg');

        header("location:admin_manegar.php");   
    }

   
    $result=$x->viewadminINFupdate($conn,$id);
    $adminSet =$result->fetch_assoc(); 

        include('include/header_admin.php');




   
?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Admin Maneger</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                              
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Email Admin</label>
                                    <input name="email" value="<?php echo $adminSet['admin_email']; ?>"  type="text" class="form-control">
                                </div>

                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Password</label>
                                    <input name="password" value="<?php echo $adminSet['admin_password'] ;?>" type="Password" class="form-control cc-name valid">
                             
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Full Name</label>
                                    <input name="fullname" value="<?php echo $adminSet['admin_fullname'] ;?>" type="text" class="form-control cc-number identified visa">
                                    <span class="help-block" data-valmsg-for="cc-number"
                                        data-valmsg-replace="true"></span>
                                </div>

                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Image</label>
                                    <input name="admin_image" type="file" class="form-control cc-number identified visa">
                                    <span class="help-block" data-valmsg-for="cc-number"
                                        data-valmsg-replace="true"></span>
                                </div>

                                <div>
                                    <button id="payment-button" name="submit" type="submit"
                                        class="btn btn-lg btn-info btn-block">
                                        <i class="fas fa-save"></i>&nbsp;
                                        <span id="payment-button-amount">Update</span>
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