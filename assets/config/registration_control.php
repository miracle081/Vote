<?php
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    if (!isset($_POST['register'])) {
        $_SESSION['errormessage'] = "Please Log in or create an Account";
        header('Location: ../../auth');
    }
    else{
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $zone = $_POST['zone'];
        $password = $_POST['password'];
        $confirm = $_POST['cpassword'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $role = 'user';
        $date = date('Y-m-d');

        $sql = "SELECT email FROM users WHERE email = '$email'";
        $query = mysqli_query($connection,$sql);
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['errorMessage'] = "This email already exists";
            header('Location: ../../auth');
        }
        // Check the password length
        elseif(strlen($password) < 8){
            $_SESSION['errorMessage'] = "Password must be greater than 8 characters ";
            header('Location: ../../auth');
        }
        // Confirm passsword
        elseif($password != $confirm){
            $_SESSION['errorMessage'] = "Passwords do not match in confirm password";
            header('Location: ../../auth');
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(first_name,last_name,gender,email,user_state,user_zone,user_password,phone,dob,user_address,user_role,date_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            // Initialise Connection 
            $stmt = mysqli_stmt_init($connection);
            // Prepare Statement
            mysqli_stmt_prepare($stmt,$sql);
            // Bind Parameters
            mysqli_stmt_bind_param($stmt,'ssssssssssss',$firstName,$lastName,$gender,$email,$state,$zone,$password,$phone,$dob,$address,$role,$date);
            // Execute Statement
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['successMessage'] = "Registration Successfull";
                header('Location: ../../auth');
            }else{
                $_SESSION['errorMessage'] = "Something went wrong";
                header('Location: ../../auth');
            }
        }
        
    }