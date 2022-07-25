<?php
    $title = "Dashboard | Vote";
    require_once '../assets/config/db-connect.php';

    require_once '../assets/includes/sessions.php';
    auth();
    $id =  $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
    
    require_once '../assets/includes/portal_header.php';

?>


            <div id="layoutSidenav_content">
                <!-- Main Content goes here -->
                <main class="bg-light">
                   <div class="card shadow p-4 m-5">
                        <?php
                            echo successMessage();
                            echo errorMessage();

                            $q = $_GET['cid'];
                            $sql2 = "SELECT * FROM contest WHERE id = '$q'";
                            $query2 = mysqli_query($connection,$sql2);
                            $row2 = mysqli_fetch_assoc($query2);

                            $firstname = $row['first_name'];
                            $lastname = $row['last_name'];
                            $cName = $row2['contest_name'];
                            $regprice = $row2['registration_price'];
                            $status = "Pending";
                            $date = date('Y-m-d');
                            $reciept = "defualt.jpg";
                            $tref  = "vote".rand(100000,999999).$firstname;
                            
                            function insertToDatabse($connect,$id,$q,$firstname,$lastname,$cName,$regprice,$reciept,$status,$date){
                                $id = $_SESSION['id'];
                                $q = $_GET['cid'];
                                $sql = "INSERT INTO registered_contesters(userid,contest_id,first_name,last_name,contest_name,registration_price,reciept,payment_status,date_created) VALUES(?,?,?,?,?,?,?,?,?)";
                                $stmt = mysqli_stmt_init($connect);
                                mysqli_stmt_prepare($stmt,$sql);
                                mysqli_stmt_bind_param($stmt,"sssssssss",$id,$q,$firstname,$lastname,$cName,$regprice,$reciept,$status,$date);
                                mysqli_stmt_execute($stmt);
                            }
                            if (isset($_GET['status'])) {
                                if ($_GET['status'] == '325345dfyd63grubu3f73uhfun3he8fh22b83n1hfn8f2g7893n2gf2eg27rgd2nfib27grb3u8ir829hrn28hr289rjn27rg8322r') {
                                    insertToDatabse($connection,$id,$q,$firstname,$lastname,$cName,$regprice,$reciept,$status,$date); 
                                }else{
                                    $_SESSION['errorMessage'] = "Payment Failed";
                                }
                            }
                        ?>
                            <h3 class="text-center">Payment method</h3>
                        <div class="card p-5 m-4">
                            <h4 class="">Make a transfer</h4>
                            <div class="d-flex justify-content-around">
                           <div class="">
                                <div>
                                    <div class="mt-3">
                                        <p>Acount Number:</p>
                                        <h3>0342882483</h3>
                                    </div>
                                    <div class="mt-5">
                                        <p>Bank Name:</p>
                                        <h5>GT bank</h5>
                                    </div>
                                    <div class="mt-5">
                                        <p>Acount Name:</p>
                                        <h5>LEGS VOTING</h5>
                                    </div>
                                </div>
                           </div>
                           <div class="form">
                                <form action="../assets/config/contest_registration" method="post"   enctype="multipart/form-data">
                                    <input type="hidden" name="cid" value="<?php echo $q; ?>">
                                    <label>First Name:</label>
                                    <input   type="email" class="form-control mb-3 p-3" id="floatingInput" placeholder="First Name: <?php echo $row['first_name']; ?>" name="fname" value="<?php echo $row['first_name']; ?>" name="fname" readonly>
                                    
                                    <label>Last Name:</label>
                                    <input   type="email" class="form-control mb-3 p-3" id="floatingInput" placeholder="First Name: <?php echo $row['last_name']; ?>" name="lname" readonly name="fname" value="<?php echo $row['last_name']; ?>" name="fname">
                                    
                                    <label>Contest Name:</label>
                                    <input   type="email" class="form-control mb-3 p-3" id="floatingInput" name="cname" readonly name="fname" value="<?php echo $row2['contest_name']; ?>" name="fname">
                                    
                                    <label>Registration Price:</label>
                                    <input type="text" name="rprice" placeholder="Amount: <?php echo  "₦".number_format($row2['registration_price'],2,'.',','); ?>" class="form-control p-3 mb-3" readonly name="fname" value="<?php echo $row2['registration_price']; ?>" name="fname">
                                    
                                    <label>Upload Your Reciept:</label>
                                    <input type="file" name="reciept" placeholder="Upload Reciept*" class="form-control mb-3 p-3" required>

                                    <input type="submit" name="regContest" value="Register" class="btn btn-outline-primary px-4 rounded-pill">
                                </form>
                           </div>
                            </div>
                        </div>
                        
                        <p id="inserter"></p>
                        <div class="card p-5 m-3">
                            <!-- //// begins flutterwave payment code //// -->
                            <h4>Online Payment</h4>
                            <p>Pay online with your debit card</p>
                            <input type="submit" class="btn btn-success " style="cursor:pointer; width: 120px;" value="Pay Now" id="submitBtn" />
                            
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                <script type="text/javascript">
                                document.addEventListener("DOMContentLoaded", function(event) {
                                document.querySelector('#submitBtn').addEventListener('click', function () {
                                
                                    var flw_ref = "", chargeResponse = "", trxref = "FDKHGK"+ Math.random(), API_publicKey = "FLWPUBK_TEST-83af4504f6370dc6576a13be3875e79b-X";//Always change flutterwave public key to your own key
                                    
                                    //   ENTER ALL ESSENTIAL VARIABLES
                                    // var amount_ea = "50000";
                                    var amount_ea = <?php echo $regprice;?>;
                                    var email_ea = <?php echo (json_encode($row['email'])); ?>;
                                    var phone_ea = <?php echo (json_encode($row['phone'])); ?>;
                                    var ref_ea = <?php echo(json_encode($tref)); ?>;
                                
                                    
                                getpaidSetup(
                                    {
                                    PBFPubKey: API_publicKey,
                                    customer_email: email_ea,
                                    amount: amount_ea,
                                    customer_phone: phone_ea,
                                    currency: "NGN",
                                    txref: ref_ea,
                                    meta: [{metaname:"EA-NG", metavalue: "NG"}],
                                    onclose:function(response) {
                                    },
                                    callback:function(response) {
                                        txref = response.data.txRef, chargeResponse = response.data.chargeResponseCode;
                                        if (chargeResponse == "00" || chargeResponse == "0") {
                                        //   if payment failed
                                            window.location = "register?cid=<?php echo $_GET['cid'] ?>&status=false";
                                        } else {
                                            window.location = "register?cid=<?php echo $_GET['cid'] ?>&status=325345dfyd63grubu3f73uhfun3he8fh22b83n1hfn8f2g7893n2gf2eg27rgd2nfib27grb3u8ir829hrn28hr289rjn27rg8322r";
                                        }
                                    }
                                    }
                                );
                                });
                                });
                            </script>
                            <!-- END OF PAYMENT SCRIPT -->
                        </div>

                   </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="text-muted visually-hidden">Copyright &copy; Your Website 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
