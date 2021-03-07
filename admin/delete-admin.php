<?php

include('../config/db.php');
//Get ID for Admin to be deleted

$id = $_GET['id'];
//Create Query to Delete

$sql = "DELETE FROM tbl_admin WHERE id = $id";

$res = mysqli_query($conn, $sql);
//Redirect to admin page with success or failure message

if($res==TRUE){
   //Create session variable to display message

   $_SESSION['delete'] = "<div class='success'>Admin deleted Successfully</div>";   
    header("location:".SITE_URL.'admin/manage-admin.php');  
    
}

else{
    $_SESSION['delete'] = "<div class='error'>Admin deleted Successfully</div>";   
    header("location:".SITE_URL.'admin/manage-admin.php');
}