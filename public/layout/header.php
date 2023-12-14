<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/icon.png">

    <title>Dinostore</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <img src="images/iconwhite.png" alt="triceratops icon" id="dinoicon">
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Dinostore</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><!--class="active">--><a href="index.php">All Products</a></li>
                    <li><a href="index.php?category=toys">Toys</a></li>
                    <li><a href="index.php?category=books">Books</a></li>
                    <li><a href="index.php?category=clothing">Clothing</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php if($_SESSION['active'] == false) {?>
                    <li><a href="signin.php">Sign in</a></li>
                    <?php } else { ?>
                    <li><a href="account.php">My account</a></li>
                    <li><a href="signout.php">Sign out</a></li><?php } ?>
                    <li><a href = "basket.php" id = "basket-button">
                        <button class="btn btn-success">
                            <img id="basket-img" src="images/basket.png"> Basket (<?php echo count_basket();?>)
                        </button>
                    </a></li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>