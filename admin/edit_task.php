<?php
    include('../includes/connection.php');

    if(isset($_POST['edit_task'])){
        $desc = $_POST['description'];
        $user = $_POST['userid'];
        $startdate = $_POST['start_date'];
        $enddate = $_POST['end_date'];
        $id = $_POST['sendid'];
        
        $query = "UPDATE tasks SET uid='$user', description= '$desc', start_date= '$startdate', end_date= '$enddate' WHERE tid = '$id'";

        $query_run = mysqli_query($connection, $query);

        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task Updated successfully...');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error.. Please try again.');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- jquery file -->
    <script src="../includes/jquery.min.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <!-- External css file -->
    <link href="../css/dashboard.css" rel="stylesheet" />
    <link href="../css/data_table_css.css" rel="stylesheet" />
    <script src="../js/fontawesome.js" crossorigin="anonymous"></script>

</head>

<body>
    <main>

        <div class="container">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Task</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Task</li>
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
                                <label for="exampleFormControlTextarea1" class="form-label">Select
                                    User:</label>
                                <select class="form-select form-select-sm" name="userid" required>
                                    <option selected>-Select-</option>
                                    <?php
                                        $query1 = "SELECT uid, name from users";
                                        $query_run1 = mysqli_query($connection, $query1);
                                        if(mysqli_num_rows($query_run1)){
                                            while($row1 = mysqli_fetch_assoc($query_run1)){
                                                ?>
                                    <option value="<?php echo $row1['uid']; ?>">
                                        <?php echo $row1['name']; ?>
                                    </option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">Description:</label>
                                <textarea class="form-control" id="description" rows="3" name="description"
                                    required><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">Start date:</label>
                                <input class="form-control" type="date" name="start_date"
                                    value="<?php echo $row['start_date']; ?>" required>
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">End date:</label>
                                <input class="form-control" type="date" name="end_date"
                                    value="<?php echo $row['end_date']; ?>" required>
                            </div>
                            <input type="submit" class="btn btn-info" name="edit_task" value="Update">
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
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="../js/toggle.js"></script>
    <script src="../js/datatable_script.js"></script>
</body>

</html>