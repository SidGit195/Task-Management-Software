<?php
    include('../includes/connection.php');
    
    if(isset($_POST['create_task'])){
        $query = "insert into tasks values(null, '$_POST[id]', '$_POST[description]', '$_POST[start_date]', '$_POST[end_date]', 'Not Started')";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task Created successfully...');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error... Please try again.');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<body>
<main>

            <div class="container">
            <div class="container-fluid px-4">
            <h1 class="mt-4">Create a New Task</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Create Task</li>
            </ol>
            <div>
                    <div class="subcontainer">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="my-3"><label for="exampleFormControlTextarea1" class="form-label">Select User:</label>
                                <select class="form-select form-select-sm" name="id" required>
                                    <option selected>-Select-</option>
                                    <?php
                                        include('../includes/connection.php');
                                        $query = "SELECT uid, name from users";
                                        $query_run = mysqli_query($connection, $query);
                                        if(mysqli_num_rows($query_run)){
                                            while($row = mysqli_fetch_assoc($query_run)){
                                                ?>
                                                <option value="<?php echo $row['uid']; ?>"> <?php echo $row['name']; ?> </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">Description:</label>
                                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Mention the task" required></textarea>
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">Start date:</label>
                                <input class="form-control" type="date" name="start_date" required>
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">End date:</label>
                                <input class="form-control" type="date" name="end_date" required>
                            </div>
                            <input type="submit" class="btn btn-warning" name="create_task" value="Create">
                        </form>
                    </div>
                </div>
            </div>
    </main>

</body>

</html>