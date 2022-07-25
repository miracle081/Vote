<?php    
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    $id = $_SESSION['id'];
    date_default_timezone_set('Africa/Lagos');
    
    if (isset($_POST['regContest'])){
        $cid = $_POST['cid'];
        $fName = $_POST['fname'];
        $lName = $_POST['lname'];
        $cName = $_POST['cname'];
        $rprice = $_POST['rprice'];
        $reciept = $_FILES['reciept'];
        $pStatus = "Pending";
        $date = date('d-m-y h:i:s');


        $fileName = $reciept['name'];
        $fileTempName = $reciept['tmp_name'];
        $fileError = $reciept['error'];
        $fileSize = $reciept['size'];

        $allowedFiles = array('jpg','png','jpeg');

        $fileName = explode('.',$fileName);
        $fileName = end($fileName);
        $fileName = strtolower($fileName);

        if (in_array($fileName,$allowedFiles)) {
            if ($fileError < 1) {
                if ($fileSize < 4000000) {
                    //   Create a location to where file will be stored
                    $location = '../img/reciepts/';
                    $fileNewName = 'reciept'.rand(1000000,9999999).'.'.$fileName;
                    
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                       $sql = "INSERT INTO registered_contesters(userid,contest_id,first_name,last_name,contest_name,registration_price,reciept,payment_status,date_created) VALUES(?,?,?,?,?,?,?,?,?)";
                       $stmt = mysqli_stmt_init($connection);
                       mysqli_stmt_prepare($stmt,$sql);
                       mysqli_stmt_bind_param($stmt,"sssssssss",$id,$cid,$fName,$lName,$cName,$rprice,$fileNewName,$pStatus,$date);
                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['successMessage'] = "Registration Pending... Yet to be Approved By the Admin";
                            header("Location: ../../portal/dashboard?cid");
                        }else{
                            $_SESSION['errorMessage'] = "Something went wrong Please Try again";
                            header("Location: ../../portal/dashboard?cid");
                        }
                    }else{
                        $_SESSION['errorMessage'] = "Something went Wrong, Please Try again";
                        header("Location: ../../portal/register?cid=$cid");
                    }
                }else{
                $_SESSION['errorMessage'] = "File too large, maximum 1mb";
                header("Location: ../../portal/register?cid=$cid");
            }  
            }else{
                $_SESSION['errorMessage'] = "File Error, Please Upload a new File";
                header("Location: ../../portal/register?cid=$cid");
            }
        }else{
            $_SESSION['errorMessage'] = "Please uploade either a jpg, png or jpeg file";
            header("Location: ../../portal/register?cid=$cid");
        }
        

    }else{
        $_SESSION['errorMessage'] = "Please Register";
        header("Location: ../../portal/register?cid=$cid");
    }

    // =================== APPROVED CONTESTERS ===================//