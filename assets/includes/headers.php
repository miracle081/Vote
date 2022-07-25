<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="../img/eae">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/fonts/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>

  <!-- ================== NAVBAR ================== -->
  <nav class="py-3 navbar navbar-expand-lg navbar-dark">
    <div class="d-flex container">
      <a class="navbar-brand d-flex items" href="index">
          <img src="assets/img/logo.webp" class="shadow shadow-light" alt="logo" style="border-radius: 10px; width: 60px;">
          <h5 class="ps-2 pt-1 text-light" id="tittle">led</h5>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="items nav-link active" aria-current="page" href="index">Home<i class="fas fa-home ps-1"></i></a>
          </li>
          <li class="nav-item">
            <a class="items nav-link active" aria-current="page" href="about">About<i class="fas fa-info ps-2 "></i></a>
          </li>
          <li class="nav-item">
              <a class="items nav-link active" aria-current="page" href="contact_us">contact us<i class="fas fa-phone ps-1"></i></a>
          </li>
          <li class="nav-item">
            <a class="items nav-link active" aria-current="page" href="vote">vote<i class="fas fa-check ps-1"></i></a>
          </li>
          </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" id="btn" aria-current="page" href="auth"><i class="fa fa-user-plus pe-2"></i>Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="btn" aria-current="page" href="login"><i class="fas fa-sign pe-2"></i>login</a>
        </li>
      </ul>
  </div>
</nav>