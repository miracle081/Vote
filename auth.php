<?php
  $title = 'About';
  require_once 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
  
?>

<body style="background-image: url(assets/img/6.jpg); background-size: cover; background-position: center;">
    <section>
        <div class="container">
            <div class="p-5 card shadow mb-5 mx-auto" id="card" style="margin-top: 20px; max-width: 600px;">
                <?php 
                    echo successMessage(); 
                    echo errorMessage();
                ?>
                <form action="assets/config/registration_control.php" method="POST">
                    <h3 class="log text-dark">SIGN UP</h3>
                    <div class="row ">
                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="fa fa-user mt-3" aria-hidden="true"></i>
                            <input required type="text" class="form-control ms-2" name="fname" id="floatingname"
                                placeholder="First name" aria-label="First name">
                            <label for="floatingname" class="ps-5" id="fifthy">First Name</label>
                        </div>
                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="fa fa-user mt-3" aria-hidden="true"></i>
                            <input required type="text" class="form-control ms-2" id="floatingname2"
                                placeholder="Last name" aria-label="Last name" name="lname">
                            <label for="floatingname2" class="ps-5" id="one">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div required class="col-md-6 mb-3 d-flex">
                            <i class="fas fa-male fs-4 pt-3"></i>
                            <i class="fas fa-female fs-4 pt-3"></i>
                            <select name="gender" class="form-floating form-control ms-2" required>
                                <option selected disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="far fa-envelope mt-4"></i>
                            <input required type="email" class="form-control ms-2" id="floatingInput"
                                placeholder="name@example.com" name="email">
                            <label for="floatingInput" class="ps-5" id="fourth">Email address</label>
                        </div><br>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="fas fa-globe mt-4"></i>
                            <input required type="text" class="form-control ms-2" id="floatingInput" placeholder="State"
                                name="state">
                            <label for="floatingInput" class="ps-5" id="fourth">State</label>
                        </div><br>
                        <div class="col-md-6 mb-3 d-flex">
                            <i class="fas fa-globe mt-4"></i>
                            <select name="zone" class="form-control ms-2" required>
                                <option selected disabled>Geopolitiacl Zone</option>
                                <option value="East">East</option>
                                <option value="West">West</option>
                                <option value="South">South</option>
                                <option value="North">North</option>
                            </select>
                        </div><br>
                    </div>

                    <div class="row">
                        <p class="ps-5">Password must be of 8 characters</p>
                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="fa fa-unlock-alt mt-4" aria-hidden="true"></i>
                            <input required type="password" class="form-control  ms-2" id="floatingPassword"
                                placeholder="Password" name="password">
                            <label for="floatingPassword " class="ps-5" id="fifthy">Password</label>
                        </div><br><br>

                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="fa fa-unlock-alt mt-4" aria-hidden="true"></i>
                            <input required type="password" class="form-control  ms-2" id="floatingPassword"
                                placeholder="Password" name="cpassword">
                            <label for="floatingPassword " class="ps-5" id="fifthy">Confirm Password</label>
                        </div><br><br>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 form-floating d-flex">
                            <i class="fas fa-phone mt-4"></i>
                            <input required type="tel" class="form-control ms-1 " id="floatingthings"
                                placeholder="phone" name="phone">
                            <label for="floatingthings" class="ps-5" id="phone">Phone. eg 08166811597</label>
                        </div> <br> <br>

                        <div class="col-md-6 mb-3 d-flex thirdrow">
                            <i class="fa fa-calendar mt-3" aria-hidden="true"></i>
                            <input required type="text" class="form-control ms-2" placeholder="Date Of Birth" id="age"
                                name="dob" onfocus="this.type = 'date'">
                        </div><br><br>
                    </div>

                    <div class="form-floating d-flex">
                        <i class="fa fa-map-marker mt-4" aria-hidden="true"></i>
                        <input required type="text" class="form-control ms-1" id="floatingPassword"
                            placeholder="Address" name="address">
                        <label for="floatingPassword " class="ps-4" id="sixty">Your Address</label>
                    </div><br><br>
                    <div class="text-center">
                        <button class="btn btn-primary mb-5" name="register" type="submit" id="btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include_once 'assets/includes/footer.php' ?>