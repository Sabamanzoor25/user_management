<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
function sendemail($to,$toname,$subject,$contents)
{
    
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    // require_once "vendor/autoload.php";
 
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "vworldneduet@gmail.com";
    $mail->Password   = "#ncbc@hpcc147";

    $mail->IsHTML(true);
    $mail->AddAddress($to, $toname);
    $mail->SetFrom("vworldneduet@gmail.com", "VWorld-Cloud");
    $mail->AddReplyTo("vworldneduet@gmail.com", "VWorld-Cloud");
    // $mail->AddCC("uzair2016@gmail.com", "uzair");  
    $mail->Subject = $subject;
    $content = $contents;

    //Attachment

    // if(!empty($filename))
    //    {
    //        $mail->addAttachment($pdfdoc, $filename);
 
    //    }
    // $mail->AddStringAttachment($pdfdoc, 'attach.pdf');

    $mail->MsgHTML($content);
    if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
}


//$to="uzair2014@gmail.com";
//$toname="Uzair Abid";
//$subject = "Test Email sent via Gmail SMTP Server using PHP Mailer";
//$contents = "This is a Test Email sent via Gmail SMTP Server using PHP mailer class.";
//sendemail($to,$toname,$subject,$contents);
