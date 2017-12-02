<?php

function phpinfo_array($return = false, $subname = false)
{
    ob_start();
    phpinfo(-1);
    $data = ob_get_clean();

    $data = str_replace('&nbsp;', ' ', $data);

    $pi = preg_replace(
        array(
            '#^.*<body>(.*)</body>.*$#ms',
            '#<h2>PHP License</h2>.*$#ms',
            '#<h1>Configuration</h1>#',
            "#\r?\n#",
            "#</(h1|h2|h3|tr)>#",
            '# +<#',
            "#[ \t]+#",
            '#&nbsp;#',
            '#  +#',
            '# class=".*?"#',
            '%&#039;%',
            '#<tr>(?:.*?)" src="(?:.*?)=(.*?)" alt="PHP Logo" /></tr>'
            . '<h1>PHP Version (.*?)</h1>(?:\n+?)<tr></tr>#',
            '#<h1><a href="(?:.*?)\?=(.*?)">PHP Credits</a></h1>#',
            '#<tr>(?:.*?)" src="(?:.*?)=(.*?)"(?:.*?)Zend Engine (.*?),(?:.*?)</tr>#',
            "# +#",
            '#<tr>#',
            '#</tr>#'
        ),
        array(
            '$1',
            '',
            '',
            '',
            '</$1>' . "\n",
            '<',
            ' ',
            ' ',
            ' ',
            '',
            ' ',
            '<h2>PHP Configuration</h2>' . "\n" . '<tr><td>PHP Version</td><td>$2</td></tr>' .
            "\n" . '<tr><td>PHP Egg</td><td>$1</td></tr>',
            '<tr><td>PHP Credits Egg</td><td>$1</td></tr>',
            '<tr><td>Zend Engine</td><td>$2</td></tr>' . "\n" .
            '<tr><td>Zend Egg</td><td>$1</td></tr>',
            ' ',
            '%S%',
            '%E%'
        ),
        $data);

    $sections = explode('<h2>', strip_tags($pi, '<h2><th><td>'));
    unset($sections[0]);

    $pi = array();
    foreach ($sections as $section) {
        $n = substr($section, 0, strpos($section, '</h2>'));
        preg_match_all('#%S%(?:<td>(.*?)</td>)?(?:<td>(.*?)</td>)?(?:<td>(.*?)</td>)?%E%#', $section, $askapache,
            PREG_SET_ORDER);
        foreach ($askapache as $m) {
            $pi[preg_replace('/([ ]{1,})/', '_', strtolower($n))][preg_replace('/([ ]{1,})/', '_',
                strtolower($m[1]))] = (!isset($m[3]) || $m[2] == $m[3]) ? (isset($m[2]) ? $m[2] : '') : array_slice($m,
                2);
        }
    }

    if (isset($pi['zend_optimizer'])) {
        if (preg_match('/with Zend Optimizer v([0-9.]{1,})/i', $data, $match)) {
            $pi['zend_optimizer']['version'] = $match[1];
        }
        if (preg_match('/with Zend Extension Manager v([0-9.]{1,})/i', $data, $match)) {
            $pi['zend_optimizer']['extension_manager'] = $match[1];
        }
    }

    if (preg_match('/with the ionCube PHP Loader v([0-9.]{1,})/i', $data, $match)) {
        $pi['ioncube']['version'] = $match[1];
    }

    if ($return && $subname) {
        return isset($pi[$return][$subname]) ? $pi[$return][$subname] : '';
    } elseif ($return && !$subname) {
        return isset($pi[$return]) ? $pi[$return] : array();
    } else {
        return $pi;
    }

}

// GET APP DOMAIN & DIRECTORY //

function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . '/';
    return $protocol . $domainName;
}

define('SITE_URL', siteURL());

$current_directory = getcwd();
$curArr = explode('/', $current_directory);
unset($curArr[count($curArr) - 1]);
$appPath = implode('/', $curArr);
$appDir = str_replace("/install/install.php", "", $_SERVER['REQUEST_URI']);

$isInstalled = false;
if (file_exists($appPath . '/data/config/config.php')) {
    $isInstalled = true;
    header('Location: ' . siteURL() . $appDir . '/index.php');
    die();
}

