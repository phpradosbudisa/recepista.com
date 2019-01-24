<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 12/23/2018
 * Time: 12:05 AM
 */

ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'laduthci_laduthci');
define('DBPASS', 'draganaiogi1A');
define('DBNAME', 'laduthci_recepista');

//application address
define('DIR', 'localhost');
define('SITEEMAIL', 'i-ja-sam@recepista.ladus.website');

//Mailchimp config
define('LIST_ID', '39880a8c74');
define('M_API', '579eb5d86f4c5ba6ed02241be00e2a93-us7');

try {

    //create PDO connection
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    //show error
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}

include('phpmailer/mail.php');


//include the user class, pass in the database connection
include('user.php');
$user = new User($db);


?>

<style>
    *,body,html{
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }
</style>
