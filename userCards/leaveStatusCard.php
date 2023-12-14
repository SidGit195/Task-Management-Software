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
                        <table class="table table-bordered table-hover table-striped" id="lstb">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sno = 1;
                        $query = "SELECT * FROM leaves WHERE uid ='$_SESSION[uid]'";
                        $query_run = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                        <tr>
                            <td>
                                <?php echo $sno; ?>
                            </td>
                            <td>
                                <?php echo $row['subject']; ?>
                            </td>
                            <td>
                                <?php echo $row['message']; ?>
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
        let table = new DataTable('#lstb');
    </script>
</body>

</html>

<?php
}
else{
    header('Location: user_login.php');
}
?>