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
        <div class="m-2 mx-5">
            <h1 class="pt-4 ps-5 fw-bold text-center text-success" style="text-transform: uppercase;">
                <?php echo $_GET['cname']; ?></h1>
            <div class="m-2 ">
                <div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                            $contest_id = $_GET['cid'];
                            $sql = "SELECT * FROM registered_contesters WHERE contest_id = '$contest_id' AND payment_status = 'Approved' ORDER BY id DESC LIMIT 0,50";
                            $query = mysqli_query($connection,$sql); 
                            while($row = mysqli_fetch_assoc($query)){ 
                        ?>
                        <div class="col">
                            <div class="card">
                                <img src="../assets/img/profile_pic/<?php
                                    $uid = $row['userid'];
                                    $sqlp = "SELECT * FROM users WHERE id= '$uid'";
                                    $query2 = mysqli_query($connection,$sqlp);
                                    $rows = mysqli_fetch_assoc($query2);

                                    $img = $rows['prof_pic'];

                                    if (empty($img)) {
                                    echo "user.png";
                                    }else{
                                        echo "$img?".mt_rand();
                                    }
                                ?>" alt="profile_picture" class="" height="400px">
                                <div class="card-body bg-info">
                                    <h4 class="text-center"><?php echo $row['first_name']; ?>
                                        <?php echo $row['last_name']; ?></h4>
                                    <p>Total Votes:<strong> <?php 
                                        $cuid = $row['contest_id'];
                                        $uuid = $row['userid'];
                                        $tSql = "SELECT SUM(no_vote) AS noVote FROM voters WHERE contester_id = '$uuid' AND contest_id = '$cuid' AND payment_status = 'Approved'";
                                        $tQuery = mysqli_query($connection,$tSql);

                                            $count = mysqli_fetch_assoc($tQuery);
                                        if (empty($count['noVote'])) {
                                            echo 0;
                                        }else{
                                            echo $count['noVote'];
                                        }
                                    ?></strong></p>
                                    <p>Status:<strong> <?php echo $row['payment_status']; ?></strong></p>
                                    <p>Date: <strong><?php echo $row['date_created']; ?></strong></p>
                                </div>
                            </div> 
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
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