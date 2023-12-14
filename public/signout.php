<?php
    session_start();
    require '../lib/functions.php';
    require_once '../src/session.php';
    $session = new session();
    $session->killSession();
?>

<?php require 'layout/header.php';?>

<div class="container">

  <h3><br>You have successfully signed out.</h3><br>

</div>

<hr>

<?php require 'layout/footer.php'; ?>