<?php
header("Access-Control-Allow-Headers: *");

$_POST = json_decode(array_keys($_POST), true);

return $_POST;

?>