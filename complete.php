<?php

require("config/Db.class.php");


// Creates the instance
$db = new Db();

spl_autoload_register( function($class) {

    if (file_exists("controllers/{$class}.php")) {
        require_once "controllers/{$class}.php";
    } elseif (file_exists("helper/{$class}.php")) {
        require_once "helper/{$class}.php";
    }

});

header("Access-Control-Allow-Headers: *");

$data = json_decode(file_get_contents("php://input"), TRUE);


// foreach($data as $arr) {
//     $item = $arr['item'];
//     $amount = $arr['amount'];

    
// }

$from = $_SESSION['email'];
$sender = $_SESSION['name'];
$to = config::email();
$subject = 'New Order';
$msg = $data;

mail::send($from, $sender, $to, $subject, $msg);

?>