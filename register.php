<?php
    include('includes/connection.php');

    if(isset($_POST['userRegistration'])){
        $query = "insert into users values(null, '$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[mobile]')";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            echo "<script type='text/javascript'>
            alert('User registered successfully...');
            window.location.href = 'index.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error.. Please try again..');
            window.location.href = 'register.php';
            </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>ETMS | User Registration</title>
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
                            <h3 class="text-center font-weight-light my-4">User Registration</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" name="name" placeholder="name@example.com" required autocomplete="off"/>
                                    <label for="inputEmail">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" autocomplete="off" required/>
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" name="mobile" placeholder="name@example.com" autocomplete="off" required/>
                                    <label for="inputEmail">Mobile Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" autocomplete="off" required/>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <input type="submit" name="userRegistration" value="Register" class="btn btn-primary w-100">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a class="text-decoration-none" href="index.php">Go to Home-Page!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>