<?php
    session_start();
    if(isset($_SESSION['email'])){

    include("includes/connection.php");

    if(isset($_POST['submit_leave'])){
        $query = "insert into leaves values(null, '$_SESSION[uid]', '$_POST[subject]', '$_POST[message]', 'No Action')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Form submitted successfully...');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error... Please try again.');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User dashboard</title>
    <!-- jquery file -->
    <script src="includes/jquery.min.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <!-- External css file -->
    <link href="css/dashboard.css" rel="stylesheet" />
    <link href="css/data_table_css.css" rel="stylesheet" />
    <script src="js/fontawesome.js" crossorigin="anonymous"></script>
    
    <!-- jQuery Code -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#manage_task").click(function () {
                $("#rightsidebar").load("task.php");
            });
        });

        $(document).ready(function () {
            $("#apply_leave").click(function () {
                $("#rightsidebar").load("leaveForm.php");
            });
        });

        $(document).ready(function () {
            $("#leave_status").click(function () {
                $("#rightsidebar").load("leave_status.php");
            });
        });

        $(document).ready(function () {
            $("#compCard").click(function () {
                $("#tableContent").load("userCards/compCard.php");
            });
        });

        $(document).ready(function () {
            $("#notStartCard").click(function () {
                $("#tableContent").load("userCards/notStartCard.php");
            });
        });

        $(document).ready(function () {
            $("#leaveStatusCard").click(function () {
                $("#tableContent").load("userCards/leaveStatusCard.php");
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
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                            <a class="nav-link" href="user_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" id="manage_task">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Update Task
                            </a>
                            <a class="nav-link" id="apply_leave">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Apply leave
                            </a>
                            <a class="nav-link" id="leave_status">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Leave Status
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        User
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
                                    <div class="card-body">Leave Status</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="leaveStatusCard">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">In-Progress</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="user_dashboard.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Complete</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="compCard">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Not Started</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="notStartCard">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4" id="tableContent">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tasks
                            </div>
                            <div class="card-body">
                <table class="table table-bordered table-hover table-striped" id="inptb">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Task ID</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sno = 1;
                        $query = "SELECT * FROM tasks WHERE uid ='$_SESSION[uid]' AND status = 'In-Progress'";
                        $query_run = mysqli_query($connection, $query);

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
                        </tr>
                        <?php
                            $sno = $sno + 1;
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
                        <div class="text-muted">Copyright &copy;<a class="fst-italic font-semibold"
                                href="#">Task Management</a> 2023</div>
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
    <script src="js/toggle.js"></script>
    <script src="js/datatable_script.js"></script>
    <script>
        let table = new DataTable('#inptb');
    </script>


</body>

</html>

<?php
}
else{
    header('Location: user_login.php');
}
?>