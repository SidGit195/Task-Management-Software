<?php
    session_start();
    if(isset($_SESSION['email'])){
    include("../includes/connection.php");
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
                        <table class="table table-bordered table-hover table-striped" id="cmtb">
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
                        $query = "SELECT * FROM tasks WHERE uid ='$_SESSION[uid]' AND status = 'Complete'";
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
    </main>

    <script>
        let table = new DataTable('#cmtb');
    </script>
</body>

</html>

<?php
}
else{
    header('Location: user_login.php');
}
?>