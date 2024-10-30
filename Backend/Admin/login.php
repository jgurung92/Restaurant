<?php include('modules/config/constants.php') ?>

<html>
    <head>
        <title>Login - Nepal Restaurant System</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login </h1><br><br>

            <br><br>
            <?php 
            // Debugging: Check all session variables
            // print_r($_SESSION); 
                //  Message Session for login
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']); 
                }
            ?>
            <br><br>

            <!-- Login Form Starts here -->
            <form action="" method="POST" class="text-center">
                Username: <br><br>
                <input type="text" name="username" placeholder="Enter Username" class="input"><br><br>
                Password: <br><br>
                <input type="password" name="password" placeholder="Enter Password" class="input"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary input" ><br><br>
            </form>
            <!-- Login Form Ends here -->
            <p class="text-center">Created By - <a href="#">Jiten Gurung</a></p>
        </div>
    </body>
</html>

<?php 
    // Check whether the Submit Button is clicked or not
    if(isset($_POST['submit'])) {
        // Process for Login
        //1. Get the Data from Login form 
        $username = $_POST['username'];
        $password = $_POST['password'];

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        //3. Execute the Query
        $result = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($result);

        if($count==1) {
            // User available and Login Success
            $_SESSION['login'] = "<div class='success'> Login Successful </div>" ;
            // Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        } else {
            // User not found
            $_SESSION['login'] = "<div class='error'> Login Failed </div>" ;
            // Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>