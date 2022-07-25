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
                    <div class="card shadow m-5">
                        <?php
                            echo successMessage();
                            echo errorMessage();
                        ?>
                        <h3 class="pt-4 ps-5">View Registered Contest</h3>
                        <div class="m-2 rounded-4">
                            <table class="table table-danger table-striped table-hover">
                                <thead>
                                    <tr>
                                      <th scope="col">Full Name</th>
                                      <th scope="col">Contest Name</th>
                                      <th scope="col">Registration Price</th>
                                      <th scope="col">Contest Status</th>
                                      <th scope="col">Date</th>
                                      <th scope="col" class="text-center pe-5"><i class="fas fa-edit"></i></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        $sql = "SELECT * FROM registered_contesters ORDER BY id DESC LIMIT 0,50";
                                        $query = mysqli_query($connection,$sql); 
                                        while($row = mysqli_fetch_assoc($query)){ 
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['first_name']?> <?php echo $row['last_name']; ?></th>

                                      <td scope="row"><?php echo $row['contest_name']; ?></td>

                                      <td><?php echo "₦".number_format($row['registration_price'],2,'.',','); ?></td>

                                      <td><?php echo $row['payment_status']; ?></td>

                                      <td><?php echo $row['date_created']; ?></td>

                                      <td>
                                          <a href="../assets/img/reciepts/<?php echo $row['reciept'] ?>"class="btn btn-primary btn-sm">View Reciept</a>
                                          <?php if ($row['payment_status'] == "Pending") { ?>
                                                <a href="../assets/config/contest_control?status=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Approve</a>
                                            <?php }else { ?>
                                                <i class="fas fa-check-circle text-success fs-3 mx-2"></i>
                                            <?php } ?>
                                          <a href="../assets/config/contest_control?delreg=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                      <?php } ?>
                                  </tbody>
                            </table>
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
