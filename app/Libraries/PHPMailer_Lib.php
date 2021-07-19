<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer_Lib
{
    public function send($nombre, $correo, $mensaje){

        require_once APPPATH.'ThirdParty/PHPMailer/src/Exception.php';
        require_once APPPATH.'ThirdParty/PHPMailer/src/PHPMailer.php';
        require_once APPPATH.'ThirdParty/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {

            $mensaje_cuerpo = "\n"."Responder al correo: ".$correo."\n <br />"."Nombre: ".$nombre."\n <br />"."Mensaje<br>".$mensaje."\n <br>";

            //Server settings para Servidor Godaddy
            $mail->isSMTP();                                                       
            $mail->Host       = 'url_cpanel.secureserver.net';      //tomado de la url del cpanel 
            $mail->SMTPAuth   = false;                                        
            //$mail->Username   = 'contacto@tu_dominio.com';                            
            //$mail->Password   = '***********';                                         
            //$mail->Port       =  25;                          

            //Recipients
            $mail->setFrom('contacto@tu_dominio.com', 'tunombre');
            $mail->addAddress('email@gmail.com');           
            $mail->addCC('email@gmail.com');
            $mail->addBCC('email@hotmail.com');

            //Content
            $mail->isHTML(true);                                 
            $mail->Subject = 'titulo bandeja de entrada';
            $mail->Body = $mensaje_cuerpo;
            $mensaje = "Su mensaje se ha enviado satifactoriamente";
            $mail->send();
        } catch (Exception $e) {
            $mensaje =$mail->ErrorInfo;
            $mensaje = "Su mensaje No se pudo enviar";
        }

        return $mensaje;
    }
}

