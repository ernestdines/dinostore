<?php
    session_start();
    require '../lib/functions.php';

    if (isset($_POST['submit']) && ($_POST['password'] == $_POST['password2'])) {
            $success = add_user($_POST['username'], $_POST['password']);

            if($success == true) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['active'] = true;
            }
    }
?>

<?php require 'layout/header.php';?>

<div class="container">

    <?php if ($success == true) {
            echo '<h3><br>'.$_POST['username']. ' successfully added</h3><br>';
        }
        else{?>

    <h2><br>Create an account</h2><br>

    <?php 
        if(!isset($success) && isset($_POST['submit']))
            echo'<span class="error-message">Passwords do not match</span>';
        elseif(isset($success))
            echo'<span class="error-message">Account already exists</span>';?>

    <form action="" method="post" name="createaccount-form" class="form-signin">
        <h4>Email address:</h4><input type="email" name="username" placeholder="e.g. john@mail.com" required>
        <h4>Password:</h4><input type="password" name="password" required>
        <h4>Confirm password:</h4><input type="password" name="password2" required>
        <br><br>
        <button name="submit" value="submit" class="button" type="submit">Create account</button>
    </form>


    <?php }?>
   
    </div>

    <hr>


<?php require 'layout/footer.php'; ?>