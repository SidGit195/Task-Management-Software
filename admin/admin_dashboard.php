<?php
    session_start();
    if(isset($_SESSION['email'])){
        include('../includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin dashboard</title>
    <!-- jquery file -->
    <script src="../includes/jquery.min.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <!-- External css file -->
    <link href="../css/dashboard.css" rel="stylesheet" />
    <link href="../css/data_table_css.css" rel="stylesheet" />
    <script src="../js/fontawesome.js" crossorigin="anonymous"></script>

    <!-- jQuery Code -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#manage_task").click(function () {
                $("#rightsidebar").load("manage_task.php");
            });
        });

        $(document).ready(function () {
            $("#create_task").click(function () {
                $("#rightsidebar").load("create_task.php");
            });
        });

        $(document).ready(function () {
            $("#view_leave").click(function () {
                $("#rightsidebar").load("view_leave.php");
            });
        });

        $(document).ready(function () {
            $("#completeCard").click(function () {
                $("#tableBody").load("cards/completeCard.php");
            });
        });

        $(document).ready(function () {
            $("#notStartedCard").click(function () {
                $("#tableBody").load("cards/notStartedCard.php");
            });
        });

        $(document).ready(function () {
            $("#approvedLeavesCard").click(function () {
                $("#tableBody").load("cards/approvedLeavesCard.php");
            });
        });
    </script>
</head>

<body class="sb-nav-fixed">
    <!-- Header code start here -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #f4acb7;" id="header">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Task Management</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars hamburger"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group d-none">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw whi"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!"><?php echo $_SESSION['name']; ?></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Header code ends here -->

    <div id="layoutSidenav">

        <div id="leftsidebar">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" id="create_task">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Create Task
                            </a>
                            <a class="nav-link" id="manage_task">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Manage Task
                            </a>
                            <a class="nav-link" id="view_leave">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Leave Applications
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
        </div>

        <div id="layoutSidenav_content">
            <div id="rightsidebar">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4 bg-primary">
                                    <div class="card-body">Approved leaves</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="approvedLeavesCard">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">In-Progress</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="admin_dashboard.php">View
                                            Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Complete</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="completeCard">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Not Started</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="notStartedCard">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4" id="tableBody">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tasks
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover table-striped" id="intb">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Task ID</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sno = 1;
                                            $query = "SELECT * FROM tasks WHERE status = 'In-Progress'";
                                            $query_run = mysqli_query($connection, $query);

                                            if(mysqli_num_rows($query_run)){
                                            while($row = mysqli_fetch_assoc($query_run)){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $sno; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['tid']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['description']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['start_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['end_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['status']; ?>
                                            </td>
                                            <td><a class="btn btn-outline-warning btn-sm"
                                                    href="edit_task.php?id=<?php echo $row['tid'];?>">Edit</a>
                                                <a class="btn btn-outline-danger btn-sm"
                                                    href="delete_task.php?id=<?php echo $row['tid'];?>">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                            $sno = $sno + 1;
                                            }
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
            <footer class="py-4 bg-light mt-5">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;<a class="fst-italic font-semibold" href="#">Task
                                Management</a> 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- External script files -->
    <script src="../js/toggle.js"></script>
    <script src="../js/datatable_script.js"></script>
    <script>
        let table = new DataTable('#intb');
    </script>
</body>

</html>

<?php
}
else{
    header('Location: admin_login.php');
}
?>