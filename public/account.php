<?php
    session_start();
    require '../lib/functions.php';
    if(!isset($_SESSION['username']))
        header('location: signin.php');
?>

<?php require 'layout/header.php';?>

<div class="container">


    <h2><br>My account</h2><br>

    <form action="" method="post" name="account-form" class="form-signin">
        <h4>Email address: <?php echo $_SESSION['username'];?></h4>
        <h4>Password:</h4><input type="password" name="password">
        <h4>Confirm password:</h4><input type="password" name="password2">
        <br><br>
        <button name="submit" value="change-password" class="button" type="submit">Change password</button>
    </form>

        <br><a href="deleteaccount.php">Delete account</a>


   
    </div>

    <hr>


<?php require 'layout/footer.php'; ?>