<?php
    session_start();
    if(isset($_SESSION['email'])){
    include('includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<body>
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All assigned tasks</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Task</li>
            </ol>
            <div>
                <table class="table table-bordered table-hover table-striped" id="myTable">
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
                        $query = "SELECT * FROM tasks WHERE uid ='$_SESSION[uid]'";
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
                            <td><a class="btn btn-outline-warning btn-sm" href="update_status.php?id=<?php echo $row['tid']; ?>">Update</a></td>
                        </tr>
                        <?php
                            $sno = $sno + 1;
                            }
                        ?>

                    </tbody>
                </table>
            </div>

    </main>

    <script>
        let table = new DataTable('#myTable');
    </script>

</body>

</html>

<?php
}
else{
    header('Location: user_login.php');
}
?>
