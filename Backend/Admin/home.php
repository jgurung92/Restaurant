
<?php include('modules/menu.php') ?>

<!-- Main-Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>

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

        <div class="col-4 text-center">
            <h1>5</h1> <br>
            Categories
        </div> 

        <div class="col-4 text-center">
            <h1>5</h1> <br>
            Categories
        </div> 

        <div class="col-4 text-center">
            <h1>5</h1> <br>
            Categories
        </div> 

        <div class="col-4 text-center">
            <h1>5</h1> <br>
            Categories
        </div> 
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main-Content Section Ends Starts --> 

<?php include('modules/footer.php') ?>