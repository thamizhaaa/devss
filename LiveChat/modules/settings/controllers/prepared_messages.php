<?php
_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();

if ($_SESSION['user']['permissions'] == 0){
    refresh('/'.$languageURL);
}



