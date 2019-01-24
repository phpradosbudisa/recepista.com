<?php require('config.php');

//if logged in redirect to members page
if ($user->is_logged_in()) {
    header('Location: dash.php');
}

//if form has been submitted process it
if (isset($_POST['submit'])) {

    //very basic validation
    if (strlen($_POST['username']) < 3) {
        $error[] = 'Username is too short.';
    } else {
        $stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
        $stmt->execute(array(':username' => $_POST['username']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($row['username'])) {
            $error[] = 'Username provided is already in use.';
        }

    }

    if (strlen($_POST['password']) < 3) {
        $error[] = 'Password is too short.';
    }


    if (strlen($_POST['passwordConfirm']) < 3) {
        $error[] = 'Confirm password is too short.';
    }

    if ($_POST['password'] != $_POST['passwordConfirm']) {
        $error[] = 'Passwords do not match.';
    }

    //email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address';
    } else {
        $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $type = $row['type'];

        if (!empty($row['email'])) {
            $error[] = 'Email provided is already in use.';
        }

    }


    //if no errors have been created carry on
    if (!isset($error)) {

        //hash the password
        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

        //create the activasion code
        $activasion = md5(uniqid(rand(), true));

        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO members (state,name,lastname,position,username,password,email,active) VALUES (:state, :name, :lastname, :position, :username, :password, :email, :active)');
            $stmt->execute(array(
                ':name' => $_POST['name'],
                ':lastname' => $_POST['lastname'],
                ':position' => $_POST['position'],
                ':username' => $_POST['username'],
                ':password' => $hashedpassword,
                ':email' => $_POST['email'],
                ':state' => $_POST['state'],
                ':active' => $activasion
            ));
            $id = $db->lastInsertId();

            //send email
            $to = $_POST['email'];
            $subject = "Registration Confirmation";
            $body = "<p>Thank you for registering at Ladus site.</p>
			<p>To activate your account, please click on this link: <a href='http://recepista.com/dash/php/activate.php?x=$id&y=$activasion'>Activation</a></p>
			<p>Regards Ladus Tech Team</p>";

            $mail = new Mail();
            $mail->setFrom(SITEEMAIL);
            $mail->addAddress($to);
            $mail->subject($subject);
            $mail->body($body);
            $mail->send();

            //redirect to index page
            header('Location: http://recepist.ladus.website/dash/index.php?action=joined');
            exit;

            //else catch the exception and show the error.
        } catch (PDOException $e) {
            $error[] = $e->getMessage();
        }

    }

}

//define page title
$title = 'Sign up';

//include header template
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepist</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/Ladus-Nav-Bar.css">
    <link rel="stylesheet" href="assets/css/nav-logo-center-hamburger.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Shop-item.css">
    <link rel="stylesheet" href="assets/css/Shop-item.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131387393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-131387393-1');
    </script>
    <script id="mcjs">!function (c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
        }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/a0c234ec7924b4a412284f9a5/3c3cb6c36d45138826aec88a8.js");</script>
</head>

<div class="container" style="margin: 0 auto; display: flex; flex-direction: column; justify-content: center; align-content: center">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <form role="form" method="post" action="" autocomplete="off">
                <h4 style="text-align: center">Please fill out the form below.</h4>
                <?php
                //check for any errors
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<p class="bg-danger">' . $error . '</p>';
                    }
                }

                //if action is joined show sucess
                if (isset($_GET['action']) && $_GET['action'] == 'joined') {
                    echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
                }
                ?>

                <div class="form-group">
                    <label for="name">First name:</label>
                    <input type="text" name="name" id="name" class="form-control input-md" placeholder="First name"
                           value="" tabindex="2">
                </div>
                <div class="form-group">
                    <label for="lastname">Last name:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control input-md"
                           placeholder="Last name" value="" tabindex="2">
                </div>
                <div class="form-group">
                    <label for="username">Desired username:</label>
                    <input type="text" name="username" id="username" class="form-control input-md"
                           placeholder="User Name" value="<?php if (isset($error)) {
                        echo $_POST['username'];
                    } ?>" tabindex="1">
                </div>
                <div class="form-group">
                    <label for="email">Working email:</label>
                    <input type="email" name="email" id="email" class="form-control input-md"
                           placeholder="Email Address" value="<?php if (isset($error)) {
                        echo $_POST['email'];
                    } ?>" tabindex="2">
                </div>

                <div class="form-group">
                    <label for="position">Your job position:</label>
                    <input type="text" name="position" id="position" class="form-control input-md"
                           placeholder="Occupation" value="" tabindex="2">
                </div>

                <div class="form-group">
                    <label for="state">State:</label>
                    <input class="form-control input-default" list="state" name="state" placeholder="Pick a state">
                    <br>
                    <datalist id="state">
                        <option value="Bosnia and Hercegowina">Bosnia and Hercegowina</option>
                        <option value="Serbia">Serbia</option>
                    </datalist>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control input-md"
                                   placeholder="Password" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="password">Retype password:</label>
                            <input type="password" name="passwordConfirm" id="passwordConfirm"
                                   class="form-control input-md" placeholder="Confirm Password" tabindex="4">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register"
                                                          class="btn btn-primary btn-block btn-md" tabindex="5"></div>
                    <div class="col-xs-6 col-md-6">   <p>Already a member? <a href='index.php'>Login</a></p></div>



                </div>
            </form>
        </div>
    </div>

</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>