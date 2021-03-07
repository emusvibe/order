<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br/>
        <br/>
        
        <?php 
        
       
        //Get ID for Admin to be deleted
        $id = $_GET['id'];

        //Create SQL query to get details of selected admin

        $sql = "SELECT * FROM tbl_admin WHERE id = $id";

        //Execute Query

        $res = mysqli_query($conn, $sql);

        //CHeck if query is executed or not
         if($res==true){
             //Check whether data is available or not

             $count = mysqli_num_rows($res);

             if($count ==1){
                $row=mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
             }
             else{
                 //redirect to manage admin page
                 header("location:".SITE_URL.'admin/manage-admin.php');
             }
         }

           ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                   
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"  value="<?php echo $username;?>"></td>
                   
                </tr>
                
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                  <input type="submit" name="submit" value="Update" class="btn-primary"></td>
                   
                </tr>
            </table>
        </form>
    </div>

</div>
<?php
include('partials/footer.php');
?>

<?php
//Check whether button is clicked on not
if(isset($_POST['submit'])){
    //Get ID for Admin to be deleted

    //Get all Data for selected ID
    $id = $_POST['id'];  
    $full_name = $_POST['full_name'];
    $username = $_POST['username']; 

    //Create query to submit data to database

    $sql = "UPDATE tbl_admin SET full_name = '$full_name', username = '$username' WHERE id = '$id'"; 
        
   
    $res = mysqli_query($conn, $sql);

    if($res==true){
     $_SESSION['update'] = "<div class ='success'>Admin Updated Successfully</div>";
       //redirect page
       header("location:".SITE_URL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update'] = "Failed to Update Admin";
        //redirect page 
        header("location:".SITE_URL.'admin/add-admin.php');
    }

}

?>