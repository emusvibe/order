<?php
    include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>
        <br/>
        <br/>
        <?php       
            $id = $_GET['id'];        
        ?>
        <form action="" method="POST">
            <table class="tbl-30">

            <tr>
                <td>Current Password:</td>
                <td><input type="password" name="current_password" placeholder="Enter Current Password"></td>
            </tr>

            <tr>
                <td>New Password:</td>
                <td><input type="password" name="new_password" placeholder="Enter New Password"></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" placeholder="Enter Confirm Password"></td>
            </tr>

            <tr>
            <input type="hidden" name="id" value="<?php echo $id; ?>">    
            <td colspan="2"><input type="submit" name="submit" value="Update Password" class="btn-primary"></td>                
            </tr>
            
        
        </table>

        </form>

    </div>


</div>

<?php
    //check if submit has been clicked
    if(isset($_POST['submit'])){
        //1. Get data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. Check whether user with current id and password exists   
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);

        if($res==true){
        $count = mysqli_num_rows($res);

        
        if($count==1){
            // Admin Exists

        //3. Check whether New Password and Confirm Password Match
        
        if($new_password == $confirm_password){
            $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = '$id'"; 
            $res2 = mysqli_query($conn, $sql2);

            if($res2==true){
            $_SESSION['update-pass'] = "<div class ='success'>Password Updated Successfully</div>";
            //redirect page
            header("location:".SITE_URL.'admin/manage-admin.php');
            }
            else{
                $_SESSION['update-pass'] = "Failed to Update Password";
                //redirect page 
                header("location:".SITE_URL.'admin/manage-admin.php');
            }
           
        }
        else{
             //New Password & Confirm Password not Match
             $_SESSION['pwd-no-match'] = "<div class='error'>Cannot Confirm New Password</div>";
             header("location:".SITE_URL.'admin/manage-admin.php');
        }
        }
        else{
            //Admin Does not exist
            $_SESSION['user-not-found'] = "<div class='error'>Admin User Not Found</div>";
            header("location:".SITE_URL.'admin/manage-admin.php');
        }
    }

    }


?>

<?php
    include('partials/footer.php');
?>