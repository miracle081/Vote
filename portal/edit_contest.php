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
                    <div class="card shadow m-5">
                        <h3 class="pt-4 ps-5">Edit Contest</h3>
                        <div class="m-2 rounded-4">
                            <table class="table table-danger table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                      <th scope="col">Contest Name</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Registration Price</th>
                                      <th scope="col">Contest Status</th>
                                      <th scope="col"><i class="fas fa-user-plus"></i></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM contest";
                                        $query = mysqli_query($connection,$sql); 
                                        while($row = mysqli_fetch_assoc($query)){ 
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['contest_name']; ?></th>
                                      <td><?php echo "₦".number_format($row['price'],2,'.',','); ?></td>
                                      <td><?php echo "₦".number_format($row['registration_price'],2,'.',','); ?></td>
                                      <th><?php echo $row['contest_status']; ?></th>
                                      <td>
                                          <a href="edit?q=<?php echo $row['id'] ?>" class="btn btn-outline-danger text-primary"><i class="fas fa-edit"></i> Edit</a>
                                          
                                          <a href="../assets/config/contest_control?delcon=<?php echo $row['id'] ?>&cname=<?php echo $row['contest_name']; ?>&price=<?php echo $row['price'] ?>&rprice=<?php echo $row['registration_price'] ?>" class="btn btn-danger">Delete</a>
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
