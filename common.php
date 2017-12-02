<?php
function selectsinglevalue($qry)
{
	$retval = '';
	$res = mysql_query($qry);
	$row = mysql_fetch_array($res,MYSQL_ASSOC);
	$retval = $row['retv'];
	return $retval;
}
function mail_template_or($to, $result, $subject) {

    include("mailer/class.phpmailer.php");
    //require_once("mailer/class.phpmailer.php");
    //echo "to : ".$to;
    //echo "<br/>";
    //echo "<br/>";
    //echo "to : ".$subject;
    //echo "<br/>";
    //echo "<br/>";
    //$arySettings = fetchSetting(array('us2.imap.mailhostbox.com', '143', 'admin@hippocampi.net', 'abc123456', 'admin@hippocampi.net'));
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


function mail_template_appliedjob($filename, $to, $result, $subject) {
    include("mailer/class.phpmailer.php");   
    $to = $to;
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
    $file_to_attach = $filename;
    $resumename = explode("/", $file_to_attach);
    $attahementresumename = $resumename[1];
    $mail->AddAttachment($file_to_attach, $attahementresumename);
    $mail->Send();
    $mail->ClearAddresses();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: admin@areevu.com Reload na' . "\r\n";
    @mail($to, $subject, $result, $headers);

}



function signup_email($content, $logo, $footer, $subject, $name, $to, $link) {
//    $subject = "SS Registration Email";
    $body1 = '<table border="0" cellpadding="0" cellspacing="0" width="50%">
				<tr>
				 <td>
				  <img src="' . $logo . '" alt="" width="35%" height="50" style="display: block;" />
				 </td>
				</tr>
			   </table>';
    $body_link = '<a href="'.$link.'">Click Here</a>';
    $body = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $content);
    $body = str_replace('$logo', $body1, $body);
    $body = str_replace('$name', $name, $body);
    $body = str_replace('$link', $body_link, $body);
    $body = str_replace('$footer', $footer, $body);

    $check = mail_template_or($to, $body, $subject);
}
function jobalert_mail($content, $logo, $footer, $subject, $name, $to, $link) {
//    $subject = "SS Registration Email";
    $body1 = '<table border="0" cellpadding="0" cellspacing="0" width="50%">
				<tr>
				 <td>
				  <img src="' . $logo . '" alt="" width="35%" height="50" style="display: block;" />
				 </td>
				</tr>
			   </table>';
    $body_link = '<a href="'.$link.'">Click Here</a>';
    $body = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $content);
    $body = str_replace('$logo', $body1, $body);
    $body = str_replace('$name', $name, $body);
    $body = str_replace('$link', $body_link, $body);
    $body = str_replace('$footer', $footer, $body);

    $check = mail_template_or($to, $body, $subject);
}

?>
