<?php
@include("config.php");

function mail_template($to, $type, $vars = NULL, $subject = NULL) {
    require_once("mailer/class.phpmailer.php");
    global $db;
    $emails = $db->getRow("select * from emails where email_type = '" . $type . "'");
    $arySettings = fetchSetting(array('mail_host', 'mail_port', 'mail_uname', 'mail_password', "admin_email"));
    if ($subject == "") {
        $sub = $emails['subject'];
    } else {
        $sub = $subject;
    }
    $body = $emails['body'];
    if ($vars != "") {
        if (count($vars)) {
            foreach ($vars as $key => $val) {
                $body = str_replace($key, $val, $body);
            }
            $body = str_replace("{", "", $body);
            $body = str_replace("}", "", $body);
        }
    }

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = $arySettings['mail_host'];
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->Port = $arySettings['mail_port'];
    $mail->Username = $arySettings['mail_uname'];
    $mail->Password = $arySettings['mail_password'];
    $mail->SMTPSecure = "tls";
    $mail->SetFrom($arySettings['admin_email'], "Football League");
    $mail->Subject = $sub;
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

    $mail->MsgHTML($body);
    $mail->AddAddress($to, '');
    $mail->Send();
    $mail->ClearAddresses();

    //$headers  = 'MIME-Version: 1.0' . "\r\n";
//  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//  $headers .= 'From: '.$arySettings['admin_email'].' Reloadna' . "\r\n";
//  @mail($to,$sub,$body,$headers);
}

function mail_template_or($to, $result, $subject) {
    require_once("mailer/class.phpmailer.php");
    $arySettings = fetchSetting(array('us2.imap.mailhostbox.com', '143', 'admin@hippocampi.net', 'abc123456', 'admin@hippocampi.net'));
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "us2.smtp.mailhostbox.com";
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->Port = 25;
    $mail->Username = 'admin@hippocampi.net';
    $mail->Password = 'abc123456';
    $mail->SMTPSecure = "tls";
    $mail->SetFrom("admin@hippocampi.net", "Admin");
    $mail->Subject = $subject;
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
    $mail->MsgHTML($result);
    $mail->AddAddress($to, '');
    $mail->Send();
    $mail->ClearAddresses();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: admin@areevu.com Reload na' . "\r\n";
    @mail($to, $subject, $result, $headers);
}


function activation_email($content, $logo, $user_name, $activation_link, $to) {
    $subject = "Areevu Activation Link Email";
    $body1 = '<table border="0" cellpadding="0" cellspacing="0" width="50%">
                <tr>
                 <td>
                  <img src="' . $logo . '" alt="" width="15%" height="50" style="display: block;" />
                 </td>
                </tr>
               </table>';
    $body = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $content);
    $body = str_replace('$logo', $body1, $body);
    $body = str_replace('$user_name', $user_name, $body);
    $body = str_replace('$activation_link', $activation_link, $body);
    $check = mail_template_or($to, $body, $subject);
}
?>