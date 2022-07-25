<?php    
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    $id = $_SESSION['id'];
    date_default_timezone_set('Africa/Lagos');
    
    if (isset($_POST['createcontest'])) {
        // Collect Data
        $cName = $_POST['cname'];
        $Price= $_POST['price'];
        $regPrice= $_POST['rprice'];
        $cStatus = $_POST['cstatus'];
        $cpic = $_FILES['cpic'];
        $date = date('d-m-y h:i:s');

        $fileName = $cpic['name'];
        $fileTempName = $cpic['tmp_name'];
        $fileError = $cpic['error'];
        $fileSize = $cpic['size'];

        $allowedFiles = array('jpg','png','jpeg');

        $fileName = explode('.',$fileName);
        $fileName = end($fileName);
        $fileName = strtolower($fileName);

        if (in_array($fileName,$allowedFiles)) {
            if ($fileError < 1) {
                if ($fileSize < 4000000) {
                    //   Create a location to where file will be stored
                    $location = '../img/cpics/';
                    $fileNewName = 'picture'.rand(1000000,9999999).'.'.$fileName;
                    
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                        $sql = "INSERT INTO contest(contest_name,price,registration_price,contest_status,contest_pic,date_created) VALUES(?,?,?,?,?,?)";
                        $stmt = mysqli_stmt_init($connection);
                        mysqli_stmt_prepare($stmt,$sql);
                        mysqli_stmt_bind_param($stmt,'ssssss',$cName,$Price,$regPrice,$cStatus,$fileNewName,$date);
                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['successMessage'] = "Contest Created Successfull";
                            header('Location: ../../portal/contest');
                        }else{
                            $_SESSION['errorMessage'] = "Something went wrong";
                            header('Location: ../../portal/contest');
                        }
                    }else{
                        $_SESSION['errorMessage'] = "Something went Wrong, Please Try again";
                        header("Location: ../../portal/contest");
                    }
                }else{
                    $_SESSION['errorMessage'] = "File too large, maximum 1mb";
                    header("Location: ../../portal/contest");
            }  
            }else{
                $_SESSION['errorMessage'] = "File Error, Please Upload a new File";
                header("Location: ../../portal/contest");
            }
        }else{
            $_SESSION['errorMessage'] = "Please uploade either a jpg, png or jpeg file";
            header("Location: ../../portal/contest");
        }
    }

    // =================== CONTEST EDITING ================== //
    elseif (isset($_POST['editcontest'])) {
        $cName = $_POST['cname'];
        $id = $_POST['cid'];

        if (!empty($cName)) {
           $sql = "UPDATE contest SET contest_name = '$cName' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successMessage'] = "Update Successful";
            header("Location: ../../portal/edit?q=$id");
           }else{
            $_SESSION['errorMessage'] = "Something went wrong";
            header("Location: ../../portal/edit?q=$id");
           }
        }else{
            header('Location:../../portal/edit');
        }

        $Price = $_POST['price'];

        if (!empty($Price)) {
           $sql = "UPDATE contest SET price = '$Price' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successMessage'] = "Update Successful";
            header("Location: ../../portal/edit?q=$id");
           }else{
            $_SESSION['errorMessage'] = "Something went wrong";
            header("Location: ../../portal/edit?q=$id");
           }
        }else{
            header('Location:../../portal/edit');
        }

        $regPrice = $_POST['rprice'];

        if (!empty($regPrice)) {
           $sql = "UPDATE contest SET registration_price = '$regPrice' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successMessage'] = "Update Successful";
            header("Location: ../../portal/edit?q=$id");
           }else{
            $_SESSION['errorMessage'] = "Something went wrong";
            header("Location: ../../portal/edit?q=$id");
           }
        }else{
            header('Location:../../portal/edit');
        }

        $cStatus = $_POST['cstatus'];

        if (!empty($cStatus)) {
           $sql = "UPDATE contest SET contest_status = '$cStatus' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successMessage'] = "Update Successful";
            header("Location: ../../portal/edit?q=$id");
           }else{
            $_SESSION['errorMessage'] = "Something went wrong";
            header("Location: ../../portal/edit?q=$id");
           }
        }else{
            header("Location:../../portal/edit?q=$id");
        }

        
    }

    // ============= DELETE CONTEST ===============//

    elseif (isset($_GET['delcon'])) {
        $cid = $_GET['delcon'];
        $prce = $_GET['price'];
        $rprice = $_GET['rprice'];
        $sql = "DELETE FROM contest WHERE id = '$cid'";
        $query = mysqli_query($connection,$sql);
         if ($query) {
                $_SESSION['successMessage'] = "contest Deleted Successfully";
                header('Location: ../../portal/edit_contest');
         }else{
             $_SESSION['errorMessage'] = "Something went wrong";
             header('Location: ../../portal/edit_contest');
         }
    }
    // ================ APPROVE STATUS ================//
    elseif (isset($_GET['status'])) {
        $sid = $_GET['status'];
        
        $aStatus = "Approved";
        $sql = "UPDATE registered_contesters SET payment_status = '$aStatus' WHERE id = '$sid'";
        $query = mysqli_query($connection,$sql);
        if ($query) {
            $_SESSION['successMessage'] = "Registration Approved Successfully";
            header('Location: ../../portal/registered_contest');
        }else{
            $_SESSION['errorMessage'] = "Something went wrong";
           
            header('Location: ../../portal/registered_contest');
        }
    }
    // ================ DELETE REGISTRATION ================//
    elseif (isset($_GET['delreg'])) {
        $rid = $_GET['delreg'];
        $sql = "DELETE FROM registered_contesters WHERE id = '$rid'";
        $query = mysqli_query($connection,$sql);
         if ($query) {
                $_SESSION['successMessage'] = "Registration Deleted Successfully";
                header('Location: ../../portal/registered_contest');
         }else{
             $_SESSION['errorMessage'] = "Something went wrong";
             header('Location: ../../portal/registered_contest');
         }
    }

    else {
        $_SESSION['errorMessage'] = "Something went wrong";
        header('Location: ../../index');
    }