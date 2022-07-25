<?php
  $title = 'Voting';
  require_once 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
  if (!isset($_SESSION['fname']) ||!isset($_SESSION['email']) || !isset($_SESSION['phone']) ||!isset($_SESSION['no_vote'])) {
      header('Location: vote');
  }
?>

<body style="background-image: url(assets/img/bb.webp); background-size: cover; background-position: center;">
    <?php 
            echo successMessage(); 
            echo errorMessage();
        ?>
    <section class="payment d-flex " style="margin: 40px 0; justify-content: center;">
        <div class="card p-4 text-center prof shadow" style="width: 500px;">
            <h4 class="header mt-4">Vote Summary</h4>
            <h4 class="text-nowrap">Name : <strong><?php echo $_SESSION['fname'] ?></strong></h4>
            <h4 class="text-nowrap">Email: <strong><?php echo $_SESSION['email'] ?></strong></h4>
            <h4 class="text-nowrap">Phone: <strong><?php echo $_SESSION['phone'] ?></strong></h4>
            <h4 class="text-nowrap">Number of votes : <strong><?php echo $_SESSION['no_vote'] ?></strong></h4>
            <h4 class="text-nowrap">Amount : <strong>₦<?php echo 50 * intval($_SESSION['no_vote']);?></strong></h4>
            <h4 class="text-nowrap">Ref:
                <strong><?php echo $ref = substr($_SESSION['email'], 0,4).rand(1000000,9999999).substr(strtolower($_SESSION['fname']),0,5); ?></strong>
            </h4>
            <div class="d-flex">
                <a href="#" class="pro-vote">Pay Online</a>
                <a id="off" class="pro-vote bg-primary">Pay Offline</a>
            </div>
        </div>
        <style>
        .line {
            line-height: 0;
        }
        </style>
        <div id="payment" class=" prof card p-4 shadow line">
            <div class="bg-info rounded-pill text-center" style="padding-top: 15px;">
                <p>Total amount to be paid</p>
                <h3>NGN <?php echo $amount = 50 * intval($_SESSION['no_vote']); ?></h3>
            </div>
            <div>
                <div class="pt-3 pb-2">
                    <p>Acount Number</p>
                    <h3>0342882483</h3>
                </div>
                <div class="pb-2">
                    <p>Bank: <b>GT bank</b></p>
                </div>
                <div>
                    <p>Bank Name: <b>LEGS VOTING</b></p>
                    <h5></h5>
                </div>
            </div>
            <form action="assets/config/voters_control.php" class="pt-4" method="post" enctype="multipart/form-data">
                <label class="pb-3 text-danger">Upload Your Reciept</label>
                <input type="file" name="reciept" class="form-control mb-3 p-3" required>
                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                <input type="hidden" name="ref" value="<?php echo $ref; ?>">

                <input type="submit" name="vote" value="Register" class="btn btn-outline-primary px-4 rounded-pill">
            </form>
        </div>
    </section>
    <script>
    const offline = document.querySelector("#off");
    const ok = document.querySelector("#ok");
    const payment = document.querySelector("#payment");

    offline.addEventListener('click', () => {
        payment.classList.toggle('d-none')
    })
    ok.addEventListener('click', () => {
        payment.classList.add('d-none')
    })
    </script>

    <!-- FOOTER -->
    <?php include_once 'assets/includes/footer.php' ?>