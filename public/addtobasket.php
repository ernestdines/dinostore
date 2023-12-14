<?php
    session_start();

    require '../lib/functions.php';

    if(isset($_POST['addtobasket'])) {
        if(isset($_POST['quantity']))
            addtobasket($_POST['addtobasket'], $_POST['quantity']);
        else addtobasket($_POST['addtobasket']);
    
?>

<?php require 'layout/header.php';?>

<div class="container">

    <br><h2>Success!</h2>
    <h4><br>Your item was added to the basket.</h4>
    <br>
    <a href="basket.php"><button>View basket</button></a>
    <a href="index.php"><button>Continue shopping</button></a>
    </div>

    <hr>
<?php } 
else header('Location: index.php');?>

<?php require 'layout/footer.php'; ?>