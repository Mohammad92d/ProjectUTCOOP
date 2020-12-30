<?php
include('include/conct.php');

   if(isset($_POST['submit']))
    {
        $cat_image = $_FILES['cat_image']['name'];
        $tmp_name    = $_FILES['cat_image']['tmp_name'];
        $path        = 'images/';
        move_uploaded_file($tmp_name,$path.$cat_image);

        $cat_name=$_POST['cat_name'];
        $cat_des=$_POST['cat_des'];
       

         
     $query = "update category set cat_name        = '$cat_name',
                                   cat_des         = '$cat_des' ,
                                   cat_image       = '$cat_image'
                            

             where cat_id = {$_GET['id']}";

             mysqli_query($conn,$query);


        header("location:manegar_category.php");
    }


$query    = "select * from category where cat_id = {$_GET['id']}";
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
                        <div class="card-header">Category Maneger</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Category </h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                              
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input name="cat_name" value="<?php echo $adminSet['cat_name']; ?>"  type="text" class="form-control">
                                </div>

                              <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Description</label>
                                    <input name="cat_des" value="<?php echo $adminSet['cat_des']; ?>"  type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                    <input name="cat_image"  type="file" class="form-control">
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