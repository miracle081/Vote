<?php
    $title = "Reset Password  | Vote";
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
                <main>
                    <div class="card m-5 p-3 shadow">
                    <?php
                        echo successMessage();
                        echo errorMessage();
                    ?>
                        <form action="../assets/config/password_reset.php" method="POST">
                            <p class="ps-5">Password must be of 8 characters</p>
                            <div class="mb-3 form-floating d-flex">
                                <i class="fa fa-unlock-alt mt-4" aria-hidden="true"></i>
                                <input required type="password" class="form-control  ms-2" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword " class="ps-5" id="fifthy">Password</label>
                            </div>
                            
                            <div class="mb-3 form-floating d-flex">
                                <i class="fa fa-unlock-alt mt-4" aria-hidden="true"></i>
                                <input required type="password" class="form-control  ms-2" id="floatingPassword" placeholder="Password" name="cpassword">
                                <label for="floatingPassword " class="ps-5" id="fifthy">Confirm Password</label>
                            </div><br>
                            <div class="text-center">
                                <button class="btn btn-primary mb-5" name="updatePassword" type="submit" id="btn">Update</button>
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
