<?php
    include("../../includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <main>
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tasks
                            </div>
                            <div class="card-body">
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
                                            $query = "SELECT * FROM tasks WHERE status = 'Not Started'";
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
    </main>

    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>