<!DOCTYPE html>
<html lang="en">

<body>
<main>

            <div class="container">
            <div class="container-fluid px-4">
            <h1 class="mt-4">Apply Leave</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Apply Leave</li>
            </ol>
            <div>
                    <div class="subcontainer">
                        <form action="" method="POST">
                            <div class="my-3 mb-3">
                                <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                            </div>
                            <div class="mb-3 my-3">
                                <label class="form-label">Description:</label>
                                <textarea class="form-control" id="description" rows="3" name="message" placeholder="" required></textarea>
                            </div>
                            <input type="submit" class="btn btn-warning" name="submit_leave" value="Apply">
                        </form>
                    </div>
                </div>
            </div>
    </main>

</body>

</html>