<?php
    include('includes/connection.php');

    if(isset($_POST['update'])){
        $status = $_POST['status'];
        $id = $_POST['sendid'];
        
        $query = "UPDATE tasks SET status = '$status' WHERE tid = '$id'";

        $query_run = mysqli_query($connection, $query);

        if($query_run){
            echo "<script type='text/javascript'>
            alert('Status Updated successfully...');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error.. Please try again.');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- jquery file -->
    <script src="includes/jquery.min.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <!-- External css file -->
    <link href="css/dashboard.css" rel="stylesheet" />
    <link href="css/data_table_css.css" rel="stylesheet" />
    <script src="js/fontawesome.js" crossorigin="anonymous"></script>

</head>

<body>
    <main>

        <div class="container">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Update Task</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Update Task</li>
                </ol>
                <div>
                    <div class="subcontainer">
                <?php 
                    $id = $_GET['id'];
                    $query = "SELECT * FROM tasks WHERE tid = ".$id."";

                    $query_run = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($query_run)){
                ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="mb-3 my-3">
                                <input type="hidden" name="sendid" class="form-control" value="<?php echo $_GET['id']; ?>" />
                            </div>
                            <div class="my-3 mb-3">
                                <select class="form-select form-select-sm" name="status" required>
                                    <option selected>-Select-</option>
                                    <option>In-Progress</option>
                                    <option>Complete</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-info" name="update" value="Update">
                            <a class="btn btn-danger" href="admin_dashboard.php">Cancel</a>
                        </form>
                <?php
                    }
                ?>
                    </div>
                </div>
            </div>
    </main>

    <!-- External script files -->
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/toggle.js"></script>
    <script src="js/datatable_script.js"></script>
</body>

</html>