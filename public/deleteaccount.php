<?php
    session_start();
    require '../lib/functions.php';
    if(!isset($_SESSION['username']))
        header('location: signin.php');

    if(isset($_POST['deleteaccount'])) {
        $success = delete_user($_SESSION['username'], $_POST['password']);

        if($success == true) {
            require_once '../src/session.php';
            $session = new session();
            $session->killSession();
        }
    }    
?>

<?php require 'layout/header.php';?>

<div class="container">

    <?php if($success == true) {
            echo '<h3><br>Account has been deleted.</h3><br>';
        }
        else{?>

    <h2><br>Delete account</h2><br>

    <?php
        if(isset($success))
            echo'<span class="error-message">Incorrect password</span>';?>

    <h4>Are you sure?<br><br>This operation cannot be undone.</h4><br>

    <form action="" method="post" name="createaccount-form" class="form-signin">
        <h4>Enter password:</h4><input type="password" name="password" required>
        <br><br>
        <button name="deleteaccount" value="confirm" class="button" type="submit">Confirm</button>
    </form>

        <br><a href="account.php">Back to My Account</a>


    <?php }?>
   
    </div>

    <hr>


<?php require 'layout/footer.php'; ?>