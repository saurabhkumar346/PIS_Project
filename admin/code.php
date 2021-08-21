<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $role=$_POST['role'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password,role) VALUES ('$username','$email','$password','$role')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}



if(isset($_POST['updatebtn'])) //for update button
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $role = $_POST['edit_role'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' ,role='$role' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}



if(isset($_POST['delete_btn']))   //for delete the records
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}




//for sports Activity

if(isset($_POST['sport_registerbtn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sports = $_POST['sports'];
    $gender = $_POST['gender'];
    $mobile=$_POST['mobile'];

    $email_query = "SELECT * FROM sports WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: sport_register.php');  
    }
    else
    {
        
            $query = "INSERT INTO sports (name,email,sports,gender,mobile) VALUES ('$name','$email','$sports','$gender','$mobile')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: sport_register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: sport_register.php');  
            }
       
    }

}

if(isset($_POST['sport_updatebtn'])) //for update button
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $sports = $_POST['edit_sports'];
    $gender = $_POST['edit_gender'];
    $mobile=$_POST['edit_mobile'];

    $query = "UPDATE sports SET name='$name', email='$email', sports='$sports' ,gender='$gender', mobile='$mobile' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: sport_register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: sport_register.php'); 
    }
}


if(isset($_POST['sport_delete_btn']))   //for delete the records
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM sports WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: sport_register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: sport_register.php'); 
    }    
}




//for Cultural Activity



if(isset($_POST['cult_registerbtn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];
    $gender = $_POST['gender'];
    $mobile=$_POST['mobile'];

    $email_query = "SELECT * FROM cult WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: cult_register.php');  
    }
    else
    {
        
            $query = "INSERT INTO cult (name,email,program,gender,mobile) VALUES ('$name','$email','$program','$gender','$mobile')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: cult_register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: cult_register.php');  
            }
       
    }

}

if(isset($_POST['cult_updatebtn'])) //for update button
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $program = $_POST['edit_program'];
    $gender = $_POST['edit_gender'];
    $mobile=$_POST['edit_mobile'];

    $query = "UPDATE cult SET name='$name', email='$email', program='$program' ,gender='$gender', mobile='$mobile' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: cult_register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: cult_register.php'); 
    }
}


if(isset($_POST['cult_delete_btn']))   //for delete the records
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM cult WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: cult_register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: cult_register.php'); 
    }    
}






//for coding and Programming Activity

if(isset($_POST['coding_registerbtn']))
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
        header('Location: coding_register.php');  
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
                header('Location: coding_register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: coding_register.php');  
            }
       
    }

}

if(isset($_POST['coding_updatebtn'])) //for update button
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $program = $_POST['edit_program'];
    $gender = $_POST['edit_gender'];
    $mobile=$_POST['edit_mobile'];

    $query = "UPDATE coding SET name='$name', email='$email', program='$program' ,gender='$gender', mobile='$mobile' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: coding_register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: coding_register.php'); 
    }
}


if(isset($_POST['coding_delete_btn']))   //for delete the records
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM coding WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: coding_register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: coding_register.php'); 
    }    
}


