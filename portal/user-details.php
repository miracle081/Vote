<?php
    $title = "Profile | Vote";
    require_once '../assets/config/db-connect.php';

    require_once '../assets/includes/sessions.php';
    auth();
    $id =  $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
    if (!isset( $_GET['id'])) {
        header('Location: dashboard');
    }
    require_once '../assets/includes/portal_header.php';

    if (!isset( $_GET['id'])) {
        header('Location: dashboard');
    }else{
       $uid =  $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = '$uid'";
        $query = mysqli_query($connection,$sql);
        $row = mysqli_fetch_assoc($query);  
    }
   
?>


            <div id="layoutSidenav_content">
                <!-- Main Content goes here -->
                <main>
                    <div class="card m-5 p-3 shadow">
                    <?php
                        echo successMessage();
                        echo errorMessage();
                    ?>
                        <div class="p-4 me-4 px-5 mx-auto">
                            <div class="d-flex">
                                <img src="../assets/img/profile_pic/<?php
                                    $img = $row['prof_pic'];
                                    
                                    if (!empty($img)) {
                                        echo "$img?".mt_rand();
                                    }else{
                                        echo 'user.png';
                                    }
                                    ?>" alt="" width="170" height="200" class="rounded">
                                <form action="../assets/config/update_control.php" method="post" class="ms-3 pt-5"   enctype="multipart/form-data">
                                    <input type="file" name="img" id="button" class="form-contorl"><br>
                                    <button type="submit" name="updatePicture" class="btn btn-outline-primary mt-3 px-4">Upload</button>
                                </form>
                            </div>
                            <h4 class="mt-3"><?php echo $row['first_name']." ".$row['last_name'];?></h4>
                        </div>
                        <form action="../assets/config/update_control.php" method="POST">
                            <div class="row ">
                                <div class="col-md-6 mb-3 form-floating d-flex">
                                    <i class="fa fa-user mt-3" aria-hidden="true"></i>
                                    <input   type="text" class="form-control ms-2" name="fname" id="floatingname" placeholder="<?php echo $row['first_name']; ?>" aria-label="First name">
                                    <label for="floatingname" class="ps-5" id="fifthy"><?php echo $row['first_name']; ?></label>
                                </div>
                                <div class="col-md-6 mb-3 form-floating d-flex">
                                    <i class="fa fa-user mt-3" aria-hidden="true"></i>
                                    <input   type="text" class="form-control ms-2" id="floatingname2" placeholder="Last name" aria-label="Last name" name="lname">
                                    <label for="floatingname2" class="ps-5" id="one"><?php echo $row['last_name']; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div  class="col-md-6 mb-3 d-flex">
                                    <i class="fas fa-male fs-4 pt-3"></i>
                                    <i class="fas fa-female fs-4 pt-3"></i>
                                    <select name="gender" class="form-floating form-control ms-2" >
                                        <option selected disabled>Gender : <?php echo $row['gender']; ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3 d-flex">
                                    <i class="far fa-envelope mt-4"></i>
                                    <input   type="email" class="form-control ms-2 p-3 bg-white" id="floatingInput" placeholder="<?php echo $row['email']; ?>" name="email" readonly>
                                </div><br>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6 mb-3 form-floating d-flex">
                                    <i class="fas fa-globe mt-4"></i>
                                    <input   type="text" class="form-control ms-2" id="floatingInput" placeholder="State" name="state">
                                    <label for="floatingInput" class="ps-5" id="fourth">State</label>
                                </div><br>
                                <div class="col-md-6 mb-3 d-flex">
                                    <i class="fas fa-globe mt-4"></i>
                                    <select name="zone" class="form-control ms-2" >
                                        <option selected disabled>Geopolitiacl Zone : <?php echo $row['user_zone']; ?></option>
                                        <option value="East">East</option>
                                        <option value="West">West</option>
                                        <option value="South">South</option>
                                        <option value="North">North</option>
                                    </select>
                                </div><br>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3 form-floating d-flex">
                                    <i class="fas fa-phone mt-4"></i>
                                    <input  type="tel" class="form-control ms-1 " id="floatingthings" placeholder="phone" name="phone">
                                    <label for="floatingthings" class="ps-5" id="phone"><?php echo $row['phone']; ?></label>
                                </div> <br> <br>
                
                                <div class="col-md-6 mb-3 d-flex thirdrow">
                                    <i class="fa fa-calendar mt-3" aria-hidden="true"></i>
                                    <input  type="text" class="form-control ms-2" placeholder="<?php echo $row['dob']; ?>" id="age" name="dob" onfocus="this.type = 'date'"> 
                                </div><br><br>
                            </div>
        
                            <div class="form-floating d-flex">
                                <i class="fa fa-map-marker mt-4" aria-hidden="true"></i>
                                <input  type="text" class="form-control ms-1" id="floatingPassword" placeholder="Address" name="address">
                                <label for="floatingPassword " class="ps-4" id="sixty"><?php echo $row['user_address']; ?></label>
                            </div><br><br>
                            <div class="text-center">
                                <button class="btn btn-primary mb-5" name="updateProfile" type="submit" id="btn">Update</button>
                            </div>       
                        </form>
                    </div>
                </main>
                <!-- ========= MAIN END ======== -->

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
