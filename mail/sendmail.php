<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
// include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
// include "PHPMailer/src/DNSConfigurator.php";
// include "PHPMailer/src/OAuthTokenProvider.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\OAuth;
// use PHPMailer\PHPMailer\OAuthTokenProvider;
class Mailer {                          
    // print_r($mail);
    public function dathangmail($tieude, $noidung, $maildathang) {
        $mail = new PHPMailer(true);   // Passing `true` enables exceptions
        //chuyen font chu co dau
        $mail->CharSet = 'UTF-8';
        try { // tin nhan duoc gui thanh cong
            //Server settings
            $mail->SMTPDebug = 0;                                 // bat tinh nang email gui thanh cong hay k
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // su dung server
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'thegioiphukiendienthoai759@gmail.com';                 // SMTP username
            $mail->Password = 'qifidpcxhyjivslj';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            //Recipients
            $mail->setFrom('thegioiphukiendienthoai759@gmail.com', 'Mailer');
            //gui dia chi cho nhieu nguoi
            $mail->addAddress($maildathang, 'Minh Ánh Ngô');     // Add a recipient
            // $mail->addAddress('ngoanhminh759@gmail.com','Ngô Minh Ánh');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('thegioiphukiendienthoai759@gmail.com');
            // $mail->addBCC('bcc@example.com');
         
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {// tin nhan khong duoc gui thanh cong
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }



}
?>
