
<?php include('modules/config/constants.php') ?>

<?php 
    // 1. Distroy the session
    session_destroy(); //Unset $_SESSION and 'user'.

    // 2. Redirect to ligin page
    header('location:'.SITEURL.'admin/login.php');
?>