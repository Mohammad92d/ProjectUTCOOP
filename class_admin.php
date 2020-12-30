<?php
include('include/conct.php');

class Admin 
 {
       function creatadmin($conn,$email,$password,$fullname,$admin_image)
       {

       $query = "insert into admin(admin_email,admin_password,admin_fullname,admin_image)
                                   values('$email','$password','$fullname','$admin_image') ";


        $conn->query($query);

        }

      function showadmin($conn){

       $query="select * from admin";
       $result=$conn->query($query);

        return $result;


      } 

      function viewadminINFupdate($conn,$id){

      	$query= "select * from admin where admin_id= '$id' ";
        $result=$conn->query($query);

        return $result;




      }
   
      function updatadmin($conn,$id,$email,$password,$fullname,$admin_image){

             $query = "update admin set admin_email                 = '$email',
                                        admin_password              = '$password',
                                        admin_fullname              = '$fullname',
                                        admin_image                 = '$admin_image'

             where admin_id = $id";

             $conn->query($query);
      }
     
           
       
       function deletAdmin($conn,$id)


       {            


       	        $query = "delete from admin where admin_id = $id";
       	        $conn->query($query);

       }
}

?>	