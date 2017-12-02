<?php

class Mailer extends Service
{
    public function sendMessage($from, $to, $subject, $body)
    {
        $headers = "From: $from\r\nReply-To: $from\r\nContent-Type: text/html; charset=UTF-8\r\n";
        
        @mail($to, $subject, $body, $headers);
    }
}

?>
