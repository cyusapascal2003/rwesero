<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {

        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,firstName,lastName,email,password) values ('$user_id','$firstName','$lastName','$email','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "😖 Please enter valid information!";
    }
}
?>

<?php
// header.php
include('header.php');
?>

<!-- Registration area -->
<section id="register">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-4">
            <div class="text-center pb-5">
                <h1 class="login-title text-light">Register</h1>
                <p class="p1 m-0 text-warning">Create your Rwesero ID</p>
                <span class="text-light">Already have an account? <a href="login.php">Login</a></span>
            </div>

            <!-- Upload profile image -->

            <!-- <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="images/camera.png" alt="camera">
                    </div>
                    <img style="width: 200px; height: 200px" class="img rounded-circle" src="images/profile.png" alt="profile">
                    <small class="form-text text-light">Choose Image</small>
                    <input type="file" class="form-control-file" name="pp" id="upload-profile">
                </div>
            </div> -->

            <div class="d-flex justify-content-center">
                <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
                    <div class="row">
                        <div class="col">
                            <input type="text" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col">
                            <input type="text" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                        </div>
                    </div>

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

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required"" name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password*" onkeyup="validate_password()">
                            <span id="confirm_error"></span>
                        </div>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="agreement" class="form-check-input" required>
                        <label for="agreement" class="form-check-label text-light">I agree <a href="#">Terms &amp; Conditions</a> (*)</label>
                    </div>

                    <div class="submit-btn text-center my-5">
                        <button id="submit" type="submit" class="btn btn-warning rounded-pill text-light px-5" onclick="confirm_error()">Continue</button>
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