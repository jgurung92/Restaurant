
<?php 
include('modules/menu.php') 
?>

<!-- Main-Content Section Starts -->
<div class="main-content"> 
    <div class="wrapper"> 
        <h1>Manage Admin</h1><br><br>
        
        <?php 
        // Debugging: Check all session variables
        // print_r($_SESSION); 

        if (isset($_SESSION['status'])) {
            echo $_SESSION['status']; // Displaying Session Message
            unset($_SESSION['status']); // Clear the message after displaying
        }

        // Message Session for Delete 
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']); 
        }

        //  Message Session for Update 
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']); 
        }

        //  Message Session for user-not-found 
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']); 
        }

        //  Message Session for pwd-not-match
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']); 
        }

        //  Message Session for change-pwd
        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']); 
        }

        ?>


<!-- Button to add Admin -->

        <a href="add-admin.php" class="btn-primary">Add Admin</a> <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>

            <?php 
                
                $sql = "SELECT * FROM admin";  // Query to GET all admin
                $result = mysqli_query($conn, $sql);  // Execute the Query

                // Check wether the Query is Executed or not
                if($result==TRUE) 
                {
                    // Count Rows to check if there is data in the database or not
                    $count = mysqli_num_rows($result); //Function to get all the rows in database
                    $sn=1; //Create a variable and assign the value for id.

                    // Check the num of rows
                    if($count>0) {
                        // We have data in database
                        while($rows=mysqli_fetch_assoc($result)) {
                            // Using while loop to get all the data from database.
                            // and while loop will run as long as we have data in database

                            // Get individual data
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                            // Display the values in our table ...HTML field
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $full_name ?></td>
                                <td><?php echo $username ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>  
                                </td>
                            </tr>
                            
                            <?php 
                        }
                    }else {
                        // We do not have data in database
                    }
                }
            ?>
        </table>
    </div>
</div>
<div class="clearfix">

<!-- Main-Content Section Ends Starts -->

<?php include('modules/footer.php') ?>