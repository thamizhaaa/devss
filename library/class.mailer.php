<?php

defined('PATH_LIB') or die("Restricted Access");

#############################################################################################################################
#														Mailing Class (with SMTP)											#
#	@file	:	class.mailer.php																							#
#	@author	:	S.R.Rama Krishna																								#																														
#	@email	:	ramakrishna@vinformaxtech.com																						#
#############################################################################################################################
//require_once(PATH_LIB.'mailer'.DS.'class.phpmailer.php');

require_once(PATH_LIB . 'class.phpmailer.php');

class Mailer extends PHPMailer {

    function __construct($host = NULL, $port = NULL, $uname = NULL, $upswd = NULL) {

        if (!is_null($host)) {



            $this->IsSMTP();

            $this->SMTPDebug = 0; // 1 = errors and messages
            // 2 = messages only

            $this->Host = $host; // SMTP server



            if (!is_null($port) && !empty($port) && (int) $port > 0)
                $this->Port = $port;



            if (!is_null($uname) && !is_null($upswd)) {

                $this->SMTPAuth = TRUE;

                $this->Username = $uname; // SMTP account username

                $this->Password = $upswd;        // SMTP account password
            }
        }

        $this->AltBody = "To view the message, please use an HTML compatible email viewer!";
    }

    // Replace the default error_handler

    function error_handler($msg) {

        $erMsg = "Mailer Error:" . $msg;

        echo $erMsg;
    }

    function from($email, $name = NULL) {

        if (is_null($name) || empty($name)) {

            $this->SetFrom($email);
        } else {

            $this->SetFrom($email, $name);
        }
    }

    function to($email, $name = NULL) {

        if (is_null($name) || empty($name)) {

            $this->AddAddress($email);
        } else {

            $this->AddAddress($email, $name);
        }
    }

    function cc($email, $name = NULL) {

        if (is_null($name) || empty($name)) {

            $this->AddCC($email);
        } else {

            $this->AddCC($email, $name);
        }
    }

    function bcc($email, $name = NULL) {

        if (is_null($name) || empty($name)) {

            $this->AddBCC($email);
        } else {

            $this->AddBCC($email, $name);
        }
    }

    function attach($path) {

        $this->AddAttachment($path);      // attachment
    }

    function setSubject($txt) {

        $this->Subject = $txt;
    }

    function setBody($txt) {

        $this->MsgHTML($txt);
    }

    function alt_body($txt) {

        $this->AltBody = $txt;
    }

    function send_mail() {

        return $this->Send();
    }

}

/*

  Usage:

  $mailer=new Mailer();

  $mailer->from("ramakrishna@vinformaxtech.com");

  $mailer->setSubject("Mial Class Test");

  $mailer->alt_body    = "To view the message, please use an HTML compatible email viewer!";

  $mailer->to("ramakrishna@vinformaxtech.com");

  $mailer->setBody("testing mail");

  if($mailer->send_mail())

  {

  echo 'success';

  }

  else

  {

  echo 'fail';

  } */
?>