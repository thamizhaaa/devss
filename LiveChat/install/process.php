<?php
date_default_timezone_set('UTC');
session_start();

if (isset($_POST['check_db']) && $_POST['check_db'] == 'true') {

    $_SESSION['db_host'] = htmlspecialchars($_POST['db_host']);
    $_SESSION['db_name'] = htmlspecialchars($_POST['db_name']);
    $_SESSION['db_user'] = htmlspecialchars($_POST['db_user']);
    $_SESSION['db_password'] = htmlspecialchars($_POST['db_password']);

    try {
        $dbh = new pdo('mysql:host=' . $_SESSION['db_host'] . ';dbname=' . $_SESSION['db_name'] . '',
            $_SESSION['db_user'],
            $_SESSION['db_password'],
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        die('true');
    } catch (PDOException $ex) {
        die('false');
    }

}


if (isset($_POST['admin_setup']) && $_POST['admin_setup'] == 'true') {

    $_SESSION['admin_email'] = htmlspecialchars($_POST['admin_email']);
    $_SESSION['admin_name'] = htmlspecialchars($_POST['admin_name']);
    $_SESSION['admin_password'] = htmlspecialchars($_POST['admin_password']);

    $dm = $_SERVER['HTTP_HOST'];
    if (substr($dm, 0, 4) == 'www.') {
        $dm = substr($dm, 4);
    }

    $fp = fopen($_POST['app_path'] . '/data/config/config.php', 'w');
    fwrite($fp, "<?php \n\n");
    fwrite($fp, '$configArr = array(' . "\n");
    fwrite($fp, '	\'engine_path\' => \'' . preg_replace('/[\/]{2,}/', '/', $_POST['app_path'] . '/engine/') . '\', ' . "\n");
    fwrite($fp, '	\'root_path\' => \'' . preg_replace('/[\/]{2,}/', '/', $_POST['app_path'] . '/') . '\', ' . "\n");
    fwrite($fp, '	\'domain\' => \'' . $dm . '\' ' . "\n");
    fwrite($fp, '); ' . "\n\n\n\n");

    fwrite($fp, "function PDO_CONNECT(){ \n");
    fwrite($fp, "    " . chr(36) . "PDO = new PDO('mysql:host=" . $_SESSION['db_host'] . ";dbname=" . $_SESSION['db_name'] . "', '" . $_SESSION['db_user'] . "', '" . $_SESSION['db_password'] . "'); \n");
    fwrite($fp, "    " . chr(36) . "PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); \n");
    fwrite($fp, "    return " . chr(36) . "PDO; \n");
    fwrite($fp, "}");
    fclose($fp);

    require_once 'db.php';

    die('installed');

}

die('false');