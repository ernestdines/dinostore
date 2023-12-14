<?php
    session_start();

    require '../lib/functions.php';
?>

<?php require 'layout/header.php';?>

<div class="container">


    <h2><br>Sign in to dinostore.com</h2><br>


<?php

/* Check if login form has been submitted */
/* isset — Determine if a variable is declared and is different than NULL*/


if(isset($_POST['submit']))
{
    // Check if the form's username and password matches
    
    if(check_password($_POST['username'], $_POST['password']))
    {
        echo 'Success';
        // Success: Set session variables and redirect to protected page
        $_SESSION['username'] = $_POST['username']; //store Username to the session
        $_SESSION['active'] = true; //remember we can call a session what we like e.g. $_SESSION["newsession"]=$value;
        header("location:index.php"); // 'header() is used to redirect the browser
        exit; //we’ve just used header() to redirect to another page but we must terminate all current code so that it doesn’t run when we redirect
    }
    else
        echo '<span class="error-message">Incorrect Username or Password</span>';
}
?>

    <form action="" method="post" name="signin_form" class="form-signin">
        <h4>Email address:</h4><input type="email" name="username" placeholder="e.g. john@mail.com">
        <h4>Password:</h4><input type="password" name="password">
        <br><br>
        <button name="submit" value="signin" class="button" type="submit">Sign in</button>
    </form>
    
        <p><br>Don't have an account?</p>
        <a href="createaccount.php">Create an account</a>


   
    </div>

    <hr>


<?php require 'layout/footer.php'; ?>