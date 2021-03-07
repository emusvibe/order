<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add New Admin</h1>
        <br/>
        <br/>
        
        <?php 
        
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
           unset($_SESSION['add']);
        }
        // else{
        //     echo $_SESSION['fail'];
        //     unset($_SESSION['fail']);
        // }
           ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                   
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                   
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                   
                </tr>
                <tr>
                    <td colspan="2">
                  <input type="submit" name="submit" value="submit" class="btn-secondary"></td>
                   
                </tr>
            </table>
        </form>
    </div>

</div>
<?php
include('partials/footer.php');
?>

<?php
//Process Values from form and save to database

//Check whether button is clicked on not


if(isset($_POST['submit'])){
    
    //Get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //Create query to submit data to database

    $sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES('$full_name','$username','$password')"; 
        
   
    $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());

    if($res==true){
     $_SESSION['add'] = "Admin Added Successfully" ;
       //redirect page
       header("location:".SITE_URL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['add'] = "Failed to Add Admin";
        //redirect page 
        header("location:".SITE_URL.'admin/add-admin.php');
    }

}

?>