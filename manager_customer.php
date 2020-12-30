<?php 

include('include/header_admin.php'); 
include('include/conct.php');


if(isset($_POST['submit']))

{
    $name=$_POST['cust_name'];
    $email=$_POST['cust_email'];
    $Password=$_POST['cust_password'];
    $Mobile=$_POST['cust_mobile'];
    $Address=$_POST['cust_address'];

 $query = "insert into customer(cust_name,cust_email,cust_password,cust_mobile,cust_address)
        values('$name','$email','$Password','$Mobile',  '$Address') ";

        mysqli_query($conn,$query);


}








?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Customer Maneger</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Customer</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Name </label>
                                                <input name="cust_name" type="text" class="form-control">
                                            </div>

                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Customer Email</label>
                                                <input name="cust_email" type="email" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Customer Password</label>
                                                <input name="cust_password" type="Password" class="form-control cc-name valid">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Customer Mobile</label>
                                                <input name="cust_mobile" type="number" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Customer Address</label>
                                                <input name="cust_address" type="text" class="form-control cc-number identified visa">    
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
                     <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Mobile</th>
                                                <th>address</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                                    $query="select * from customer";
                                                    $result= mysqli_query($conn,$query);
                                                     
                                                  while ($row= mysqli_fetch_assoc($result)) 
                                                  {

                                                  echo "<tr>";

                                                    echo "<td>{$row['cust_id']}</td>";
                              
                                                  echo "<td> {$row['cust_name']}</td>";
                                                  echo "<td> {$row['cust_email']}</td>";
                                                  echo "<td> {$row['cust_password']}</td>";
                                                  echo "<td> {$row['cust_mobile']}</td>";
                                                  echo "<td> {$row['cust_address']}</td>";
                                                  echo "<td><a href='edit_customer.php?id={$row['cust_id']}' class='btn btn-primary'>Edit</a></td>";
                                                  echo "<td><a href='delete_customer.php?id={$row['cust_id']}' class='btn btn-danger'>Delete</a></td>";
                                                  echo "</tr>";                                                   } 




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
