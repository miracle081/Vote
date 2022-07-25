
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
                    <?php
                        $rp = $_GET['rp'];
                        $sql = "SELECT * FROM registered_contesters WHERE id = '$rp'";
                        $query = mysqli_query($connection,$sql); 
                        $row = mysqli_fetch_assoc($query); 
                    ?>
                  <h2 class="mt-4 text-center text-primary fw-bold">Reciept</h2>
                  <div class="card ms-5 p-3 shadow mx-auto">
                      <img src="../assets/img/reciepts/<?php
                        $img = $row['reciept'];
                        if (!empty($img)) {
                            echo "$img";
                        }
                        ?>" alt="reciept" class="rounded" width="700">
                    </div>
                    <a href="registered_contest" class="btn btn-primary px-5 my-4 ms-5 rounded-pill"><i class="fas fa-back"></i>Back</a>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="">Copyright &copy; Your Website 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
