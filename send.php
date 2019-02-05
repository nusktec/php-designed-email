<?php
/**
 * Created by PhpStorm.
 * User: NSC
 * Date: 2/5/2019
 * Time: 2:34 AM
 */
$_KEY = @$_REQUEST['key'];

$P_NAME = @ucfirst($_REQUEST['name']);
$P_BODY = @$_REQUEST['body'];
$P_TITLE = @$_REQUEST['title'];
$P_TO = @$_REQUEST['to'];

if ($_KEY == "druplay") {


    $dataHTML = "
<!DOCTYPE html>
<html>
  <body style=\"background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;\">
    <div style=\"max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;\">
      If you are unable to see this message, <a href=\"#\" style=\"color: #A5A5A5; text-decoration: underline;\">click here to view in browser</a>
    </div>
    <div style=\"max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);\">
      <table style=\"width: 100%;\">
        <tr>
          <td style=\"background-color: #fff;\">
            <img alt=\"\" src=\"http://spendify.info/api/assets/logo.png\" style=\"width: 70px; padding: 20px\">
          </td>
          <td style=\"padding-left: 50px; text-align: right; padding-right: 20px;\">
            <a href=\"http://spendify.info\" style=\"color: #261D1D; text-decoration: underline; font-size: 14px; letter-spacing: 1px;\">Sign In</a><a href=\"http://spendify.info\" style=\"color: #7C2121; text-decoration: underline; font-size: 14px; margin-left: 20px; letter-spacing: 1px;\">Create An Account</a>
          </td>
        </tr>
      </table><div style=\"padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);\">
        <h1 style=\"margin-top: 0px;\">
          Hi, " . @$P_NAME . "
        </h1>
        <div style=\"color: #636363; font-size: 14px; font-weight: 400\">
          " . @$P_BODY . "
        </div>
        <h4 style=\"margin-bottom: 10px;\">
          Questions?
        </h4>
        <div style=\"color: #A5A5A5; font-size: 12px;\">
          <p>
            If you have any questions you can simply reply to this email or find our contact information below. Also contact us at <a href=\"emailto:info@spendify.info\" style=\"text-decoration: underline; color: #4B72FA;\">info@spendify.info | info@spendify.ng</a>
          </p>
        </div>
      </div><div style=\"background-color: #F5F5F5; padding: 40px; text-align: center;\">
        <div style=\"margin-bottom: 20px;\">
          <a href=\"http://twitter.com/spendify_ng\" style=\"display: inline-block; margin: 0px 10px;\"><img alt=\"\" src=\"http://spendify.info/api/assets/social-icons/twitter.png\" style=\"width: 28px;\"></a><a href=\"http://facebook.com/spendify_ng\" style=\"display: inline-block; margin: 0px 10px;\"><img alt=\"\" src=\"http://spendify.info/api/assets/social-icons/facebook.png\" style=\"width: 28px;\"></a><a href=\"http://instagram.com/spendify_ng\" style=\"display: inline-block; margin: 0px 10px;\"><img alt=\"\" src=\"http://spendify.info/api/assets/social-icons/instagram.png\" style=\"width: 28px;\"></a>
        </div>
        <div style=\"margin-bottom: 20px;\">
          <a href=\"http://spendify.info\" style=\"text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;\">Contact Us</a><a href=\"http://spendify.info\" style=\"text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;\">Privacy Policy</a><a href=\"http://spendify.info\" style=\"text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;\">Delete account</a>
        </div>
        <div style=\"color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;\">
          You are receiving this email because you are using spendify
        </div>
        <div style=\"margin-bottom: 20px;\">
          <a href=\"#\" style=\"display: inline-block; margin: 0px 10px;\"><img alt=\"\" src=\"http://spendify.info/api/assets/market-google-play.png\" style=\"height: 33px;\"></a><a href=\"#\" style=\"display: inline-block; margin: 0px 10px;\"><img alt=\"\" src=\"http://spendify.info/api/assets/market-ios.png\" style=\"height: 33px;\"></a>
        </div>
        <div style=\"margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);\">
          <div style=\"color: #A5A5A5; font-size: 10px; margin-bottom: 5px;\">
            Abuja, Nigeria - Maitama
          </div>
          <div style=\"color: #A5A5A5; font-size: 10px;\">
            Copyright " . date('Y') . " Spendify. All rights reserved.
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
";

    //start sending message
    $to = $P_TO;

    $subject = $P_TITLE;

    $headers = "From: " . strip_tags('support@spendify.ng') . "\r\n";
    //$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = $dataHTML;


    mail($to, $subject, $message, $headers);

    error_reporting(0);
    header('Content-Type: application/json');
    echo json_encode(array(
        "status" => true, "message" => "sent successfully"
    ));
} else {
    error_reporting(0);
    header('Content-Type: application/json');
    echo json_encode(array(
        "status" => false, "message" => "Invalid token key"
    ));
}
