<?php
    // Include constants.php file here for connection
    include ('./modules/config/constants.php');

    // 1. get the ID of Admin to be deleted.
    $id = $_GET['id'];

    // 2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM admin WHERE id = $id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check wether the query executed successfully or not
    if($result==TRUE) {
        // Query executed Successfully and Admin deleted
        // echo "Admin Deleted Successfully";

        // Create Session variable to display the message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";

        // Redirect to Manage Admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    } else {
        // Faild to delete Admin
        // echo "Failed to Delete Admin";

        // Create Session variable to display the message
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later</div>";

        // Redirect to Manage Admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>