 <?php
        
      include('class_admin.php');
     $z=new Admin();
     $id=$_GET['id'];
     $z->deletAdmin($conn,$id);



     header("location:admin_manegar.php");


        

    ?>
