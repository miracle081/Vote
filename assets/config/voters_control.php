<?php    
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    date_default_timezone_set('Africa/Lagos');
    
    if (isset($_POST['vote'])){

        $cid = $_SESSION['cid'];
        $contest_id = $_SESSION['contest_id'];
        $cName = $_SESSION['contest_name'];
        $fName = $_SESSION['fname'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        $no_vote = $_SESSION['no_vote'];
        $reciept = $_FILES['reciept'];
        $amount = $_POST['amount'];
        $ref = $_POST['ref'];
        $p_status = "Pending";
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
                    $fileNewName = 'reciept'.rand(1000000000,9999999999).'.'.$fileName;
                    
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                       $sql = "INSERT INTO voters(contester_id,contest_id,contest_name,full_name,email,phone,no_vote,reciept,amount,ref,payment_status,date_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                       $stmt = mysqli_stmt_init($connection);
                       mysqli_stmt_prepare($stmt,$sql);
                       mysqli_stmt_bind_param($stmt,"ssssssssssss", $cid,$contest_id,$cName,$fName,$email,$phone,$no_vote,$fileNewName,$amount,$ref,$p_status,$date);

                        //var_dump($stmt);
                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['successMessage'] = "vote Pending...";
                            session_destroy();
                            header("Location: ../../vote");
                        }else{
                            $_SESSION['errorMessage'] = "Something went wrong";
                            header("Location: vote_summary");
                        }
                    }else{
                        $_SESSION['errorMessage'] = "Something went Wrong";
                        header("Location: vote_summary");
                    }
                }else{
                $_SESSION['errorMessage'] = "File too large, maximum 1mb";
                header("Location: vote_summary");
            }  
            }else{
                $_SESSION['errorMessage'] = "File Error, Please Upload a new File";
                header("Location: vote_summary");
            }
        }else{
            $_SESSION['errorMessage'] = "Please uploade either a jpg, png or jpeg file";
            header("Location: vote_summary");
        }
        

    }else{
        $_SESSION['errorMessage'] = "Please vote";
        header("Location: vote");
    }