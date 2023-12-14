<?php
    include("../includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All leave Applications</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Leave Applications</li>
            </ol>
            <div>
                <table class="table table-bordered table-hover table-striped" id="vwl">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sno = 1;
                        $query = "SELECT * FROM leaves";
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
                            <td><a class="btn btn-outline-success btn-sm"
                                    href="approve_leave.php?id=<?php echo $row['lid'];?>">Approve</a> 
                                    <a class="btn btn-outline-danger btn-sm"
                                    href="reject_leave.php?id=<?php echo $row['lid'];?>">Reject</a></td>
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
        let table = new DataTable('#vwl');
    </script>
</body>

</html>