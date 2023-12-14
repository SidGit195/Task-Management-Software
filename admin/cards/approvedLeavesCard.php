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
                            <table class="table table-bordered table-hover table-striped" id="vwl">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sno = 1;
                                        $query = "SELECT * FROM leaves WHERE status = 'Approved'";
                                        $query_run = mysqli_query($connection, $query);

                                        while($row = mysqli_fetch_assoc($query_run)){
                                    ?>
                                    <tr>
                                        <td>
                                        <?php echo $sno; ?>
                                        </td>
                                            <?php 
                                                $query1 = "select name from users where uid = $row[uid]";
                                                $query_run1 = mysqli_query($connection, $query1);

                                                while($row1 = mysqli_fetch_assoc($query_run1)){
                                                ?>
                                                <td><?php echo $row1['name']; ?></td>
                                                <?php
                                                }
                                            ?>
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
        let table = new DataTable('#myTable');
    </script>
</body>

</html>