if (isset($_POST['install']) && !$isInstalled) {
    $error = '';

    if (substr(sprintf('%o', fileperms($appPath . '/engine/data/')), -4) != '0777') {
        $error .= 'Please set writing permission (0777) on /engine/data<br />';
    }

    if (substr(sprintf('%o', fileperms($appPath . '/data/config/')), -4) != '0777') {
        $error .= 'Please set writing permission (0777) on /data/config<br />';
    }

    if (!in_array('zlib', get_loaded_extensions())) {
        $error .= 'The ZipArchive class uses the functions of Â» zlib<br />';
    }

    if (!function_exists('fopen')) {
        $error .= 'Function "fopen" should be active<br />';
    }

    if (!function_exists('curl_init')) {
        $error .= 'Function "curl" should be active<br />';
    }

    if (!function_exists('scandir')) {
        $error .= 'Function "scandir" should be active<br />';
    }

    if (!function_exists('mysql_connect')) {
        $error .= 'Function "mysql_connect" should be active<br />';
    } else {
        if (!version_compare("4.0", phpinfo_array('mysql', 'client_api_version'), "<=")) {
            $error .= 'MySQL 4 >= 4.0 is required<br />';
        }
    }

    if (!version_compare("5.2", phpversion(), "<=")) {
        $error .= 'PHP 5 >= 5.2 is required<br />';
    }


    if (phpinfo_array('apache2handler') && phpinfo_array('apache2handler',
            'loaded_modules') && strpos(phpinfo_array('apache2handler', 'loaded_modules'), 'mod_rewrite') === false
    ) {
        $error .= 'Apache mod_rewrite is required<br />';
    }

    if (!version_compare("2.0", preg_replace('/([^0-9.]{1,})/i', '$2', phpinfo_array('gd', 'gd_version')), "<=")) {
        $error .= 'PHP GD2 >= 2.0 is required<br />';
    }

    if ($error == '') {
        $complete = 'yes';
    }

} else {
    $_POST['mysql_host'] = '';
    $_POST['mysql_user'] = '';
    $_POST['mysql_pass'] = '';
    $_POST['mysql_db'] = '';
    $_POST['admin_username'] = '';
    $_POST['admin_password'] = '';
    $_POST['admin_mail'] = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ultimate Support Chat - Installation</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo SITE_URL . $appDir . '/data/css/bootstrap.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_URL . $appDir . '/install/css/install.min.css'; ?>" type="text/css">
    <!-- jQuery 2.1.4 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1>WELCOME TO ULTIMATE SUPPORT CHAT</h1>
            <hr>
            <p>To install the software you'll need to setup a database connection. Please review the installation
                instructions before continuing.</p>
            <a onclick="startInstall()" class="btn btn-primary btn-xl">Install</a>
        </div>
    </div>
</header>


<script>

    (function ($) {

        $.fn.fitText = function (kompressor, options) {

            var compressor = kompressor || 1,
                settings = $.extend({
                    'minFontSize': Number.NEGATIVE_INFINITY,
                    'maxFontSize': Number.POSITIVE_INFINITY
                }, options);

            return this.each(function () {

                var $this = $(this);

                var resizer = function () {
                    $this.css('font-size', Math.max(Math.min($this.width() / (compressor * 10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
                };

                resizer();
                $(window).on('resize.fittext orientationchange.fittext', resizer);
            });

        };

    })(jQuery);

    $("h1").fitText(
        1.2, {
            minFontSize: '35px',
            maxFontSize: '65px'
        }
    );


    function startInstall() {
        $(".header-content-inner").html('');
        $('.header-content').css({'top': '30px', '-webkit-transform': 'initial', 'transform': 'initial'});
        $('#content').contents().appendTo('.header-content-inner');
    }


</script>

<div id="content">

    <?php
    if ($isInstalled) {
        ?>

        <div class="box_error">
            <strong>Your system has been installed!</strong>
            <br/><br/>
            <strong>Please DELETE installation folder /install/</strong>
        </div>
        <?php
    } elseif (isset($complete)) {
        ?>
        <div class="box_complete">
            <strong>Installation completed!</strong>
            <br/><br/>
            <a href="<?php echo '/' . $appDir . '/users/login' ?>" title="">Go to App Login page</a>
        </div>
        <?php
    }
    else {
    ?>

    <?php
    if (isset($error) && $error != '') {
        ?>
        <div class="box_error"><?php echo $error; ?></div>

    <?php }

    $fas_error = false;

    if (@substr(sprintf('%o', fileperms($appPath . '/engine/data/')), -4) != '0777') {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Please set writing permission (0777) o the following folder: <strong>/engine/data</strong></div><br/>';
        $fas_error = true;
    }
    if (@substr(sprintf('%o', fileperms($appPath . '/data/config/')), -4) != '0777') {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Please set writing permission (0777) onthe following folder: <strong>/data/config</strong></div><br/>';
        $fas_error = true;
    }
    if (!in_array('zlib', get_loaded_extensions())) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>The ZipArchive class uses the functions of Â» zlib</div><br/>';
        $fas_error = true;
    }
    if (!function_exists('fopen')) {

        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Function "fopen" should be active</div><br/>';
        $fas_error = true;
    }
    if (!function_exists('scandir')) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Function "scandir" should be active</div><br/>';
        $fas_error = true;
    }
    if (!function_exists('curl_init')) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Function "curl" should be active</div><br/>';
        $fas_error = true;
    }
    if (!function_exists('mysql_connect')) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Function "mysql_connect" should be active</div><br/>';
        $fas_error = true;
    } elseif (!version_compare("4.0", phpinfo_array('mysql', 'client_api_version'), "<=")) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>MySQL 4 >= 4.0 is required</div><br/>';
        $fas_error = true;
    }
    if (!version_compare("5.2", phpversion(), "<=")) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>PHP 5 >= 5.2 is required</div><br/>';
        $fas_error = true;
    }
    if (phpinfo_array('apache2handler') && phpinfo_array('apache2handler',
            'loaded_modules') && strpos(phpinfo_array('apache2handler', 'loaded_modules'), 'mod_rewrite') === false
    ) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>Apache mod_rewrite is required</div><br/>';
        $fas_error = true;
    }
    if (!version_compare("2.0", preg_replace('/([^0-9.]{1,})/i', '$2', phpinfo_array('gd', 'gd_version')), "<=")) {
        $errorArr[] = '<div class="box_error"><strong>Required: </strong>PHP GD2 >= 2.0 is required</div><br/>';
        $fas_error = true;
    }

    if ($fas_error == true) {

        ?>

        <h1>ULTIMATE SUPPORT CHAT INSTALLATION</h1>
        <br/>

        <div class="box box-info">
            <h3>PERMISSIONS CHECK</h3>
            <br/><br/>
        </div>

        <?php

        foreach ($errorArr as $e) {
            print_r($e);
            echo '<br/>';
        }

    }


    if (!$fas_error) {

    ?>
    <div>
        <div id="db_connection">
            <h1>ULTIMATE SUPPORT CHAT INSTALLATION</h1>
            <br/>

            <div class="box box-info">
                <br/>

                <h3>DATABASE SETUP</h3>

                <div class="sk-cube-grid">
                    <div class="sk-cube sk-cube1"></div>
                    <div class="sk-cube sk-cube2"></div>
                    <div class="sk-cube sk-cube3"></div>
                    <div class="sk-cube sk-cube4"></div>
                    <div class="sk-cube sk-cube5"></div>
                    <div class="sk-cube sk-cube6"></div>
                    <div class="sk-cube sk-cube7"></div>
                    <div class="sk-cube sk-cube8"></div>
                    <div class="sk-cube sk-cube9"></div>
                </div>


                <div id="db_status" class="db_status_red">&nbsp;</div>

                <div class="box-body">
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="database_connection_form"
                          autocomplete="off">

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Database host" id="db_host"
                                       name="db_host" value="localhost" required/>
                                <i class="pull-left">This would be localhost for most cases.</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Database name" id="db_name"
                                       name="db_name" value="" required/>
                                <i class="pull-left">Your database name</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <label class="input_null">
                                    <input class="input_null" type="text" name="null1"/>
                                    <input class="input_null" type="password" name="null2"/>
                                </label>
                                <input type="text" class="form-control" placeholder="User name" id="db_user"
                                       name="db_user" value="" autocomplete="off" required/>
                                <i class="pull-left">User name with access to the database</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" placeholder="Password" id="db_password"
                                       name="db_password" value="" autocomplete="off" required/>
                                <i class="pull-left">User password</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-xl">Test connection</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>

            <script>

                if (document.getElementById("database_connection_form") != undefined) {
                    document.getElementById("database_connection_form").onsubmit = function () {
                        $('.sk-cube-grid').css('visibility', 'visible');

                        var dbHost = $('#db_host').val();
                        var dbName = $('#db_name').val();
                        var dbUser = $('#db_user').val();
                        var dbPassword = $('#db_password').val();

                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function () {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                $('.sk-cube-grid').css('visibility', 'hidden');

                                console.log(xhttp.responseText);

                                if (xhttp.responseText == 'true') {
                                    $('#db_connection').hide();
                                    $('#setup_admin').show();

                                } else {
                                    $('#db_status').html('Database connection failed. Please check the credentials and try again.');
                                }
                            }
                        };
                        xhttp.open("POST", "process.php", true);
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send("db_host=" + dbHost + "&db_name=" + dbName + "&db_user=" + dbUser + "&db_password=" + dbPassword + "&check_db=true");

                        return false;
                    }
                }

            </script>
        </div>


        <div id="setup_admin">

            <h1>ULTIMATE SUPPORT CHAT INSTALLATION</h1>
            <br/>

            <div class="box box-info">
                <br/>

                <div id="db_status" class="db_status_green">Database test sucessfull.</div>
                <h3>ADMIN ACCOUNT SETUP</h3>

                <div class="sk-cube-grid">
                    <div class="sk-cube sk-cube1"></div>
                    <div class="sk-cube sk-cube2"></div>
                    <div class="sk-cube sk-cube3"></div>
                    <div class="sk-cube sk-cube4"></div>
                    <div class="sk-cube sk-cube5"></div>
                    <div class="sk-cube sk-cube6"></div>
                    <div class="sk-cube sk-cube7"></div>
                    <div class="sk-cube sk-cube8"></div>
                    <div class="sk-cube sk-cube9"></div>
                </div>

                <div class="box-body">
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="admin_setup_form" autocomplete="off">

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" placeholder="Email" id="admin_email"
                                       name="admin_email" value="" required/>
                                <i class="pull-left">Your email address</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <label class="input_null">
                                    <input class="input_null" type="text" name="null1"/>
                                    <input class="input_null" type="password" name="null2"/>
                                </label>
                                <input type="text" class="form-control" placeholder="User name" id="admin_name"
                                       name="admin_name" value="" autocomplete="off" required/>
                                <i class="pull-left">User name for application login</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" placeholder="Password" id="admin_password"
                                       name="admin_password" value="" autocomplete="off" required/>
                                <i class="pull-left">User password for application login</i>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-xl">Complete</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box-body -->

            </div>

            <script>


                if (document.getElementById("admin_setup_form") != undefined) {
                    document.getElementById("admin_setup_form").onsubmit = function () {
                        $('.sk-cube-grid').css('visibility', 'visible');

                        var appPath = '<?php echo $appPath; ?>';
                        var adminEmail = $('#admin_email').val();
                        var adminName = $('#admin_name').val();
                        var adminPassword = $('#admin_password').val();

                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function () {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {

                                console.log(xhttp.responseText);


                                if (xhttp.responseText == 'installed') {
                                    $('#setup_admin').hide();
                                    $('#install_complete').show();
                                }
                            }
                        };
                        xhttp.open("POST", "process.php", true);
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send("admin_email=" + adminEmail + "&admin_name=" + adminName + "&admin_password=" + adminPassword + "&app_path=" + appPath + "&admin_setup=true");

                        return false;
                    }
                }

            </script>
        </div>


        <div id="install_complete">
            <h1>ULTIMATE SUPPORT CHAT INSTALLATION</h1>
            <br/>

            <h3>Installation has completed successfully</h3>

            <p><a onclick="location.reload();" class="pointer">Go to Application Login page</a></p>

        </div>

        <?php } ?>

        <?php
        }
        ?>


    </div>
    <!-- end of content -->

</body>
</html>
