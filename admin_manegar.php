<?php 
include('class_admin.php');
include('include/header_admin.php');



      $x=new Admin();
    
    if(isset($_POST['submit']))
    {  
           
     $admin_image = $_FILES['admin_image']['name'];
     $tmp_name    = $_FILES['admin_image']['tmp_name'];
     $path        = 'images/';
     move_uploaded_file($tmp_name,$path.$admin_image);


     $email     =$_POST['email'];
     $password  =$_POST['password'];
     $fullname  =$_POST['fullname'];

     
     $x->creatadmin($conn,$email,$password,$fullname,$admin_image);
     
    
   
    }

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
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            <form action="admin_manegar.php" method="post" enctype="multipart/form-data">
                              
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Email Admin</label>
                                    <input name="email" type="text" class="form-control">
                                </div>

                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Password</label>
                                    <input name="password" type="Password" class="form-control cc-name valid">
                             
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Full Name</label>
                                    <input name="fullname" type="text" class="form-control cc-number identified visa">
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
                                        <span id="payment-button-amount">Save</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                                $show=$x->showadmin($conn);
                                 while($row = $show->fetch_assoc())
                            {
                                echo "<tr>";
                                echo "<td>{$row['admin_id']}</td>";
                                echo "<td>{$row['admin_email']}</td>";
                                echo "<td>{$row['admin_fullname']}</td>";
                                echo "<td><img src='images/{$row['admin_image']}' width='100' height='140'></td>";
                                echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
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