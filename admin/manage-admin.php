<?php
include('partials/menu.php');
?>

     <!--Main Content Section Starts Here -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br/>
            <br/>
            <!--Button to add admin-->
           <?php if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
           }
                elseif(isset($_SESSION['delete'])){               
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
           }
                elseif(isset($_SESSION['update'])){               
                echo $_SESSION['update'];
                unset($_SESSION['update']);
           }
                elseif(isset($_SESSION['user-not-found'])){               
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
           }
                elseif(isset($_SESSION['pwd-no-match'])){               
                echo $_SESSION['pwd-no-match'];
                unset($_SESSION['pwd-no-match']);
           }
                elseif(isset($_SESSION['update-pass'])){               
                    echo $_SESSION['update-pass'];
                    unset($_SESSION['update-pass']);
           }
           ?>
           <br/>
           <br/>
           <br/>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br/>
            <br/>
            <br/>
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php 

                //query to get all Admin
                $sql = "SELECT * FROM tbl_admin";

                //Execute Query
                $result = mysqli_query($conn, $sql);  

                //check whether query is executed or not
                if($result==true){
                    //count Rows to check whether there's is data in database or not

                    $count = mysqli_num_rows($result);

                //check number of rows

                    if($count>0){

                        while($rows=mysqli_fetch_assoc($result))
                        {
                           //using while loop to get all dat from database

                           //Get individual data

                           $id = $rows['id'];
                           $full_name = $rows['full_name'];
                           $username = $rows['username'];                       
                        
                           //Display Values in table
                           ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $full_name ?></td>
                                <td><?php echo $username ?></td>                  
                                <td><a href="<?php echo SITE_URL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                                <a href="<?php echo SITE_URL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete</a>
                                <a href="<?php echo SITE_URL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a></td>
                            </tr>
                           <?php

                        }
                    }
                    else{
                        //No data in DB
                    }



                }

                ?>
                             
            </table>

        </div>        
        <!--Main Content Section Starts Here -->
    </div>

    <!--Footer Section Starts Here -->
    <?php
include('partials/footer.php');
?>