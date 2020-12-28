<?php

class register {

    public static function add($name, $email, $location, $phone) {

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['location'] = $location;
        $_SESSION['phone'] = $phone;

        header("locaton:order");
    }
}