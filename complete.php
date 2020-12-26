<?php

require("config/Db.class.php");


// Creates the instance
$db = new Db();

header("Access-Control-Allow-Headers: *");

$data = json_decode(file_get_contents("php://input"), TRUE);


foreach($data as $arr) {
    $item = $arr['item'];
    $amount = $arr['amount'];
}

?>