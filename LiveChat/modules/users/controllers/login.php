<?php 
_setView(__FILE__);
_setTitle('Ultimate Support Chat');
_setLayout('blank');

if(check_login_bool()) {
	refresh('/'.$languageURL);
}

