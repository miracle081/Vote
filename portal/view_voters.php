<?php
    $title = "Dashboard | Vote";
    require_once '../assets/config/db-connect.php';

    require_once '../assets/includes/sessions.php';
    auth();
    $id =  $_SESSION['id'];
    $sql = "SELECT * FROM voters WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
    require_once '../assets/includes/portal_header.php';
?>


            <div id="layoutSidenav_content">
                <!-- Main Content goes here -->
                <main class="bg-light"  >
                    <div class="card mx-1 my-5">
                        <?php
                            echo successMessage();
                            echo errorMessage();
                        ?>
                        <h3 class="pt-4 ps-5">View Voters</h3>
                        <div class=" rounded-4">
                            <table class="table table-danger table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                      <th scope="col">Full Name</th>
                                      <th scope="col">Phone</th>
                                      <th scope="col">Contest Name</th>
                                      <th scope="col">N0. Vote</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Date</th>
                                      <th scope="col" class="text-center pe-5"><i class="fas fa-edit"></i></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        $sql = "SELECT * FROM voters ORDER BY id DESC LIMIT 0,50";
                                        $query = mysqli_query($connection,$sql); 
                                        while($row = mysqli_fetch_assoc($query)){ 
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['full_name']?></th>

                                      <td scope="row"><?php echo $row['phone']?></td>

                                      <td scope="row"><?php echo $row['contest_name']; ?></td>

                                      <td scope="row"><?php echo $row['no_vote']; ?></td>

                                      <td><?php echo "₦".number_format($row['amount'],2,'.',','); ?></td>

                                      <td><?php echo $row['payment_status']; ?></td>

                                      <td><?php echo $row['date_created']; ?></td>

                                      <td>
                                          <a href="../assets/img/reciepts/<?php echo $row['reciept'] ?>"class="btn btn-primary btn-sm">View Reciept</a>

                                          <a href="view_voters?status=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Approve</a>
                                          
                                          <a href="view_voters?delreg=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                      <?php } 
                                            if (isset($_GET['status'])) {
                                                $sid = $_GET['status'];
                                                
                                                $aStatus = "Approved";
                                                $sql = "UPDATE voters SET payment_status = '$aStatus' WHERE id = '$sid'";
                                                $query = mysqli_query($connection,$sql);
                                                if ($query) {
                                                    $_SESSION['successMessage'] = "Vote Approved Successfully";
                                                    // header('Location: view_voters');
                                                }else{
                                                    $_SESSION['errorMessage'] = "Something went wrong";
                                                   
                                                    // header('Location: view_voters');
                                                }
                                            }
                                      
                                      ?>
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
        di
        <script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
