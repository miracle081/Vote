<?php
  $title = 'Voting';
  require_once 'assets/config/db-connect.php';
  require_once 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
  $uid = $_GET['uid'];

  if (isset($_POST['vote'])) {
    $_SESSION['cid'] = $_POST['cid'];
    $_SESSION['contest_id'] = $_POST['contest_id'];
    $_SESSION['contest_name'] = $_POST['contest_name'];
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['no_vote'] = $_POST['no_vote'];

    header("Location: vote_summary");

  }
  $sql = "SELECT * FROM users WHERE id = '$uid'";
  $query = mysqli_query($connection,$sql);
  $row = mysqli_fetch_assoc($query);
?>

<body style="background-image: url(assets/img/ba.webp); background-size: cover; background-position: center;">
    <section class="payment d-flex my-4 " style="justify-content: center;">
        <div class="card p-4 text-center prof shadow">
            <img src="assets/img/profile_pic/<?php
                        $img = $row['prof_pic'];
                        if (empty($img)) {
                           echo "user.png";
                        }else{
                            echo "$img?".mt_rand();
                        }
                    ?>" alt="profile_picture" class="profile_picture shadow">
            <h2 class="pro-name"><?php echo $row['first_name']. " ".$row['last_name']; ?></h2>
            <h5 class="pro-con">Contest Name: <?php echo $_GET['cname'];?></h5>
            <h5 class="pro-con">State: <?php echo $row['user_state'];?></h5>
            <h5 class="pro-con">Geopolitical zone: <?php echo $row['user_zone'];?></h5>
            <div class="pro-icon">
                <a href="#"><i class="fab fa-facebook icons"></i></a>
                <a href="#"><i class="fab fa-instagram icons"></i></a>
                <a href="#"><i class="fab fa-telegram icons"></i></a>
            </div>
        </div>
        <!-- ================ VOTING FORM ============== -->
        <div class="card p-4 text-center prof shadow">
            <form method="post">
                <h4 class="header mt-4">fill the form below to vote</h4>
                <input type="hidden" name="cid" value="<?php echo $uid;?>">
                <input type="hidden" name="contest_name" value="<?php echo $_GET['cname'];?>">
                <input type="hidden" name="contest_id" value="<?php echo $_GET['cid'];?>">
                <div class="mb-3 mt-4 form-floating d-flex">
                    <i class="fa fa-user mt-3" aria-hidden="true"></i>
                    <input required type="text" class="form-control ms-2" name="fname" id="floatingname"
                        placeholder="user_name" aria-label="First name">
                    <label for="floatingname" class="ps-5" id="fifthy">Full Name</label>
                </div>
                <div class="mb-3 form-floating d-flex">
                    <i class="far fa-envelope mt-4"></i>
                    <input required type="email" class="form-control ms-2" id="floatingInput"
                        placeholder="name@example.com" name="email">
                    <label for="floatingInput" class="ps-5" id="fourth">Email address</label>
                </div>
                <div class="mb-3 form-floating d-flex">
                    <i class="fas fa-phone mt-4"></i>
                    <input required type="tel" class="form-control ms-1 " id="floatingthings" placeholder="phone"
                        name="phone">
                    <label for="floatingthings" class="ps-5" id="phone">Phone. eg 08166811597</label>
                </div>
                <p>Choose number of vote below, each vote cost ₦50</p>
                <div class="mb-3 form-floating d-flex">
                    <i class="fas fa-check mt-4"></i>
                    <input required type="number" class="form-control ms-1 " id="floatingthings" placeholder="vote"
                        name="no_vote">
                    <label for="floatingthings" class="ps-5" id="phone">Nubers of vote</label>
                </div>
                <button name="vote" class="pro-vote">VOTE</button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include_once 'assets/includes/footer.php' ?>