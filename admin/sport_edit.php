<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sports edit profile </h6>
  </div>

<div class="card-body">
        <?php
        	$connection=mysqli_connect("localhost","root","","adminpanel");
            if(isset($_POST['sport_edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM sports WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                    placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Sports</label>
                                <input type="text" name="edit_sports" value="<?php echo $row['sports'] ?>"
                                    class="form-control" placeholder="Enter Sports">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input type="text" name="edit_gender" value="<?php echo $row['gender'] ?>"
                                    class="form-control" placeholder="Enter Gender">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="edit_mobile" value="<?php echo $row['mobile'] ?>"
                                    class="form-control" placeholder="Enter Mobile no">
                            </div>

                            <a href="sport_register.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="sport_updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>