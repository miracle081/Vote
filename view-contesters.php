<?php
  $title = 'Vote';
  require 'assets/config/db-connect.php';
  require_once 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
  
?>

<body style="background-image: url(assets/img/bb.webp); background-size: cover; background-position: center;">
    <section class="container mb-5 mt-5">
        <div class="vote-user">
            <?php
                $cid = $_GET['cid'];
                $sql = "SELECT * FROM registered_contesters WHERE contest_id = '$cid' AND payment_status= 'Approved'";
                $query = mysqli_query($connection,$sql);
                while($row= mysqli_fetch_assoc($query)){
                    $uid = $row['userid'];
                    $sql = "SELECT * FROM users WHERE id= '$uid'";
                    $query2 = mysqli_query($connection,$sql);
                    $rows = mysqli_fetch_assoc($query2)

            ?>
            <div class="card p-4 text-center prof shadow">
                <img src="assets/img/profile_pic/<?php
                        $img = $rows['prof_pic'];

                        if (empty($img)) {
                           echo "user.png";
                        }else{
                            echo "$img?".mt_rand();
                        }
                    ?>" alt="profile_picture" class="profile_picture shadow">
                <h2 class="pro-name"><?php echo $row['first_name']. " ".$row['last_name']; ?></h2>
                <h5 class="pro-con">Contest Name: <?php echo $row['contest_name'];?></h5>
                <h5 class="pro-con">State: <?php echo $rows['user_state']; ?></h5>
                <div class="pro-icon">
                    <a href="#"><i class="fab fa-facebook icons"></i></a>
                    <a href="#"><i class="fab fa-instagram icons"></i></a>
                    <a href="#"><i class="fab fa-telegram icons"></i></a>
                </div>
                <a href="final_vote?uid=<?php echo $rows['id'] ?>& cname=<?php echo $row['contest_name']; ?>& cid=<?php echo $cid ?>"
                    class="pro-vote">VOTE</a>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include_once 'assets/includes/footer.php' ?>