<?php
    session_start();
    include('includes/connection.php');

    if(isset($_POST['userLogin'])){
        $query = "select * from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection, $query);

        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['uid'];
            } 
            echo "<script type='text/javascript'>
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Please enter correct detail.');
            window.location.href = 'user_login.php';
            </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>ETMS | User Login</title>
    <!-- jquery file -->
    <script src="includes/jquery.min.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <!-- External css file -->
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">User login!</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" autocomplete="off" required/>
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" autocomplete="off" required/>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <input type="submit" name="userLogin" value="Login" class="btn btn-primary w-100">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a class="text-decoration-none" href="register.php">Need an account? Register!</a>
                            </div>
                            <div class="small"><a class="text-decoration-none" href="index.php">Go To Home-Page!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>