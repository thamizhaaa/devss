<?php
_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();

if (isset($_POST['submit'])){

    print_r($_POST);
    exit;

}

abr('departments', 'Departments');