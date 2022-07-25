<?php
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    $id = $_SESSION['id'];

    if (!isset($_POST['updatePassword'])) {
        $_SESSION['errorMessage'] = "Please Log in or create an Account";
        header('Location: ../../login');
    }else{
        
        // $sql = "SELECT * FROM contest";
        // $query = mysqli_query($connection,$sql); 
        // $row = mysqli_fetch_assoc($query);

        $password = $_POST['password'];
        $confirm = $_POST['cpassword'];

        if(strlen($password) < 8){
            $_SESSION['errorMessage'] = "Password must be greater than 8 characters ";
            header('Location: ../../portal/reset_password');
        }
        // Confirm passsword
        elseif($password != $confirm){
            $_SESSION['errorMessage'] = "Passwords do not match in confirm password";
            header('Location: ../../portal/reset_password');
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET user_password ='$password' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if ($query) {
                $_SESSION['successMessage'] = "pasword Changed Successfull";
                header('Location: ../../portal/reset_password');
            }else{
                $_SESSION['errorMessage'] = "Something went wrong";
                header('Location: ../../portal/reset_password');
            }
        }
    }