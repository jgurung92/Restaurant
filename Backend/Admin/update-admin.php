<?php include('modules/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1><br><br>

        <?php 
            // Get the ID of selected admin
            $id = $_GET['id'];

            // Create SQL Query to Get the Details
            $sql = "SELECT * FROM admin WHERE id = $id";

            // Execute the Query
            $result = mysqli_query($conn, $sql);

            // Check whether they query is executed or not
            if($result==TRUE) {
                // Check whether the data is avilable or not
                $count = mysqli_num_rows($result);

                // Check whether we have admin data or not
                if ($count==1) {
                    // Get the details
                    // echo "Admin Available";
                    $row = mysqli_fetch_assoc($result);

                    $full_name = $row['full_name'];
                    $username = $row['username'];

                } else {
                    // Redirect to Manage Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="update" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<!-- Updating values on the same page -->
<?php 
    // Check whether the Submit Button is Clicked or not
    if(isset($_POST['update'])) {
        // echo "Button Clicked";
        // Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Create a SQL Query to Update Admin
        $sql = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username'   
        WHERE id = '$id' 
        ";  

        // Execute the Query
        $result = mysqli_query($conn, $sql);

        // Check whether the query executed successfully or not
        if($result==TRUE) {
            // Query executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            // Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        } else {
            // Failed to Update Admin
            $_SESSION['update'] = "<div class='success'>Failed to Update Admin.</div>";
            // Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('modules/footer.php') ?>