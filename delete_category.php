	<?php

   include('include/conct.php');




       $query = "delete from category where cat_id = {$_GET['id']}";

         mysqli_query($conn,$query);


                  header("location:manegar_category.php");

 

?>	