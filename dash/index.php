<?php
//include config
require_once 'php/config.php';

//check if already logged in move to home page
if ($user->is_logged_in()) {
    header('Location: php/recepti.php');
}

//process login form if submitted
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password)) {
        header('Location: php/recepti.php');
        exit;

    } else {
        $error[] = 'Wrong username or password or your account has not been activated.';
    }

} //end if submit

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ladus-front-end design</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables2.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div class="login-clean" style="height: 100vh;display: flex;flex-direction: column;justify-content: center">
    <form method="post" style="min-height: 60%;display: flex;flex-direction: column;justify-content: center">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><img class="img-fluid" src="../assets/img/1recepista.png"></div>
        <div class="form-group"><input class="form-control" type="username" name="username" placeholder="Username">
        </div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="Login"
                    style="background-color:rgb(251,93,126);">Log In
            </button>
        </div>
    </form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-animation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>

<?php
//check for any errors
if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="bg-danger">' . $error . '</p>';
    }
}
if (isset($_GET['action'])) {
    //check the action
    switch ($_GET['action']) {
        case 'active':
            echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
            break;
        case 'reset':
            echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
            break;
        case 'resetAccount':
            echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
            break;
    }
}
?>

