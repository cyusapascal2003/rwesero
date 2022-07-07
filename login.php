<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {

        //read from database
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "⛔️ Wrong email or password!";
    } else {
        echo "⛔️ Wrong email or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main id="main-area">

        <!-- Registration area -->
        <section id="register">
            <div class="row m-0">
                <div class="col-lg-4 offset-lg-4">
                    <div class="text-center pb-5">
                        <h1 class="login-title text-dark">Login</h1>
                        <p class="p1 m-0 text-warning">Log into your Rwesero ID</p>
                        <span class="text-dark">Don't have an account? <a href="register.php">Create one</a></span>
                    </div>

                    <div class="d-flex justify-content-center">
                        <form action="login.php" method="post" enctype="multipart/form-data" id="reg-form">
                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email*">
                                </div>
                            </div>

                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
                                </div>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="agreement" class="form-check-input" required>
                                <label for="agreement" class="form-check-label text-dark">I agree <a href="#">Terms &amp; Conditions</a> (*)</label>
                            </div>

                            <div class="submit-btn text-center my-5">
                                <button id="submit" type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- #Registration area -->



        <?php
        // footer.php
        include('footer.php');
        ?>