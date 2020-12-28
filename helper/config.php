<?php
/**
 * Created by IntelliJ IDEA.
 * User: psalm29
 * Date: 20/09/2017
 * Time: 9:01 PM
 */

class config {

       static $url = "https://olgreens.com/";


    public static function base() {

        if(self::production()) {
            return self::url();
        }else {
            $url = 'http://localhost/olgreens/';
            return $url;
        }
    }

    public static function production() {
        return false;
    }

    public static function email() {
        return "lilkenzy02@gmail.com";
    }

    public static function name() {
        return "Olgreens";
    }


    public static function description() {
        return "";
    }

    public static function address() {
        return "13/25 New Avenue<br>New Heaven, 45Y 73J<br>England, <strong>Great Britain</strong>";
    }

    public static function phone() {
        return "<strong>+33 555 444 333</strong>";
    }

    public static function url() {
        return self::$url;
    }

    public static function logo() {
        return 'assets/logo.png';
    }

    public static function favicon() {
        return 'assets/images/favicon.png';
    }

    public static function meta() {
        ?>
        <!-- Search Engine -->
        <meta name="description" content="<?php echo self::description(); ?>">
        <meta name="image" content="<?php echo self::base().self::logo(); ?>">
        <meta content="Kenneth Ekandem" name="author"/>

        <!-- Schema.org for Google -->
        <meta itemprop="name" content="<?php echo self::name(); ?>">
        <meta itemprop="description" content="<?php echo self::description(); ?>">
        <meta itemprop="image" content="<?php echo self::base().self::logo(); ?>">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?php echo self::name(); ?>">
        <meta name="twitter:description" content="<?php echo self::description(); ?>">

        <!-- Open Graph general (Facebook, Pinterest & Google+) -->
        <meta name="og:title" content="<?php echo self::name(); ?>">
        <meta name="og:description" content="<?php echo self::description(); ?>">
        <meta name="og:image" content="<?php echo self::base().self::logo(); ?>">
        <meta name="og:url" content="<?php echo self::base(); ?>">
        <meta name="og:site_name" content="<?php echo self::name(); ?>">
        <meta name="og:type" content="website">

        <?php
    }



}
