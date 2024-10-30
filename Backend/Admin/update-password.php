
<?php include('modules/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1> <br><br>

        <?php 
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            }
        ?>

        <form action="" method = "POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan = "2" >
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    // Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit'])) {
        // echo "Clicked";

        // 1. Get the Data from Form
        $id = $_POST['id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // 2. Check whether the user with current ID and Current Password Exists or not
        $sql = "SELECT * FROM admin WHERE id = $id AND password = '$current_password'";

        // Execute the Query
        $result = mysqli_query($conn, $sql);

        if($result==TRUE) {
            // Check whether data is avilable or not
            $count = mysqli_num_rows($result);

            if($count==1) {
                // User Exist and Password can be changed
                // echo "User Found";

                // Check whether the new password and confirm match or not
                if($new_password==$confirm_password) {
                    // Update Password
                    // echo "Password Match";
                    $sql2 = "UPDATE admin SET
                        PASSWORD = '$new_password'
                        WHERE id=$id
                    ";

                    // Execute the Query
                    $result2 = mysqli_query($conn, $sql2);

                    // Check whether the query executed or not
                    if($result2==2) {
                        // Redirect to Manage Admin with Success Message
                        $_SESSION['change-pwd']= "<div class='error'>Password Changed Successfully. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    } else {
                        // Display Error Message 
                        // echo "Failed to Change Password.";

                        // Redirect to Manage Admin with Error Message
                        $_SESSION['change-pwd']= "<div class='error'>Failed to Change Password. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                        
                    }
                } else {
                    // Redirect to Manage Admin Page with Error Message
                    $_SESSION['pwd-not-match']= "<div class='error'>Password Not Match. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            } else {
                // User does not exist set Message and Redirect
                $_SESSION['user-not-found']= "<div class='error'>User Not Found. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        // 3. Check whether the New Password and Confirm Password Match or not
        

        // 4. Change Password if all above is true.
    }
?>

<?php include('modules/footer.php') ?>