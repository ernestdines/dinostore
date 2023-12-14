<?php
    session_start();
    require '../lib/functions.php';
    if(!isset($_SESSION['username']))
        header('location: signin.php');

    if (isset($_POST['submit']) && ($_POST['password'] == $_POST['password2']))
        change_password($_SESSION['username'], $_POST['password']);
?>

<?php require 'layout/header.php';?>

<div class="container">

    <?php if (isset($_POST['submit']) && ($_POST['password'] == $_POST['password2'])) {
            echo '<h3><br>Password successfully changed.</h3><br>';
        }
        else{?>

    <h2><br>My account</h2><br>

    <?php 
        if (isset($_POST['submit']))
            echo'<span class="error-message">Passwords do not match</span>';?>

    <form action="" method="post" name="account-form" class="form-signin">
        <h4>Email address: <?php echo $_SESSION['username'];?></h4>
        <h4>New password:</h4><input type="password" name="password">
        <h4>Confirm password:</h4><input type="password" name="password2">
        <br><br>
        <button name="submit" value="change-password" class="button" type="submit">Change password</button>
    </form>

        <br><a href="deleteaccount.php">Delete account</a>

    <?php }?>
   
    </div>

    <hr>


<?php require 'layout/footer.php'; ?>