
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
                  <h2 class="mt-4 text-center text-primary fw-bold">EDIT CONTEST</h2>
                  <div class="card ms-5 p-2 shadow" style=" width: 1000px;">
                      <?php
                          echo successMessage();
                          echo errorMessage();
                          $q = $_GET['q'];
                          $sql = "SELECT * FROM contest WHERE id = '$q'";
                          $query = mysqli_query($connection,$sql);
                          $row = mysqli_fetch_assoc($query);
                          if ($_SESSION['role'] === 'admin') {
                      ?>
                      <form action="../assets/config/contest_control.php" method="post">
                          <input type="hidden" name="cid" value="<?php echo $_GET['q']; ?>">

                          <input type="text" placeholder="Contest Name: <?php echo $row['contest_name']; ?>" name="cname" class="form-control p-3 mb-3">

                          <input type="number" placeholder="Price: <?php echo "₦".number_format($row['price'],2,'.',','); ?>" name="price" class="form-control p-3 mb-3">

                          <input type="number" placeholder="Registration Price: <?php echo "₦".number_format($row['registration_price'],2,'.',','); ?>" name="rprice" class="form-control p-3 mb-3">
                          
                          <select name="cstatus" class="form-control p-3 mb-3">
                              <option selected disabled>Contest Status: <?php echo $row['contest_status']; ?></option>
                              <option>Available</option>
                              <option>On-going</option>
                              <option>Ended</option>
                          </select>

                          <button type="submit" name="editcontest" class="btn px-5 btn-outline-primary rounded-pill">Update</button>
                      </form>
                      <?php } ?>
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
