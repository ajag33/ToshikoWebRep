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

        
        
        $tipodocumento=$_POST['tipodocumento'];
         $numerodocumento=$_POST['numerodocumento'];
        $fechaemision=$_POST['fechaemision'];
        $nombres=$_POST['nombres'];
        $apellidopaterno=$_POST['apellidopaterno'];
        $apellidomaterno=$_POST['apellidomaterno'];
       $correo=$_POST['correo'];
       $telefono=$_POST['telefono'];
       $domicilio=$_POST['domicilio'];
       $pais=$_POST['pais'];
        
        $departamento=$_POST['departamento'];
        $provincia=$_POST['provincia'];
       $distrito=$_POST['distrito'];
       $lugarincidencia=$_POST['lugarincidencia'];
       $centroatencion=$_POST['centroatencion'];
       $situacion=$_POST['situacion'];
  
     $datospersonales="Nombre ".$nombres." ".$apellidopaterno." ".$apellidopamerno." ".$tipodocumento." ".$numerodocumento." ".$fechaemision." ".$telefono." ".$correo." ".$domicilio." ".$pais." ".$departamento." ".$provincia." ".$distrito;
        
       $detallepersona="Datos del reclamo "."<br>". "Centro Atencion ".$$centroatencion." Lugar"." ".$$lugarincidencia."/  Situacion 2 ".$situacion;
       
        $asunto=$datospersonales." ".$detallepersona;
    
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
    $mail->setFrom('canaldedenuncias@toshiko.com.pe', 'FORMULARIOS SUGERENCIAS O DENUNCIAS');
    $mail->addAddress('fgutierrez@toshiko.com.pe', 'Jose User');     //Add a recipient
   $mail->addAddress('canaldedenuncias@toshiko.com.pe');      //Name is optional
    $mail->addAddress('administracion@toshiko.com.pe');
    $mail->addAddress('jabad@toshiko.com.pe');
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
    $mail->Body    = "<!DOCTYPE html><html lang='es'><body>    
    <header>
      <h1>Formulario Denuncia Sugerencia</h1>      
    </header>    
     <section>      
      <article>
        <h2>CONTENIDO PRINCIPAL</h2>
        <p>Formulario  Denuncia o sugerencias .</p>
        <p>Datos Persolanes</p>".$datospersonales."<p>Involucrados</p>".$involucrados."<p>Asunto</p>".$asunto."
        <div>
          
                  
        </div>
      </article>      
    </section>
     <footer> 
    </footer>
  </body>  
</html>";
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
