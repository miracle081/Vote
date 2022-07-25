<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link href="../assets/css/styles2.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/fonts/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand
        py-4 navbar-dark bg-danger bg-gradient">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard">Voting Site</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="users" method="POST">
                <div class="input-group">
                    <?php if($_SESSION['role'] === 'admin') {?>
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name="search"/>
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit" name="searchBtn"><i class="fas fa-search"></i></button>
                    <?php } ?>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/img/profile_pic/<?php
                                $img = $row['prof_pic'];

                                if (!empty($img)) {
                                echo "$img?".mt_rand();
                                }else{
                                echo 'user.png';
                                }
                            ?>" alt="" height="40px" width="40px" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="reset_password"><i class="fas fa-lock"></i>Password Reset</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../assets/config/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-danger bg-gradient" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav pt-3">
                            <a class="nav-link text-light" href="dashboard">
                                <div class="sb-nav-link-icon"><i class="fas text-light fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link text-light" href="profile">
                                <div class="sb-nav-link-icon"><i class="fas text-light fa-id-card"></i></div>
                                Profile
                            </a>
                            <?php if($_SESSION['role'] === 'admin') {?>
                                <a class="nav-link text-light" href="users">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas text-light fa-users"></i>
                                    </div>
                                    Users
                                </a>
                                <a class="nav-link text-light" href="contest">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas text-light fa-map-marker-alt"></i>
                                    </div>
                                    Create New contest
                                </a>
                                <a class="nav-link text-light" href="edit_contest">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas text-light fa-edit"></i>
                                    </div>
                                    Edit contest
                                </a>
                                <a class="nav-link text-light" href="registered_contest">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas text-light fa-eye"></i>
                                    </div>
                                    View registers
                                </a>
                                <a class="nav-link text-light" href="view_voters">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas text-light fa-eye"></i>
                                    </div>
                                    View Voters
                                </a>
                            <?php } ?>
                            
                            <a class="nav-link text-light" href="reset_password">
                                <div class="sb-nav-link-icon"><i class="fas text-light fa-lock"></i></div>
                                Password Reset
                            </a>

                            <a class="nav-link text-light" href="../assets/config/logout.php">
                                <div class="sb-nav-link-icon"><i class="fas text-light fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <script>
                if ('animate__animated') {
                    setTimeout
                    document.querySelector('.animate__animated').classList.remove('')
                }
            </script>