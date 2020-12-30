<?php


include('include/conct.php');




       $query = "delete from customer where cust_id = {$_GET['id']}";
       mysqli_query($conn,$query);

                         header("location:manager_customer.php");






?>