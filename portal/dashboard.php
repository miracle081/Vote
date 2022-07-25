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
        <div class="d-flex mt-5 justify-content-end">
            <div class="card shadow ps-3 pe-5 p-4 px-5 me-4 bg-info bg-gradient">
                <p class=""><i class="fas fa-user"> <?php echo $row['user_role']; ?></i></p>
                <h4 class="ms-5 ps-5 text-end"><?php echo $row['first_name']." ".$row['last_name']; ?></h4>
            </div>
            <div class="card shadow ps-3 pe-5 p-4 px-5 me-4 bg-warning bg-gradient">
                <p class=""><i class="fas fa-globe"> State</i></p>
                <h4 class="ms-5 ps-5  text-end"><?php echo $row['user_state']; ?></h4>
            </div>
            <div class="card shadow ps-3 pe-5 p-4 px-5 me-4 bg-success text-light bg-gradient">
                <p class=""><i class="fas fa-globe"> Geopolitiacl-Zone </i></p>
                <h4 class=" ms-5 ps-5 text-end"><?php echo $row['user_zone']; ?></h4>
            </div>
        </div>
        <div class="card m-5">
            <?php
                        echo successMessage();
                        echo errorMessage();
                        ?>
            <h3 class="pt-4 ps-5">Contest</h3>
            <div class="m-2 rounded-4">
                <table class="table table-danger table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Contest Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Registration Price</th>
                            <th scope="col">Contest Status</th>
                            <th scope="col" class="text-center">
                                <?php if($_SESSION['role'] !== 'admin'){ ?>
                                <i class="fas fa-recycle"></i>
                                <?php
                                    }else{ ?>
                                    Date Created
                                <?php } ?>
                            </th>
                            <?php if($_SESSION['role']  == 'admin'){ ?>
                                <th scope="col" class="text-center">
                                    <i class="fas fa-users"></i>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 0;
                            $sql = "SELECT * FROM contest";
                            $query = mysqli_query($connection,$sql); 
                            while($row = mysqli_fetch_assoc($query)){ 
                                $counter++;
                        ?>
                        <tr>
                            <th><?php echo $counter;?>.</th>
                            <th><?php echo $contest = $row['contest_name']; ?></th>
                            <td><?php echo "₦".number_format($row['price'],2,'.',','); ?></td>
                            <td><?php echo "₦".number_format($row['registration_price'],2,'.',','); ?></td>
                            <td><?php echo $row['contest_status']; ?></td>
                            <td class="text-center">
                                <?php
                                if($_SESSION['role'] !== 'admin'){ 
                                   
                                    if ($row['contest_status'] == 'On-going') { ?>
                                        <i class="f">On-going...</i>
                                        <?php
                                    }elseif($row['contest_status'] == 'Available'){

                                        $asql = "SELECT * FROM registered_contesters WHERE userid = '$id' AND contest_name = '$contest'";
                                        $aquery = mysqli_query($connection,$asql); 
                                        $row2 = mysqli_fetch_assoc($aquery);
                                        if ($row2 > 1) {
                                            if ($row2['payment_status'] == 'Approved') {?>
                                                <button class="btn btn-success btn-sm">Approved</button>
                                                <?php }
                                            else{ ?>
                                                <button class="btn btn-warning btn-sm">Pending...</button>
                                                <?php } }
                                        else{ ?>
                                            <a href="register?cid=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm px-3">Register</a>
                                        <?php }
                                    }else{ ?>
                                        <a href="contesters?cid=<?php echo $row['id']; ?> & cname=<?php echo $row['contest_name']; ?>" class="btn btn-primary btn-sm px-3"><i class="fas fa-eye"></i> View</a>
                                    <?php }

                                }else{
                                    echo $row['date_created'];
                                }
                                ?>
                            </td>
                            <?php if($_SESSION['role'] === 'admin'){ ?>
                                <td class="text-center">
                                    <a href="contesters?cid=<?php echo $row['id']; ?> & cname=<?php echo $row['contest_name']; ?>" class="btn btn-outline-primary rounded-pill">Contesters</a>
                                </td>
                                <?php } ?>
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