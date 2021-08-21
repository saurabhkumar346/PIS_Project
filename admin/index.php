<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
  header('location:login.php');
  die();
}
?>


<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='admin'){
  header('location:login.php');
  die();
}
?>

<div class="container-fluid">

  <div class="row">
   Welcome To Admin Page
  </div>
</div>
  <?php
include('includes/scripts.php');

?>