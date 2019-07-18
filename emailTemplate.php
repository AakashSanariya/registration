<?php
/*For PHP Mailer Required File*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*Load Composer's autoloader*/
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
/*Server settings*/
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'crazydev82@gmail.com';
$mail->Password   = 'mitul123';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

//Recipients
$mail->setFrom('crazydev82@gmail.com', 'User Registration');
$mail->addAddress('akash.sanariya@brainvire.com', 'Akash Sanariya');

// Content
$mail->isHTML(true);
$mail->Subject = 'New Registration';
$mail->Body    = "
<html>
<head>
    <title>Registration Email</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
            *[class=\"table_width_100\"] {
                width: 96% !important;
            }
            *[class=\"border-right_mob\"] {
                border-right: 1px solid #dddddd;
            }
            *[class=\"mob_100\"] {
                width: 100% !important;
            }
            *[class=\"mob_center\"] {
                text-align: center !important;
            }
            *[class=\"mob_center_bl\"] {
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
    </style>
</head>
<body>

<div id=\"mailsub\" class=\"notification\" align=\"center\">
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"min-width: 320px;\">
        <tr>
            <td align=\"center\" bgcolor=\"#eff3f8\">
                <table border=\"0\">
                    <tr>
                        <td>
                            <table border=\"0\">
                                <tr>
                                    <td style=\"text-align: center;color: rebeccapurple\"><h2>User Registration</h2></td>
                                </tr>
                                <tr>
                                    <td align=\"center\" bgcolor=\"#fbfcfd\">
                                        <table  border=\"0\">
                                            <tr>
                                                <td>
                                                        Dear Candidate,<br/>
                                                        Welcome to User Registration!<br/>
                                                        We have created an account for you. Here are your details:<br/>
                                                        Name: $firstName  $lastName<br/>
                                                        Email: $email<br/>
                                                        Pincode: $pincode<br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align=\"center\">
                                                    <div style=\"line-height: 24px;\">
                                                        <button><a href=\"login.php\" target=\"_blank\" class=\"btn btn-danger block-center\">click</a></button>
                                                    </div>
                                                    <div style=\"height: 60px; line-height: 60px; font-size: 10px;\"></div>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";


$mail->send();
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>