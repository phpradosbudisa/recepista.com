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

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', '_recepista');

//application address
define('DIR', 'localhost');
define('SITEEMAIL', 'something@someone.com');


//Mailchimp config
define('LIST_ID', '');
define('M_API', '');

try {

    //create PDO connection
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    //show error
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}

include('classes/phpmailer/mail.php');
