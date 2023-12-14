<?php
    session_start();
    require '../lib/functions.php';
    if(!isset($_SESSION['username']))
        header('location: signin.php');

    if(isset($_POST['deleteaccount'])) {
        delete_user($_SESSION['username']);
    require_once '../src/session.php';
    $session = new session();
    $session->killSession();
    }    
?>

<?php require 'layout/header.php';?>

<div class="container">

    <?php if (isset($_POST['deleteaccount'])) {
            echo '<h3><br>Account has been deleted.</h3><br>';
        }
        else{?>

    <h2><br>Delete account</h2><br>

    <h4>Are you sure?<br><br>This operation cannot be undone.</h4><br>

    <form action="" method="post" name="createaccount-form" class="form-signin">
        <button name="deleteaccount" value="confirm" class="button" type="submit">Confirm</button>
    </form>

        <br><a href="account.php">Back to My Account</a>


    <?php }?>
   
    </div>

    <hr>


<?php require 'layout/footer.php'; ?>