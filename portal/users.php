<?php
$title = "Dashboard | Vote";
require_once '../assets/config/db-connect.php';

require_once '../assets/includes/sessions.php';
auth();
$id =  $_SESSION['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);
require_once '../assets/includes/portal_header.php';

?>
<div id="layoutSidenav_content">
    <!-- Main Content goes here -->
    <main class="bg-light">
        <div class="card p-4 m-5">
            <div class="d-flex justify-content-between">
                <h1 class="text-success pt-5 ps-4">Users</h1>
                <div class="card p-3 shadow mb-4 bg-light">
                    <h5><i class="fas text-primary fa-users"></i> Total users</h5>

                    <h5 class="text-center">
                        <?php
                        if (isset($_POST['searchBtn'])) {
                            $search = $_POST['search'];
                            $sql = "SELECT * FROM users WHERE first_name LIKE '%$search%' OR middle_name LIKE '%$search%' OR last_name LIKE '%$search%'";
                        } else {
                            $sql = "SELECT * FROM users WHERE user_role = 'user' OR first_name = 'Chris' ORDER BY id DESC LIMIT 0,50";
                        }
                        $query = mysqli_query($connection, $sql);
                        $message = "";
                        if (mysqli_num_rows($query) < 1) {
                            $message = "No User Found";
                        }
                        echo mysqli_num_rows($query);
                        ?>

                    </h5>
                </div>
            </div>

            <div class="">
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-center"><i class="fas fa-box"></i></th>
                            <th class="text-center"><i class="fas fa-trash"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr class="text-secondary">
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><i class="fas fa-user"></i> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td class="text-center">
                                    <a href="user-details?id=<?php echo $row['id']; ?>" class="text-success btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="user-details?id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php }
                        echo $message; ?>
                    </tbody>
                </table>
            </div>
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