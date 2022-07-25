<?php
  $title = 'Voting';
  require_once 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
  
?>
<div class="hero">
    <video autoplay loop muted plays-inline>
        <source src="assets/img/galaxy.mp4" type="video/mp4">
    </video>

    <div class="content">
        <div class="box">
            <?php 
                    echo successMessage(); 
                    echo errorMessage();
                ?>
            <h1 class="log">Log in</h1>
            <form action="assets/config/login_control.php" method="post">
                <input type="email" name="email" class="inp form-control rounded-pill mb-4" placeholder="Email">
                <div class="mb-3">
                    <input type="Password" name="password" class="inp password form-control rounded-pill"
                        placeholder="Password" id="inp">
                    <i class="fas fa-eye p-2" id="show"></i>
                </div>
                <a class="fw-bold text-decoration-none " id="change" href="auth"
                    style="color: blue; text-decoration: underline; cursor: pointer;">Forgotten Password</a><br><br>
                <button type="submit" name="login"
                    class="btn btn-outline-light fw-bold mt-3 rounded-pill px-5">Login</button>

            </form>
        </div>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/login.js"></script>
<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php' ?>