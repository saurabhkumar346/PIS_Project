<?php
session_start();
include('database/dbconfig.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}


if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];
    $gender = $_POST['gender'];
    $mobile=$_POST['mobile'];

    $email_query = "SELECT * FROM coding WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: coding.html');  
    }
    else
    {
            $query = "INSERT INTO coding (name,email,program,gender,mobile) VALUES ('$name','$email','$program','$gender','$mobile')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: coding.html');
            }
            else 
            {
                $_SESSION['status'] = "Details Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: coding.html');  
            }
        
        
    }
 }

?>