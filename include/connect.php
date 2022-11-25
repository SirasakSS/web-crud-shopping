<?php

// prepare database connection variables
$db_host = 'localhost';
$db_name = 'store';
$db_user = 'root';
$db_pass = '';

// connect
try {
    // If you change db server system, change this too!
    $conn = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
    // echo "Connected to database";
}
catch (PDOException $e) {
    echo $e->getMessage();
}
function alert_msg($status, $msg)
{
    return json_encode(array(
        "status" => $status,
        "msg" => $msg,
    ), JSON_UNESCAPED_UNICODE);
}
function uniqidReal($lenght)
{
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

date_default_timezone_set("Asia/Bangkok");

