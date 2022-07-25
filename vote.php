<?php
  $title = 'Contests';
  require 'assets/config/db-connect.php';
  require_once 'assets/includes/sessions.php';
  require_once 'assets/includes/headers.php';
  
?>

<body style="background-image: url(assets/img/bb.webp); background-size: cover; background-position: center;">
    <?php 
        echo successMessage(); 
        echo errorMessage(); 
    ?>
    <section class="container mb-5 mt-5">
        <div class="vote-user">
            <?php
                $sql = "SELECT * FROM contest WHERE contest_status = 'On-going'";
                $query = mysqli_query($connection,$sql);
                while($row= mysqli_fetch_assoc($query)){
                ?>
            <div class="card p-4 text-center prof shadow">
                <img src="assets/img/cpics/<?php echo $row['contest_pic'];?>" alt="profile_picture"
                    class="profile_picture shadow">
                <h4 class="pro-con mt-3">Contest Name: <?php echo $row['contest_name'];?></h4>
                <a href="view-contesters?cid=<?php echo $row['id'];?>" class="pro-vote">Start Voting</a>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include_once 'assets/includes/footer.php' ?>