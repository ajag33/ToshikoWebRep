<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";
//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    if(isset($_POST['enviar'])){

        $name=$_POST['nombre'];
         $apellido=$_POST['apellido'];
        $involucrado1=$_POST['involucrado1'];
        $involucrado2=$_POST['involucrado2'];
        $involucrado3=$_POST['involucrado3'];
        $puesto1=$_POST['puesto1'];
       $puesto2=$_POST['puesto2'];
       $puesto3=$_POST['puesto3'];
       $contacto=$_POST['contacto'];
    
       $detallehecho=$_POST['detallehecho'];
  
     
      
        $asunto=$name." ".$apellido." ".$involucrado1." ".$involucrado2." ".$involucrado3." ".$puesto1." ".$puesto2." ".$puesto3." ".$detallehecho." ".$contacto;
    
        //server 

         //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'j.balcazar.f@gmail.com';                     //SMTP username
    $mail->Password   = 'kmmsmcakmpvivvlz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`  ENCRYPTION_SMTPS

    //Recipients
    $mail->setFrom('canaldedenuncias@toshiko.com.pe', 'Mailer');
    $mail->addAddress('fgutierrez@toshiko.com.pe', 'Jose User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =$name;
    $mail->Body    = 'CUERPO DEL CORREO :'.$asunto;
    $mail->AltBody = 'TEXTO non-HTML mail clients';

    $mail->send();
    
     echo "<script>location.href='http://www.toshiko.com.pe/index.html';</script>";
die();
    }

    
     else{
         echo "<script>location.href='http://www.toshiko.com.pe/index.html';</script>";
die();
     }
     
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
