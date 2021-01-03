<?php
session_start();
ob_start();

$data = json_decode(file_get_contents("php://input"), TRUE);


// foreach($data as $arr) {
//     $item = $arr['item'];
//     $amount = $arr['amount'];

    
// }

spl_autoload_register( function($class) {

    if (file_exists("controllers/{$class}.php")) {
        require_once "controllers/{$class}.php";
    } elseif (file_exists("helper/{$class}.php")) {
        require_once "helper/{$class}.php";
    }

});

$from = $_SESSION['email'];
$sender = $_SESSION['name'];
$to = 'info@shopolgreens.com';
$subject = 'New Order';
$msg = $data;
$url = 'https://shopolgreens.com/assets/uploads/' . $_SESSION['receipt'];
$_SESSION['message'] = 'Order completed';

$sum = 0;
foreach($msg as $key=>$value){
  if(isset($value['amount']))
     $sum += $value['amount'];
}

$yr = date('Y');

        foreach($msg as $m) {
            
        }

        $message = '<!DOCTYPE HTML>
<html>

<style type="text/css">
    html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
    @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
        *[class="table_width_100"] {
            width: 96% !important;
        }
        *[class="border-right_mob"] {
            border-right: 1px solid #dddddd;
        }
        *[class="mob_100"] {
            width: 100% !important;
        }
        *[class="mob_center"] {
            text-align: center !important;
        }
        *[class="mob_center_bl"] {
            float: none !important;
            display: block !important;
            margin: 0px auto;
        }
        .iage_footer a {
            text-decoration: none;
            color: #929ca8;
        }
        img.mob_display_none {
            width: 0px !important;
            height: 0px !important;
            display: none !important;
        }
        img.mob_width_50 {
            width: 40% !important;
            height: auto !important;
        }
    }
    .table_width_100 {
        width: 680px;
    }
    a {
        color: #377dff;
    }
    .order_td {
        border: 1px solid #4b9c4e;
    }
</style>

<body style="padding: 0px; margin: 0px;">
<div id="mailsub" class="notification" align="center">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


                <!--[if gte mso 10]>
                <table width="680" border="0" cellspacing="0" cellpadding="0">
                    <tr><td>
                <![endif]-->

                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
                    <!--header -->
                    <tr><td align="center" bgcolor="#eff3f8">
                            <!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
                            <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="left"><!--

                        Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
                                            <table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="left" valign="middle">
                                                        <!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
                                                        <table width="115" border="0" cellspacing="0" cellpadding="0" >
                                                            <tr><td align="left" valign="top" class="mob_center">
                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                                                            <img src="https://shopolgreens.com/assets/logo.png" style="height: 70px !important" alt="Logo" border="0" style="display: block;" /></font></a>
                                                                </td></tr>
                                                        </table>
                                                    </td></tr>
                                            </table></div><!-- Item END--><!--[if gte mso 10]>
                          </td></tr>
                              </table>
                            </td></tr>
                          </table></div><!-- Item END--></td>
                                </tr>
                            </table>
                            <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                        </td></tr>
                    <!--header END-->

                    <!--content 1 -->
                    <tr><td bgcolor="#ffffff">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td>
                                        <!-- padding --><div style="height: 50px; line-height: 100px; font-size: 10px;">&nbsp;</div>

                                    </td></tr>
                                <tr><td">
                                        <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td>
                                            <div style="line-height: 24px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 16px;">
                                                            <div style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e; margin-padding: 50px; margin-bottom: 35px;">
                                                            <p><b>Name</b>: '.$_SESSION['name'].'</p>
                                                            <p><b>Email</b>: '.$_SESSION['email'].'</p>
                                                            <p><b>Phone</b>: '.$_SESSION['phone'].'</p>
                                                            <p><b>Location</b>: '.$_SESSION['location'].'</p><br>

                                                            <p>Below is the list of orders</p>
                                                            </div></font>
                                                    </div>
                                                    <table cellspacing=100" cellpadding="30" border="2">
                                                        <thead style="background-color: #4CAF50; color: #fff;">
                                                            <td class="order_td">No.</td>
                                                            <td class="order_td">Item</td>
                                                            <td class="order_td">Amount</td>
                                                        </thead>
                                                        <tbody>
                                                            ';
                                                                
                                                                foreach($msg as $key => $m) {
                                                                    $item = $m['item'];
                                                                    $amount = $m['amount'];

                                                                    $message .= '<tr>
                                                                    <td class="order_td">'.$key.'</td>
                                                                    <td class="order_td">'.$item.'</td>
                                                                    <td class="order_td">'.$amount.'</td>
                                                                    </tr>';
                                                                }

                                                                $message .= '
                                                                <tr style="background-color: #4CAF50; color: #fff;">
                                                            <td colspan="3">Order Total: ₦'.number_format($sum).'</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="line-height: 24px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 16px;">
                                                            <div style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e; margin-padding: 50px; margin-bottom: 35px;">
                                                                <br>
                                                            <p>Below is the link to the receipt</p>
                                                                <a href="'.$url.'">'.$url.'</a>
                                                            </div></font>
                                                    </div>
                                                </td></tr>
                                        </table>
                                        <!-- padding --><div style="height: 45px; line-height: 45px; font-size: 10px;">&nbsp;</div>
                                    </td></tr>
                            </table>
                        </td></tr>
                    <!--content 1 END-->


                    <!--footer -->
                    <tr><td class="iage_footer" align="center" bgcolor="#eff3f8">
                            <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">
                                        <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                          '.$yr.' &copy; <a href="http://shopolgreens.com" target="_blank" style="text-decoration: none; color: #377dff;">OLGREENS</a>. ALL Rights Reserved.
                        </span></font>
                                    </td></tr>
                            </table>

                            <!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;">&nbsp;</div>
                        </td></tr>
                    <!--footer END-->
                </table>
                <!--[if gte mso 10]>
                </td></tr>
                </table>
                <![endif]-->

            </td></tr>
    </table>

</div>
</body>

</html>';

                 $headers = "MIME-Version: 1.0" . "\r\n";
                 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                 // More headers
                 $headers .= 'From: '.$sender.' <'.$from.'>' . "\r\n";
                 $headers .= 'Reply-To: '.$sender.' <'.$from.'>' . "\r\n";
//                 ini_set('sendmail_from','lilkenzy02@gmail.com');
                 if (mail($to, $subject, $message, $headers)) {
                     unset($_SESSION['receipt']);
                     unset($_SESSION['name']);
                     unset($_SESSION['email']);
                     unset($_SESSION['phone']);
                     unset($_SESSION['location']);

                     header("Location:home");

                 }else {
                     return false;
                 }

// mail::send($from, $sender, $to, $subject, $msg);

?>