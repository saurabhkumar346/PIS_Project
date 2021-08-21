<?php
include('includes/header.php'); 
?>

<?php
$connection=mysqli_connect("localhost","root","","adminpanel");
$error='';
session_start();
if(isset($_POST['login_btn'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="select * from register where username='$username' and password='$password'";
  $res=mysqli_query($connection,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){
    $row=mysqli_fetch_assoc($res);
    $_SESSION['ROLE']=$row['role'];
    $_SESSION['IS_LOGIN']='yes';
    if($row['role']=='admin'){
      header('location:register.php');
      die();
    }if($row['role']=='student'){
      header('location:http://localhost/mywebsite/');
      die();
    }
    else
    {
      $error='role mismatched';
    }
  }else{
    $error='Please enter correct login details';
  }
}
?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
               
              </div>

                <form class="user"  method="POST">

                    <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <?php echo $error?>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>