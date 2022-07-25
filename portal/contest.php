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
    <?php
                    echo successMessage();
                    echo errorMessage();
                ?>
    <!-- Main Content goes here -->
    <main class="bg-light">
        <h2 class="mt-4 text-center text-primary fw-bold">NEW CONTEST</h2>
        <div class="card ms-5 p-2 shadow" style=" width: 1000px;">
            <?php
                          echo successMessage();
                          echo errorMessage();
                          if ($_SESSION['role'] == 'admin') {
                      ?>
            <form action="../assets/config/contest_control.php" method="post" enctype="multipart/form-data">
                <input required type="text" placeholder="contest Name" name="cname" class="form-control p-3 mb-3">
                <input required type="number" placeholder="Price" name="price" class="form-control p-3 mb-3">
                <input required type="number" placeholder="Registration Price" name="rprice"
                    class="form-control p-3 mb-3">
                <select required name="cstatus" class="form-control p-3 mb-3">
                    <option selected disabled>Contest Status</option>
                    <option>Available</option>
                    <option>On-going</option>
                    <option>Ended</option>
                </select>
                <p class="m-0 p-0 fw-bold text-warning"><i class="fas fa-upload"></i> Upload Contest Picture</p>
                <input required type="file" name="cpic" class="form-control p-3 mb-3">
                <button type="submit" name="createcontest" class="btn btn-primary">Create</button>
            </form>
            <?php } ?>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-center small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
            </div>
        </div>
    </footer>
</div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/scripts.js"></script>
</body>

</html>