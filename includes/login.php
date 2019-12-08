<?php include "db.php"; ?>
<?php session_start(); ?>
<?php  include "../admin/functions.php"; ?>

<?php

if(isset($_POST['login'])) {

login( $_POST['username'],$_POST['password']);


}

?>
