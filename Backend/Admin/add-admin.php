
<?php include('modules/menu.php') ;?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1><br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('modules/footer.php') ?>



<!-- Back End -->
<!-- Process the value from the same page "" -->
<?php 

    // Process the value from Form and Save it in Database
    // Check whether the submit button is clicked or not
    if(isset($_POST['submit'])) {
        // button clicked
        // echo "Button Clicked";

        //1. Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password =md5($_POST['password']); //md5 will encrypt our password  

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password' 
        ";

        //3. Execute Query and Save the data in Database
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // Check whether the (Query is executed) data is inserted or not and display appropriate message
        if($result==TRUE) {
            // Data inserted
            // echo "Data Inserted";
            $_SESSION['status'] = "Admin Added Successfully";
            print_r($_SESSION); // Debugging: Ensure session is set
            header('location:'.SITEURL.'admin/manage-admin.php');
            exit(); 
        } else {
            // Failed to insert data
            echo "Filed to insert Data";

            // create a session variable to dispaly message
            // $_SESSION['add'] = "Failed to add Admin";
            // redirect page to add admin
            // header("location:" .SITEURL. 'admin/add-admin.php');
        }
    } 
?>


