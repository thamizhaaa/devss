<?php
/* ~ functions.php

  .---------------------------------------------------------------------------.

  |  Software: Areevu - Functions                                   |

  |  Version: 1.0                                                   |

  |  Contact: via http://www.vinformax.com/                         |

  | ------------------------------------------------------------------------- |

  |  Admin: S.R.Rama Krishna (Project Admininistrator)              |

  |  Copyright (c) 20014-2017, Vinformax. All rights reserved.     |

  | ------------------------------------------------------------------------- |

 */

defined('PATH_LIB') or die("Restricted Access");

function __autoload($strClass) {
    $strFile = "class." . strtolower($strClass) . ".php";
    require_once(PATH_CLASS . $strFile);
}

 /**
  * To get single value 
  */
function getvalue($field, $table, $condition = "") {

    $q = mysqli_query("select $field from $table $condition") or die(mysql_error());
    $row = mysqli_fetch_array($q);
    return $row[$field];
}
 /**
  * To get difference between two dates 
  */
function difference($val1) {
    $date1 = strtotime($val1);
    $date2 = date('Y-m-d H:i:s');
    $diff = abs(strtotime($date2) - $date1);
    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
    $minuts = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
    $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60));
    $nowtime = strtotime(date("H:i:s"));
    $endTime = strtotime("23:59:59");
    if ($seconds >= 0 && $seconds <= 60 && $minuts == 0 && $hours == 0 && $days == 0 && $months == 0 && $years == 0) {
        $time = $seconds . " Seconds";
        //$minuts = $endTime - $nowtime;
        //$minuts = date("H:i:s",$minuts);
    } elseif ($minuts == 0) {
        $minuts = $endTime - $nowtime;
        $minuts = date("H:i:s", $minuts);
    }
    if ($days != '1') {
        $hours11 = $endTime - $nowtime;
        $hours11 = date("H", $hours11);
        if ($hours11 > 0) {
            $hours11 = $hours11 . ' Hour';
        }
        $day = 'Days ' . $hours11;
    } else {
        $hours11 = $endTime - $nowtime;

        $hours11 = date("H", $hours11);
        if ($hours11 > 0) {
            $hours11 = $hours11 . ' Hour';
        }

        $day = 'Day ' . $hours11;
    }
    if ($months != '' && $days != '') {
        $time = $months . " Month & " . $days . " " . $day;
    } elseif ($months != '') {
        $time = $months . " Month";
    } elseif ($days != '') {
        $time = $days . " " . $day;
    } elseif ($hours != '') {
        $time = $hours . " Hour";
    } elseif ($hours != '') {
        $time = $minuts . " Minutes";
    } else {
        $time = $seconds . " Seconds";
    }//echo $time;	
    return $time;
}

function smart_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false) {

    if ($height <= 0 && $width <= 0) {

        return false;
    }



    $info = getimagesize($file);

    $image = '';



    $final_width = 0;

    $final_height = 0;

    list($width_old, $height_old) = $info;



    if ($proportional) {

        if ($width == 0)
            $factor = $height / $height_old;

        elseif ($height == 0)
            $factor = $width / $width_old;
        else
            $factor = min($width / $width_old, $height / $height_old);



        $final_width = round($width_old * $factor);

        $final_height = round($height_old * $factor);
    }

    else {

        $final_width = ( $width <= 0 ) ? $width_old : $width;

        $final_height = ( $height <= 0 ) ? $height_old : $height;
    }



    switch ($info[2]) {

        case IMAGETYPE_GIF:

            $image = imagecreatefromgif($file);

            break;

        case IMAGETYPE_JPEG:

            $image = imagecreatefromjpeg($file);

            break;

        case IMAGETYPE_PNG:

            $image = imagecreatefrompng($file);

            break;

        default:

            return false;
    }



    $image_resized = imagecreatetruecolor($final_width, $final_height);



    if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {

        $trnprt_indx = imagecolortransparent($image);



        // If we have a specific transparent color

        if ($trnprt_indx >= 0) {



            // Get the original image's transparent color's RGB values

            $trnprt_color = @imagecolorsforindex($image, $trnprt_indx);



            // Allocate the same color in the new image resource

            $trnprt_indx = @imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);



            // Completely fill the background of the new image with allocated color.

            @imagefill($image_resized, 0, 0, $trnprt_indx);



            // Set the background color for new image to transparent

            @imagecolortransparent($image_resized, $trnprt_indx);
        }

        // Always make a transparent background color for PNGs that don't have one allocated already
        elseif ($info[2] == IMAGETYPE_PNG) {



            // Turn off transparency blending (temporarily)

            @imagealphablending($image_resized, false);



            // Create a new transparent color for image

            $color = @imagecolorallocatealpha($image_resized, 0, 0, 0, 127);



            // Completely fill the background of the new image with allocated color.

            @imagefill($image_resized, 0, 0, $color);



            // Restore transparency blending

            imagesavealpha($image_resized, true);
        }
    }



    @imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);



    if ($delete_original) {

        if ($use_linux_commands)
            exec('rm ' . $file);
        else
            @unlink($file);
    }



    switch (strtolower($output)) {

        case 'browser':

            $mime = image_type_to_mime_type($info[2]);

            header("Content-type: $mime");

            $output = NULL;

            break;

        case 'file':

            $output = $file;

            break;

        case 'return':

            return $image_resized;

            break;

        default:

            break;
    }



    switch ($info[2]) {

        case IMAGETYPE_GIF:

            imagegif($image_resized, $output);

            break;

        case IMAGETYPE_JPEG:

            imagejpeg($image_resized, $output);

            break;

        case IMAGETYPE_PNG:

            imagepng($image_resized, $output);

            break;

        default:

            return false;
    }



    return true;
}

function youtube($string, $autoplay = 0, $width = 239, $height = 179) {
    preg_match('#(v\/|watch\?v=)([\w\-]+)#', $string, $match);
    return preg_replace(
            '#((http://)?(www.)?youtube\.com/watch\?[=a-z0-9&_;-]+)#i', "<div align=\"center\"><iframe title=\"YouTube video player\" width=\"$width\" height=\"$height\" src=\"http://www.youtube.com/embed/$match[2]?autoplay=$autoplay\" frameborder=\"0\" allowfullscreen></iframe></div>", $string);
}

function youtube_thumbnail_url($url) {
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        // URL is Not valid
        return false;
    }
    $domain = parse_url($url, PHP_URL_HOST);
    if ($domain == 'www.youtube.com' OR $domain == 'youtube.com') { // http://www.youtube.com/watch?v=t7rtVX0bcj8&feature=topvideos_film
        if ($querystring = parse_url($url, PHP_URL_QUERY)) {
            parse_str($querystring);
            if (!empty($v))
                return "http://img.youtube.com/vi/$v/1.jpg";
            else
                return false;
        } else
            return false;
    }
    elseif ($domain == 'youtu.be') { // something like http://youtu.be/t7rtVX0bcj8
        $v = str_replace('/', '', parse_url($url, PHP_URL_PATH));
        return (empty($v)) ? false : "http://img.youtube.com/vi/$v/3.jpg";
    } else
        return false;
}

function redirect($url = NULL) {
    if (is_null($url))
        $url = curPageURL();
    if (headers_sent()) {
        echo "<script>window.location='" . $url . "'</script>";
    } else {
        header("Location:" . $url);
    }
    exit;
}

function chkHeader() {
    if (strpos($_SERVER['HTTP_REFERER'], URL_ROOT) == 0)
        return true;
    return false;
}

function setMsgPage($mod, $sec, $type, $note) {
    //possible values for type
    //success
    //information
    //warning
    //error
    if (!isset($_SESSION['msg_er']))
        $_SESSION['msg_er'] = array();
    if (!isset($_SESSION['msg_er'][$mod]))
        $_SESSION['msg_er'][$mod] = array();
    if (!isset($_SESSION['msg_er'][$mod][$sec]))
        $_SESSION['msg_er'][$mod][$sec] = array();

    $_SESSION['msg_er'][$mod][$sec]['page'] = array(
        'type' => $type,
        'note' => $note
    );
}

function getMsgPage($mod, $sec) {
    $return = '';
    if (isset($_SESSION['msg_er'][$mod][$sec]['page']) && is_array($_SESSION['msg_er'][$mod][$sec]['page']) && count($_SESSION['msg_er'][$mod][$sec]['page']) > 0) {
        $class = $_SESSION['msg_er'][$mod][$sec]['page']['type'];
        $return = "<div class=\"notification " . $class . "\">";
        $return.=$_SESSION['msg_er'][$mod][$sec]['page']['note'];
        $return.="</div>";

        unset($_SESSION['msg_er'][$mod][$sec]['page']);
    }

    clearErMsg($mod, $sec);

    return $return;
}

function setMsgField($mod, $sec, $field, $type, $note) {
    //possible values for type
    //success
    //information
    //warning
    //error

    if (!isset($_SESSION['msg_er']))
        $_SESSION['msg_er'] = array();

    if (!isset($_SESSION['msg_er'][$mod]))
        $_SESSION['msg_er'][$mod] = array();
    if (!isset($_SESSION['msg_er'][$mod][$sec]))
        $_SESSION['msg_er'][$mod][$sec] = array();

    if (!isset($_SESSION['msg_er'][$mod][$sec]['field']))
        $_SESSION['msg_er'][$mod][$sec]['field'] = array();

    $_SESSION['msg_er'][$mod][$sec]['field'][$field] = array(
        'type' => $type,
        'note' => $note
    );
}

function getMsgField($mod, $sec, $field) {
    $return = '';
    if (isset($_SESSION['msg_er'][$mod][$sec]['field'][$field]) && is_array($_SESSION['msg_er'][$mod][$sec]['field'][$field]) && count($_SESSION['msg_er'][$mod][$sec]['field'][$field]) > 0) {
        $class = $_SESSION['msg_er'][$mod][$sec]['field'][$field]['type'];
        $return = "<span class=\"notification " . $class . "\">";
        $return.=$_SESSION['msg_er'][$mod][$sec]['field'][$field]['note'];
        $return.="</span>";
        unset($_SESSION['msg_er'][$mod][$sec]['field'][$field]);
    }
    if (isset($_SESSION['msg_er'][$mod][$sec]['field']) && is_array($_SESSION['msg_er'][$mod][$sec]['field']) && count($_SESSION['msg_er'][$mod][$sec]['field']) === 0)
        unset($_SESSION['msg_er'][$mod][$sec]['field']);

    clearErMsg($mod, $sec);

    return $return;
}

function clearErMsg($mod, $sec) {
    if (isset($_SESSION['msg_er'][$mod][$sec]) && is_array($_SESSION['msg_er'][$mod][$sec]) && count($_SESSION['msg_er'][$mod][$sec]) === 0)
        unset($_SESSION['msg_er'][$mod][$sec]);

    if (isset($_SESSION['msg_er'][$mod]) && is_array($_SESSION['msg_er'][$mod]) && count($_SESSION['msg_er'][$mod]) === 0)
        unset($_SESSION['msg_er'][$mod]);

    if (isset($_SESSION['msg_er']) && is_array($_SESSION['msg_er']) && count($_SESSION['msg_er']) === 0)
        unset($_SESSION['msg_er']);
}

function setSort($mod, $sec, $val) {
    if (!isset($_SESSION['sort']))
        $_SESSION['sort'] = array();
    if (!isset($_SESSION['sort'][$mod]))
        $_SESSION['sort'][$mod] = array();

    $_SESSION['sort'][$mod][$sec] = $val;
}

function getSort($mod, $sec) {
    return $_SESSION['sort'][$mod][$sec];
}

function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function getQueryString($aryQueryStr) {
    $aryMatch = array();
    foreach ($aryQueryStr as $opt => $val) {
        $aryMatch[] = $opt . '=' . urlencode($val);
    }
    return '?' . implode('&', $aryMatch);
}

function selected($needle, $haystack) {
    if (is_array($haystack) && in_array($needle, $haystack)) {
        return 'selected="selected"';
    } elseif (!is_array($haystack) && $needle === $haystack) {
        return 'selected="selected"';
    } else {
        return '';
    }
}

function checked($needle, $haystack) {
    if (is_array($haystack) && in_array($needle, $haystack)) {
        return 'checked="checked"';
    } elseif (!is_array($haystack) && $needle === $haystack) {
        return 'checked="checked"';
    } else {
        return '';
    }
}

function isValidDate($val) {
    if (preg_match(REGX_DATE, $val)) {
        list($year, $month, $date) = explode("-", $val);
        if (checkdate($month, $date, $year))
            return true;
    }
    return false;
}

function getFrontPaging($refUrl, $aryOpts, $pgCnt, $curPg) {
    $return = '';
    $return.='<ul>';
    if ($curPg > 1) {
        $aryOpts['pg'] = 1;
        $return.='<li><a href="' . $refUrl . getQueryString($aryOpts) . '">First</a></li>';

        $aryOpts['pg'] = $curPg - 1;
        $return.='<li><a href="' . $refUrl . getQueryString($aryOpts) . '">Prev</a></li>';
    }
    for ($i = 1; $i <= $pgCnt; $i++) {
        $aryOpts['pg'] = $i;
        $return.='<li><a href="' . $refUrl . getQueryString($aryOpts) . '" class="';
        if ($curPg == $i)
            $return.=' active';
        $return.='" >' . $i . '</a></li>';
    }
    if ($curPg < $pgCnt) {
        $aryOpts['pg'] = $curPg + 1;
        $return.='<li><a href="' . $refUrl . getQueryString($aryOpts) . '">Next</a></li>';
        $aryOpts['pg'] = $pgCnt;
        $return.='<li><a href="' . $refUrl . getQueryString($aryOpts) . '">Last</a></li>';
    }
    $return.='</ul>';
    return $return;
}

function getPaging($refUrl, $aryOpts, $pgCnt, $curPg) {
//	echo $aryOpts." ".$pgCnt." ".$curPg;
    $return = '';
    $return.='<div class="box-bottom"><div class="paginate">';
    if ($curPg > 1) {
        $aryOpts['pg'] = 1;
        $return.='<a href="' . $refUrl . getQueryString($aryOpts) . '">First</a>';

        $aryOpts['pg'] = $curPg - 1;
        $return.='<a href="' . $refUrl . getQueryString($aryOpts) . '">Prev</a>';
    }
    for ($i = 1; $i <= $pgCnt; $i++) {
        $aryOpts['pg'] = $i;
        $return.='<a href="' . $refUrl . getQueryString($aryOpts) . '" class="';
        if ($curPg == $i)
            $return.='active';
        $return.='" >' . $i . '</a>';
    }
    if ($curPg < $pgCnt) {
        $aryOpts['pg'] = $curPg + 1;
        $return.='<a href="' . $refUrl . getQueryString($aryOpts) . '">Next</a>';
        $aryOpts['pg'] = $pgCnt;
        $return.='<a href="' . $refUrl . getQueryString($aryOpts) . '">Last</a>';
    }
    $return.='<div class="clearfix"></div></div></div>';
    return $return;
}

function getPagingSup($refUrl, $aryOpts, $pgCnt, $curPg) {
//	echo $aryOpts." ".$pgCnt." ".$curPg;
    if (in_array('[__atuvc]', $aryOpts)) {
        unset($aryOpts[array_search('[__atuvc]')]);
        array_values($aryOpts);
    }
    $return = '';
    if ($curPg > 1) {
        $aryOpts['pg'] = 1;
        //$return.='<li class="pre"><a href="'.$refUrl.getQueryString($aryOpts).'">First</a></li>';

        $aryOpts['pg'] = $curPg - 1;
        $return.='<li ><a href="' . $refUrl . getQueryString($aryOpts) . '" class="pre">Previous</a></li>';
    }
    for ($i = 1; $i <= $pgCnt; $i++) {
        $aryOpts['pg'] = $i;
        if ($pgCnt == $i && $curPg >= $pgCnt)
            $class.=' bordernone';
        $return.='<li class="' . $class . '"><a href="' . $refUrl . getQueryString($aryOpts) . '" class="';
        if ($curPg == $i)
            $return.=' active';
        $return.='" >' . $i . '</a></li>';
    }
    if ($curPg < $pgCnt) {
        $aryOpts['pg'] = $curPg + 1;
        $return.='<li class="last"><a href="' . $refUrl . getQueryString($aryOpts) . '" class="nextal">Next</a></li>';
        $aryOpts['pg'] = $pgCnt;
        //$return.='<li class="last"><a href="'.$refUrl.getQueryString($aryOpts).'" class="nextal">Last</a></li>';
    }
    return $return;
}

function isAdmin() {
    if (isset($_SESSION[LOGIN_ADMIN]) && is_array($_SESSION[LOGIN_ADMIN]) && isset($_SESSION[LOGIN_ADMIN]['id']))
        return true;
    return false;
}

function getFileSize($path) {
    if (is_array($path) && count($path) > 0) {
        //if(!file_exists($path)) return 0;
        //if(is_file($path)) return filesize($path);
        $ret = 0;
        foreach ($path as $file)
            $ret+=getFileSize($file);
        return $ret;
    } else {
        if (!file_exists($path))
            return 0;
        if (is_file($path))
            return filesize($path);
    }
}

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow];
    //return $bytes;
}

function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {//check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {//to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function fetchSetting($mixVal) {
    $aryReturn = array();
    $strSetting = '';
    if (is_array($mixVal) && count($mixVal) > 0) {
        $strSetting = "'" . implode("', '", $mixVal) . "'";
    } elseif (trim($mixVal) != '') {
        $strSetting = "'" . $mixVal . "'";
    }
    if (trim($strSetting) != '') {
        global $db;
        $arySetData = $db->getRows("select * from settings where `field` in (" . $strSetting . ")");
        if (is_array($arySetData) && count($arySetData) > 0) {
            foreach ($arySetData as $iSetData) {
                $aryReturn[$iSetData['field']] = $iSetData['value'];
            }
        }
    }
    return $aryReturn;
}

function getStatusImg($status) {
    $aryImg = array(
        '0' => "status_inactive.png",
        '1' => "status_active.png"
    );
    return '<img src="' . URL_ADMIN_IMG . $aryImg[$status] . '" title="' . getStatusStr($status) . '" />';
}

function getOptionImg($status) {
    $aryImg = array(
        '0' => "cross.png",
        '1' => "tick.png"
    );
    return '<img src="' . URL_ADMIN_IMG . "icons/" . $aryImg[$status] . '" />';
}

function getStatusStr($val) {
    if ($val == 0) {
        return "Inactive";
    } else {
        return "Active";
    }
}

function getTransStr($val) {
    if ($val == 1) {
        return "Automatic";
    } else {
        return "Manual";
    }
}

function getOptionStr($val) {
    if ($val == 0) {
        return "No";
    } else {
        return "Yes";
    }
}

function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while ($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname . DS . $file))
                @unlink($dirname . DS . $file);
            else
                delete_directory($dirname . DS . $file);
        }
    }
    closedir($dir_handle);
    @rmdir($dirname);
    return true;
}

function check_login($userType = 'User') {
    if ($userType == 'User' && (!isset($_SESSION[LOGIN_USER]) || count($_SESSION[LOGIN_USER]) == 0))
        return false;
    elseif ($userType == 'Admin' && (!isset($_SESSION[LOGIN_ADMIN]) || count($_SESSION[LOGIN_ADMIN]) == 0))
        return false;

    return true;
}

function resizeVideo($markup, $dimensions) {
    $w = $dimensions['width'];
    $h = $dimensions['height'];

    $patterns = array();
    $replacements = array();
    if (!empty($w)) {
        $patterns[] = '/width="([0-9]+)"/';
        $patterns[] = '/width:([0-9]+)/';
        $patterns[] = '/width="([0-9]+)px"/';

        $replacements[] = 'width="' . $w . '"';
        $replacements[] = 'width:' . $w;
        $replacements[] = 'width="' . $w . 'px"';
    }

    if (!empty($h)) {
        $patterns[] = '/height="([0-9]+)"/';
        $patterns[] = '/height:([0-9]+)/';
        $patterns[] = '/height="([0-9]+)px"/';

        $replacements[] = 'height="' . $h . '"';
        $replacements[] = 'height:' . $h;
        $replacements[] = 'height="' . $h . 'px"';
    }

    return preg_replace($patterns, $replacements, $markup);
}

function listDirs($where) {
    $directoryarr = array();
    $itemHandler = opendir($where);
    $i = 0;
    while (($item = readdir($itemHandler)) !== false) {
        if ($item == "." || $item == "..") {
            
        } else {
            $directoryarr[] = $item;
        }
    }
    return($directoryarr);
}

function recurse_copy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ( $file = readdir($dir))) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function calc_dist($latitude1, $longitude1, $latitude2, $longitude2) {
    $thet = $longitude1 - $longitude2;
    $dist = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($thet)));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $kmperlat = 111.325; // Kilometers per degree latitude constant
    $dist = $dist * $kmperlat;
    return (round($dist));
}

//Calculates distance in KM between postcodes
function postcode_dist($postcode1, $postcode2, $suburb1 = '', $suburb2 = '') {
//Get lat and lon for postcode 1
    $extra = "";
    if ($suburb1 != '') {
        $extra = " and suburb = '$suburb1'";
    }
    $sqlquery = "SELECT * FROM postcode_db WHERE lat <> 0 and lon <> 0 and postcode = '$postcode1'$extra";
    $res = mysqli_query($sqlquery);
    $num = mysqli_num_rows($res);


//Get lat and lon for postcode 2

    $extra = "";
    if ($suburb2 != '') {
        $extra = " and suburb = '$suburb2'";
    }
    $sqlquery = "SELECT * FROM postcode_db WHERE lat <> 0 and lon <> 0 and postcode = '$postcode2'$extra";
    $res1 = mysqli_query($sqlquery);
    $num1 = mysqli_num_rows($res1);

    if ($num != 0 && $num1 != 0) {
//proceed
        $lat1 = mysql_result($res, 0, "lat");
        $lon1 = mysql_result($res, 0, "lon");
        $lat2 = mysql_result($res1, 0, "lat");
        $lon2 = mysql_result($res1, 0, "lon");
        $dist = calc_dist($lat1, $lon1, $lat2, $lon2);
        if (is_numeric($dist)) {
            return $dist;
        } else {
            return "Unknown";
        }
    } else {
        return "Unknown";
    }
}

function getPagingfront($refUrl, $aryOpts, $pgCnt, $curPg) {
//	echo $aryOpts." ".$pgCnt." ".$curPg;
    $return = '';
    $return.='<div class="pagination"><ul>';
    if ($curPg > 1) {
        $aryOpts['pg'] = 1;
        $return.='<li class="prev"><a href="' . $refUrl . getQueryString($aryOpts) . '">First</a></li>';

        $aryOpts['pg'] = $curPg - 1;
        $return.='<li class="prev"><a href="' . $refUrl . getQueryString($aryOpts) . '">Prev</a></li>';
    }
    for ($i = 1; $i <= $pgCnt; $i++) {
        $aryOpts['pg'] = $i;
        $return.='<li><a href="' . $refUrl . getQueryString($aryOpts) . '" class="graybutton pagelink';
        if ($curPg == $i)
            $return.=' active';
        $return.='" >' . $i . '</a></li>';
    }
    if ($curPg < $pgCnt) {
        $aryOpts['pg'] = $curPg + 1;
        $return.='<li class="prev"><a href="' . $refUrl . getQueryString($aryOpts) . '">Next</a></li>';
        $aryOpts['pg'] = $pgCnt;
        $return.='<li class="prev"><a href="' . $refUrl . getQueryString($aryOpts) . '">Last</a></li>';
    }
    $return.='</ul></div>';
    return $return;
}

function enum_select($table, $field) {
    $query = "SHOW COLUMNS FROM `$table` LIKE '$field' ";
    $result = mysqli_query($query) or die('error getting enum field ' . mysql_error());
    $row = mysqli_fetch_array($result, MYSQL_NUM);
    #extract the values
    #the values are enclosed in single quotes
    #and separated by commas
    $regex = "/'(.*?)'/";
    preg_match_all($regex, $row[1], $enum_array);
    $enum_fields = $enum_array[1];
    return( $enum_fields );
}

function randomFix($length) {
    $random = "";

    srand((double) microtime() * 1000000);

    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";

    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }
    return $random;
}

function href($page, $param = "") {
    global $db;
    $sef = "1";
    if ($sef == "1") {
        $x = explode("&", $param);
        $var = array();
        foreach ($x as $k1 => $v1) {
            $x2 = explode("=", $v1);

            $var[$x2[0]] = $x2[1];
        }
        switch ($page) {

            case 'page.php' : {
                    if (isset($var['id'])) {
                        $name = $db->getVal("SELECT linkname FROM cms WHERE cms_id=" . $var['id']);
                        $pagename = str_replace(" ", "-", str_replace("+", "~", str_replace("&", "and", strtolower(trim($name)))));
                        $htUrl = URL_ROOT . $pagename . ".html";
                        return $htUrl;
                    } else {
                        $htUrl = URL_ROOT . "content/" . $linkParam[1] . "/" . $linkParam[2];
                    }
                    return $htUrl;
                    break;
                }

            default: {
                    if ($param == "") {
                        return URL_ROOT . $page;
                    } else {
                        return URL_ROOT . $page . '?' . $param;
                    }
                }
        }
    } else {
        if ($param == "") {
            return URL_ROOT . $page;
        } else {
            return URL_ROOT . '/' . $page . '?' . $param;
        }
    }
}

function create_token($nm = "token") {
    $_SESSION[$nm] = time();
    echo '<input type="hidden" name="' . $nm . '"  value="' . $_SESSION[$nm] . '"/>';
}

function token($nm = "token") {
    if ($_SESSION[$nm] == $_POST[$nm])
        return true;
    else
        return false;
}

function convertdatenew($date) {
    $arrdate = explode('-', $date);
    return $arrdate[2] . '-' . $arrdate[0] . '-' . $arrdate[1];
}

function convertdatenew1($date) {
    $arrdate = explode('-', $date);
    return $arrdate[0] . '-' . $arrdate[1] . '-' . $arrdate[2];
}

class Paging {

    var $rowsPerPage = 30;
    var $pageNum = 1;
    var $numrows = 0;
    var $maxPage = 0;
    var $offset = 0;

    function sql($sqlquery) {

        $this->pageNum = isset($_REQUEST['gotopage']) ? $_REQUEST['gotopage'] : 1;

        $this->offset = ($this->pageNum - 1) * $this->rowsPerPage;

        $q = mysqli_query($sqlquery . " LIMIT " . $this->offset . ", " . $this->rowsPerPage) or die(mysql_error());

        $q2 = mysqli_query($sqlquery) or die(mysql_error());

        $this->numrows = mysqli_num_rows($q2);

        $this->maxPage = ceil($this->numrows / $this->rowsPerPage);

        while ($row = mysqli_fetch_array($q)) {
            $aryResult[] = $row;
        }
        return $aryResult;
    }

    function navigations($param = 'ser=') {

        $self = basename($_SERVER['PHP_SELF']);


        $self = $self . "?" . $param;

        if ($this->pageNum > 1) {

            $gotopage = $this->pageNum - 1;

            $prev = "<td class=\"text\"><a class=\"head\" href=\"$self&gotopage=$gotopage\">Previous</a></td>";



            $first = "<td class=\"text\"><a class=\"head\" href=\"$self&gotopage=1\">First</a></td>";
        } else {

            $prev = '';       // we're on page one, don't enable 'previous' link

            $first = ''; // nor 'first page' link
        }

        if ($this->pageNum < $this->maxPage) {

            $gotopage = $this->pageNum + 1;

            $next = "<td class=\"text\"><a class=\"head\" href=\"$self&gotopage=$gotopage\">Next</a></td>";



            $last = "<td class=\"text\"><a class=\"head\" href=\"$self&gotopage=" . $this->maxPage . "\">Last</a></td>";
        } else {

            $next = '';      // we're on the last page, don't enable 'next' link

            $last = ''; // nor 'last page' link
        }

        $i = $this->pageNum;

        $upto = $i + 5;

        $downto = $i - 5;

        if ($upto > $this->maxPage) {

            $upto = $this->maxPage;
        }



        if ($downto <= 0) {

            $downto = 1;
        }



        if ($this->maxPage > 1) {

            for ($i = $downto; $i <= $upto; $i++) {

                if ($i == $this->pageNum) {

                    $pages .= '<td class="page">' . "<a href=\"$self&gotopage=$i\">" . $i . '</a></td>';
                } else {

                    $pages .= "<td><a href=\"$self&gotopage=$i\">$i</a></td>";
                }
            }
        }


        return '<tr>' . $first . $prev . "&nbsp;&nbsp;$pages&nbsp;&nbsp;" . $next . $last . '</tr>';
    }

}

class Paging_social {

    var $rowsPerPage = 10;
    var $pageNum = 1;
    var $numrows = 0;
    var $maxPage = 0;
    var $offset = 0;

    function sql($fields = "*", $table, $cond = '') {

        $this->pageNum = isset($_REQUEST['gotopage']) ? $_REQUEST['gotopage'] : 1;

        $this->offset = ($this->pageNum - 1) * $this->rowsPerPage;

        $q = mysqli_query("select $fields from $table $cond LIMIT " . $this->offset . ", " . $this->rowsPerPage);

        $q2 = mysqli_query("select $fields from $table $cond  ");

        $this->numrows = mysqli_num_rows($q2);

        $this->maxPage = ceil($this->numrows / $this->rowsPerPage);

        return $q;
    }

    function navigations($param = '') {
        $self = basename($_SERVER['PHP_SELF']);

        if ($this->pageNum > 1) {
            $gotopage = $this->pageNum - 1;
            if ($self == 'index.php') {
                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$gotopage");
                $prev = '<li><a href="' . $href . '">' . PREVIOUS . '</a></li>';

                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=1");

                $first = '<li><a href="' . $href . '">' . FIRST . '</a></li>';
            } else {
                if ($param) {
                    $href = href($self, "gotopage=$gotopage&$param");
                } else {
                    $href = href($self, "gotopage=$gotopage");
                }
                $prev = '<li><a  href="' . $href . '">' . PREVIOUS . '</a></li>';

                $href = href($self, "gotopage=1");

                $first = '<li><a  href="' . $href . '">' . FIRST . '</a></li>';
            }
        } else {
            $prev = '';       // we're on page one, don't enable 'previous' link

            $first = ''; // nor 'first page' link
        }
        if ($this->pageNum < $this->maxPage) {
            $gotopage = $this->pageNum + 1;

            if ($self == 'index.php') {
                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$gotopage");

                $next = '<li><a  href="' . $href . '">' . NEXT . '</a></li>';

                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=" . $this->maxPage);

                $last = '<li><a  href="' . $href . '">' . LAST . '</a></li>';
            } else {
                if ($param) {
                    $href = href($self, "gotopage=$gotopage&$param");

                    $next = '<li><a  href="' . $href . '">' . NEXT . '</a></li>';

                    $href = href($self, "gotopage=" . $this->maxPage . "&$param");

                    $last = '<li><a href="' . $href . '">' . LAST . '</a></li>';
                } else {

                    $href = href($self, "gotopage=$gotopage");

                    $next = '<li><a href="' . $href . '">' . NEXT . '</a></li>';



                    $href = href($self, "gotopage=" . $this->maxPage);

                    $last = '<li><a href="' . $href . '">' . LAST . '</a></li>';
                }
            }
        } else {
            $next = '';      // we're on the last page, don't enable 'next' link

            $last = ''; // nor 'last page' link
        }

        $i = $this->pageNum;

        $upto = $i + 5;

        $downto = $i - 5;

        if ($upto > $this->maxPage) {

            $upto = $this->maxPage;
        }

        if ($downto <= 0) {

            $downto = 1;
        }

        if ($this->maxPage > 1) {

            for ($i = $downto; $i <= $upto; $i++) {

                if ($i == $this->pageNum) {
                    $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$i");
                    $href = 'javascript:;';
                    $pages .= '<li class="active"><a href="' . $href . '">' . $i . '</a></li>';
                } else {
                    if ($self == 'index.php') {
                        $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$i");

                        $pages .= '<li><a href="' . $href . '">' . $i . '</a></li>';
                    } else {
                        if ($param) {
                            $href = href($self, "gotopage=$i&$param");
                            $pages .= '<li><a  href="' . $href . '">' . $i . '</a></li>';
                        } else {
                            $href = href($self, "gotopage=$i");
                            $pages .= '<li><a href="' . $href . '">' . $i . '</a></li>';
                        }
                    }
                }
            }
        }
        if ($pages)
            return '<ul ><li class="pagestatus">Page ' . $_GET['gotopage'] . ' of ' . $this->maxPage . ' :</li>' . "$prev $pages $next" . '</ul>';
        else
            return false;
    }

}

function get_youtube_video_image($youtube_code) {
    // get the video code if this is an embed code	(old embed)
    preg_match('/youtube\.com\/v\/([\w\-]+)/', $youtube_code, $match);

    // if old embed returned an empty ID, try capuring the ID from the new iframe embed
    if ($match[1] == '')
        preg_match('/youtube\.com\/embed\/([\w\-]+)/', $youtube_code, $match);

    // if it is not an embed code, get the video code from the youtube URL	
    if ($match[1] == '')
        preg_match('/v\=(.+)&/', $youtube_code, $match);

    // get the corresponding thumbnail images	
    $full_size_thumbnail_image = "http://img.youtube.com/vi/" . $match[1] . "/0.jpg";
    $small_thumbnail_image1 = "http://img.youtube.com/vi/" . $match[1] . "/1.jpg";
    $small_thumbnail_image2 = "http://img.youtube.com/vi/" . $match[1] . "/2.jpg";
    $small_thumbnail_image3 = "http://img.youtube.com/vi/" . $match[1] . "/3.jpg";

    // return whichever thumbnail image you would like to retrieve
    return $small_thumbnail_image1;
}

function get_Advertise_Banner($cookie, $page_id, $banner_area) {
    global $db;
    if (isset($cookie) && $cookie != "" && $cookie != 'All') {
        $getTopBanner = $db->getVal("SELECT banner_image FROM advertisement WHERE region = '" . $cookie . "' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND (from_date<='" . date('Y-m-d') . "' AND to_date>='" . date('Y-m-d') . "') AND payment_status=2 AND status=1");
        if (!isset($getTopBanner)) {
            $getTopBanner = $db->getVal("SELECT banner_image FROM advertisement WHERE region = '" . $cookie . "' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND user_id=0 AND payment_status=2 AND status=1");
        }
    } else {
        $getTopBanner = $db->getVal("SELECT banner_image FROM advertisement WHERE region = 'All' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND (from_date<='" . date('Y-m-d') . "' AND to_date>='" . date('Y-m-d') . "') AND payment_status=2 AND status=1");
        if (!isset($getTopBanner)) {
            $getTopBanner = $db->getVal("SELECT banner_image FROM advertisement WHERE region = 'All' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND user_id=0 AND payment_status=2 AND status=1");
        }
    }
    return $getTopBanner;
}

function getFeatureBanner($cookie, $page_id, $banner_area) {
    global $db;
    if (isset($cookie) && $cookie != "" && $cookie != 'All') {
        $getFeatureBanner = $db->getRows("SELECT banner_image, description FROM advertisement WHERE region = '" . $cookie . "' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND (from_date<='" . date('Y-m-d') . "' AND to_date>='" . date('Y-m-d') . "') AND payment_status=2 AND status=1");
        if (is_array($getFeatureBanner) && count($getFeatureBanner) == 0) {
            $getFeatureBanner = $db->getRows("SELECT banner_image, description FROM advertisement WHERE region = '" . $cookie . "' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND user_id=0 AND payment_status=2 AND status=1");
        }
    } else {
        $getFeatureBanner = $db->getRows("SELECT banner_image, description FROM advertisement WHERE region = 'All' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND (from_date<='" . date('Y-m-d') . "' AND to_date>='" . date('Y-m-d') . "') AND payment_status=2 AND status=1");
        if (is_array($getFeatureBanner) && count($getFeatureBanner) == 0) {
            $getFeatureBanner = $db->getRows("SELECT banner_image, description FROM advertisement WHERE region = 'All' AND page_id='" . $page_id . "' AND banner_area='" . $banner_area . "' AND user_id=0 AND payment_status=2 AND status=1");
        }
    }
    return $getFeatureBanner;
}

function array_sort($array, $on, $order = SORT_ASC) {
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

// edit by saurabh

/* function get_difftime($datefr,$dateto=-1)
  {
  // Defaults and assume if 0 is passed in that
  // its an error rather than the epoch
  $datefrom = strtotime($datefr);
  if($datefrom<=0) { return "A long time ago"; }
  if($dateto==-1) { $dateto = time(); }

  // Calculate the difference in seconds betweeen
  // the two timestamps

  $difference = $dateto - $datefrom;

  // If difference is less than 60 seconds,
  // seconds is a good interval of choice

  if($difference < 60)
  {
  $interval = "s";
  }

  // If difference is between 60 seconds and
  // 60 minutes, minutes is a good interval
  elseif($difference >= 60 && $difference<60*60)
  {
  $interval = "n";
  }

  // If difference is between 1 hour and 24 hours
  // hours is a good interval
  elseif($difference >= 60*60 && $difference<60*60*24)
  {
  $interval = "h";
  }

  // If difference is between 1 day and 7 days
  // days is a good interval
  elseif($difference >= 60*60*24 && $difference<60*60*24*7)
  {
  $interval = "d";
  }

  // If difference is between 1 week and 30 days
  // weeks is a good interval
  elseif($difference >= 60*60*24*7 && $difference <
  60*60*24*30)
  {
  $interval = "ww";
  }

  // If difference is between 30 days and 365 days
  // months is a good interval, again, the same thing
  // applies, if the 29th February happens to exist
  // between your 2 dates, the function will return
  // the 'incorrect' value for a day
  elseif($difference >= 60*60*24*30 && $difference <
  60*60*24*365)
  {
  $interval = "m";
  }

  // If difference is greater than or equal to 365
  // days, return year. This will be incorrect if
  // for example, you call the function on the 28th April
  // 2008 passing in 29th April 2007. It will return
  // 1 year ago when in actual fact (yawn!) not quite
  // a year has gone by
  elseif($difference >= 60*60*24*365)
  {
  $interval = "y";
  }

  // Based on the interval, determine the
  // number of units between the two dates
  // From this point on, you would be hard
  // pushed telling the difference between
  // this function and DateDiff. If the $datediff
  // returned is 1, be sure to return the singular
  // of the unit, e.g. 'day' rather 'days'

  switch($interval)
  {
  case "m":
  $months_difference = floor($difference / 60 / 60 / 24 /
  29);
  while (mktime(date("H", $datefrom), date("i", $datefrom),
  date("s", $datefrom), date("n", $datefrom)+($months_difference),
  date("j", $dateto), date("Y", $datefrom)) < $dateto)
  {
  $months_difference++;
  }
  $datediff = $months_difference;

  // We need this in here because it is possible
  // to have an 'm' interval and a months
  // difference of 12 because we are using 29 days
  // in a month

  if($datediff==12)
  {
  $datediff--;
  }

  $res = ($datediff==1) ? "$datediff month ago" : "$datediff
  months ago";
  break;

  case "y":
  $datediff = floor($difference / 60 / 60 / 24 / 365);
  $res = ($datediff==1) ? "$datediff year ago" : "$datediff
  years ago";
  break;

  case "d":
  $datediff = floor($difference / 60 / 60 / 24);
  $res = ($datediff==1) ? "$datediff day ago" : "$datediff
  days ago";
  break;

  case "ww":
  $datediff = floor($difference / 60 / 60 / 24 / 7);
  $res = ($datediff==1) ? "$datediff week ago" : "$datediff
  weeks ago";
  break;

  case "h":
  $datediff = floor($difference / 60 / 60);
  $res = ($datediff==1) ? "$datediff hour ago" : "$datediff
  hours ago";
  break;

  case "n":
  $datediff = floor($difference / 60);
  $res = ($datediff==1) ? "$datediff minute ago" :
  "$datediff minutes ago";
  break;

  case "s":
  $datediff = $difference;
  $res = ($datediff==1) ? "$datediff second ago" :
  "$datediff seconds ago";
  break;
  }
  return $res;
  } */

function time_since($time1, $time2, $precision = 6) {
    date_default_timezone_set('Asia/Calcutta');
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
        $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
        $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
        $ttime = $time1;
        $time1 = $time2;
        $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year', 'month', 'day', 'hour', 'minute', 'second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
        // Set default diff to 0
        $diffs[$interval] = 0;
        // Create temp time from time1 and interval
        $ttime = strtotime("+1 " . $interval, $time1);
        // Loop until temp time is smaller than time2
        while ($time2 >= $ttime) {
            $time1 = $ttime;
            $diffs[$interval] ++;
            // Create new temp time from time1 and interval
            $ttime = strtotime("+1 " . $interval, $time1);
        }
    }

    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
        // Break if we have needed precission
        if ($count >= $precision) {
            break;
        }
        // Add value and interval 
        // if value is bigger than 0
        if ($value > 0) {
            // Add s if value is not 1
            if ($value != 1) {
                $interval .= "s ago";
            } else {
                $interval .= " ago";
            }
            // Add value and interval to times array
            $times[] = $value . " " . $interval;
            $count++;
        }
    }

    $timeCount = count($times);
    if ($times[0] != '') {
        return $times[0];
    } elseif ($times[1] != '') {
        return $times[1];
    } elseif ($times[2] != '') {
        return $times[2];
    } elseif ($times[3] != '') {
        return $times[3];
    } elseif ($times[4] != '') {
        return $times[4];
    } elseif ($times[5] != '') {
        return $times[5];
    } else {
        
    }

    // Return string with times
    //  return implode(", ", $times);
}

class Paging_social1 {

    var $rowsPerPage = 10;
    var $pageNum = 1;
    var $numrows = 0;
    var $maxPage = 0;
    var $offset = 0;

    function sql($fields = "*", $table, $cond = '') {

        $this->pageNum = isset($_REQUEST['gotopage']) ? $_REQUEST['gotopage'] : 1;

        $this->offset = ($this->pageNum - 1) * $this->rowsPerPage;

        $q = mysqli_query("select $fields from $table $cond LIMIT " . $this->offset . ", " . $this->rowsPerPage);

        $q2 = mysqli_query("select $fields from $table $cond  ");

        $this->numrows = mysqli_num_rows($q2);

        $this->maxPage = ceil($this->numrows / $this->rowsPerPage);

        return $q;
    }

    function navigations($param = '') {

        $self = basename($_SERVER['PHP_SELF']);

        if ($this->pageNum > 1) {
            $gotopage = $this->pageNum - 1;
            if ($self == 'index.php') {
                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$gotopage");
                $a = URL_IMG . 'page_prev.png';
                $prev = '<li><a href="' . $href . '">' . '<img src="' . $a . '">' . '</a></li>';



                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=1");

                $first = '<li><a href="' . $href . '">' . FIRST . '</a></li>';
            } else {
                if ($param) {
                    $href = href($self, "gotopage=$gotopage&$param");
                } else {
                    $href = href($self, "gotopage=$gotopage");
                }
                $prev = '<li><a  href="' . $href . '"><img src="http://192.168.0.5/deve02/club_deal/images/page_prev.png" title="Previous" /></a></li>';

                $href = href($self, "gotopage=1");

                $first = '<li><a  href="' . $href . '"><img src="http://192.168.0.5/deve02/club_deal/images/page_next.png" title="Next"  /></a></li>';
            }
        } else {
            $prev = '';       // we're on page one, don't enable 'previous' link

            $first = ''; // nor 'first page' link
        }
        if ($this->pageNum < $this->maxPage) {
            $gotopage = $this->pageNum + 1;

            if ($self == 'index.php') {
                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$gotopage");

                $next = '<li><a  href="' . $href . '">' . NEXT . '</a></li>';

                $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=" . $this->maxPage);

                $last = '<li><a  href="' . $href . '">' . LAST . '</a></li>';
            } else {
                if ($param) {
                    $href = href($self, "gotopage=$gotopage&$param");

                    $next = '<li><a  href="' . $href . '">' . NEXT . '</a></li>';

                    $href = href($self, "gotopage=" . $this->maxPage . "&$param");

                    $last = '<li><a href="' . $href . '">' . LAST . '</a></li>';
                } else {

                    $href = href($self, "gotopage=$gotopage");

                    $next = '<li><a href="' . $href . '">NEXT</a></li>';



                    $href = href($self, "gotopage=" . $this->maxPage);

                    $last = '<li><a href="' . $href . '">' . LAST . '</a></li>';
                }
            }
        } else {
            $next = '';      // we're on the last page, don't enable 'next' link

            $last = ''; // nor 'last page' link
        }

        $i = $this->pageNum;

        $upto = $i + 5;

        $downto = $i - 5;

        if ($upto > $this->maxPage) {

            $upto = $this->maxPage;
        }

        if ($downto <= 0) {

            $downto = 1;
        }

        if ($this->maxPage > 1) {

            for ($i = $downto; $i <= $upto; $i++) {

                if ($i == $this->pageNum) {
                    //$href =href($self,$_SERVER['QUERY_STRING']."&gotopage=$i");	
                    //$pages .= '<li class="selected"><a href="'.$href.'">'.$i.'</a></li>';
                } else {
                    if ($self == 'index.php') {
                        $href = href($self, $_SERVER['QUERY_STRING'] . "&gotopage=$i");

                        //$pages .= '<li><a href="'.$href.'">'.$i.'</a></li>';
                    } else {
                        if ($param) {
                            $href = href($self, "gotopage=$i&$param");
                            //$pages .= '<li><a  href="'.$href.'">'.$i.'</a></li>';	
                        } else {
                            $href = href($self, "gotopage=$i");
                            $pages .= '<li><a href="' . $href . '">' . $i . '</a></li>';
                        }
                    }
                }
            }
        }
        if ($pages)
            return "$prev  $next";
        else
            return false;
    }

}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

function msg($msg) {
    if (count($msg))
        foreach ($msg as $type => $content)
            if ($msg[$type] != '') {

                if ($type == 'error') {
                    $type1 = 'danger';
                }
                return '<div class="row"><div class="alert alert-dismissable alert-' . $type . ' alert-' . $type1 . '">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  ' . $content . '
			</div></div>';
            }





    if ($msg[$type] != '') {
        return '<a href="javascript:void(0);" onclick="$(this).fadeOut();" title="Close" id="close_fancy"><div class="' . $type . '"><p class="closestatus"><font color="#F7B4C9">X</font> ' . $content . '</p></div></a>';
    }
}

function msgadmin($msg) {
    if (count($msg))
        foreach ($msg as $type => $content)
            if ($msg[$type] != '') {
                return '<div class="alert-msg ' . $type . '-msg">' . $content . '</div>';
            }
}

function mail_template($to, $type, $vars = NULL, $subject = NULL) {
    require_once("class.phpmailer.php");
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
//	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//	$headers .= 'From: '.$arySettings['admin_email'].' Reloadna' . "\r\n";
//	@mail($to,$sub,$body,$headers);
}

function mail_template_or($to, $result, $subject) {
    require_once("class.phpmailer.php");
//	echo "to : ".$to;
//	echo "<br/>";
//	echo "<br/>";
//	echo "to : ".$subject;
//	echo "<br/>";
//	echo "<br/>";

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

function getname($fname = '', $lname = '', $uname) {
    if ($fname == "" && $lname == "") {
        return 'User';
    } else {
        $name = substring(ucwords($fname), 30);
        return $name;
    }
}

function upload($src, $dest, $fname) {
    $fx = 1;
    if (!empty($fname)) {
        while ($fx == 1) {
            if (file_exists($dest . $fname)) {
                $newname = substr($fname, 0, strpos($fname, '.'));
                $ext = substr($fname, strpos($fname, '.'), strlen($fname));
                $fname = $newname . "_" . rand(0, 99999) . $ext;
            } else {
                $fx = 0;
                @move_uploaded_file($src, $dest . $fname);
            }
        }
        return $fname;
    } else {
        return "";
    }
}

function substring($string, $reqLength) {
    $newString = '';
    $length = strlen($string);
    if ($reqLength < $length) {
        $newString .= substr($string, 0, $reqLength);
        $newString .= "...";
    } else {
        $newString = $string;
    }
    return $newString;
}

function addtocart($match_id, $ticket_id, $qty, $price) {
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $pFlag = FALSE;
        foreach ($_SESSION['cart'] as $skey => $iSeller) {
            foreach ($iSeller as $pkey => $iProduct) {
                if (($ticket_id == $iProduct['ticket_id'])) {
                    $_SESSION['cart'][$skey][$pkey]['qty'] = $qty;
                    $pFlag = TRUE;
                    break;
                }
            }
        }
        if ($pFlag == FALSE) {
            $aryProduct = array(
                'ticket_id' => $ticket_id,
                'qty' => $qty,
                'price' => $price
            );
            $_SESSION['cart'][$match_id][] = $aryProduct;
        }
    } else {
        //Shopping Bag is empty here show create the session for shopping bag.
        $aryProduct = array(
            'ticket_id' => $ticket_id,
            'qty' => $qty,
            'price' => $price
        );
        $_SESSION['cart'][$match_id][] = $aryProduct;
    }
}

function email_type_value($email_key, $EmailtypeAry) {
    if (count($EmailtypeAry) > 0) {
        foreach ($EmailtypeAry as $key => $value) {
            if ($email_key == $key) {
                $type = $value;
            }
        }
    }
    return $type;
}

function waterimg($img) {
    $stamp = imagecreatefrompng('images/watermark.png');

    $ext = strtolower(substr($img, strrpos($img, '.') + 1));


    if ($ext == 'png') {
        $im = imagecreatefrompng($img);
        imagecolortransparent($im, imagecolorat($im, 0, 0));
    } elseif ($ext == 'gif') {
        $im = imagecreatefromgif($img);
    } else {
        $im = imagecreatefromjpeg($img);
    }



// Set the margins for the stamp and get the height/width of the stamp image

    $marge_right = 10;
    $marge_bottom = 10;

    $sx = imagesx($stamp);
    $sy = imagesy($stamp);


// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
// Output and free memory

    header('Content-type: image/jpg');
    imagepng($im);

    return imagepng($im);
    imagedestroy($im);
}

function getimg($url) {
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg, image/png, image/jpg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    curl_close($process);

    return $return;
}

function abuse($aryText) {
    global $db;
    $aryData = array();
    $abuse = $db->getRows("select * from abuse where status = 1");
    if (count($abuse) > 0) {
        foreach ($abuse as $iabuse) {
            $aryData[] = $iabuse['text_word'];
        }
        $data = array_intersect($aryData, $aryText);
        if (count($data) > 0) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

function getPageDesc($linkname = '', $type = '') {
    if ($linkname != "") {
        $data = mysqli_query("select short_description,pbody,id from cms where id='" . $linkname . "'");
        $iData = mysqli_fetch_array($data);
        if ($iData['short_description'] != "" && $type == 'desc') {
            return $iData['short_description'];
        } elseif ($type == 'pbody') {
            return $iData['pbody'];
        } elseif ($iData['id'] != "" && $type == 'id') {
            return $iData['id'];
        } else {
            return "";
        }
    }
}

function backup_tables($host, $user, $pass, $name, $tables = '*', $where = "", $userid = "") {

    $link = mysqli_connect($host, $user, $pass);
    mysqli_select_db($name, $link);

    //get all of the tables  
    if ($tables == '*') {
        $tables = array();
        $result = mysqli_query('SHOW TABLES');
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    //cycle through  
    foreach ($tables as $table) {
        $result = mysqli_query('SELECT * FROM ' . $table . ' ' . $where);

        $num_fields = mysqli_num_fields($result);

        //  $return.= 'DROP TABLE '.$table.';';  
        // $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));  
        //$return.= "\n\n".$row2[1].";\n\n";  

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysql_fetch_row($result)) {

                $return.= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return.= '"' . $row[$j] . '"';
                    } else {
                        $return.= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return.= ',';
                    }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    //save file  

    $handle = fopen('backup/' . $name . '-' . $userid . '-' . date("d-m-Y-H-i-s") . '.sql', 'w+');
    fwrite($handle, $return);
    fclose($handle);
}

function excapestringdb($value) {
    return mysql_escape_string($value);
}

function eurototime($datef) {
    //$date = str_replace('/', '-', $datef);
    return date('Y-m-d', strtotime($datef));
}

function usatotime($datef) {
    //$date = str_replace('/', '-', $datef);
    return date('m/d/Y', strtotime($datef));
}

function sortby($sortby, $fieldname, $default) {
    if ($sortby == "0") {
        $sortby = "order by " . $default . " desc";
    } else {
        $sortby = "order by " . $fieldname . " " . $sortby . "";
    }
    return $sortby;
}

function breadcrumb($pagename, $pagetitle) {
    global $db;
    if (isset($_SESSION[LOGIN_USER]['user_id'])) {
        $aryUser = $db->getRow("select * from users where user_id='" . $_SESSION[LOGIN_USER]['user_id'] . "' and utype!=0");
        //$prefix=$db->getVal("SELECT prefix FROM `stores` WHERE store_id=".$aryUser['store_id']."");
        $username = '<a href="' . href("myaccount_file.php") . '" style="color:#3C3F41!important;">' . $aryUser['fullname'] . '</a>';
        $sdq = $prefix . $aryUser['customer_id'];
        if ($pagetitle == "") {
            $pagetitle = 'Package Listing';
        }
        $result = '<div class="breadcrumb">';
        $result.='<div class="block"><img src="' . URL_IMG . 'icontitle.png" align="absmiddle" /> ' . ucfirst($pagetitle);
        $result.='<div class="loguser">';
        $result.='Logged in como <strong>' . ucfirst($username) . ' | ' . $sdq . '</strong>';
        $result.='<div class="log"><a href="' . href("logout_file.php") . '"><img src="' . URL_IMG . 'oginicon.png" align="absmiddle" /> Logout</a></div>';
        $result.='</div></div></div>';
    } else {
        $result = '<div class="breadcrumb">';
        $result.='<div class="block"><img src="' . URL_IMG . 'icontitle.png" align="absmiddle" /> ' . ucfirst($pagetitle);
        $result.='<div class="loguser">';
        $result.='<div class="log"><a href="' . URL_ROOT . '"><img src="' . URL_IMG . 'oginicon.png" align="absmiddle" /> Login</a></div>';
        $result.='</div></div></div>';
    }

    return $result;
}

function checkmail_preference($userid) {
    global $db;
    $isMailPref = $db->getRows("select mail_preference from mail_preferences where user_id='" . $userid . "'");
    if (count($isMailPref) > 0) {
        foreach ($isMailPref as $iPref) {
            $xmail[] = $iPref['mail_preference'];
        }
    }
    return $xmail;
}

function convertprice($price) {
    global $db;
    $arySettings = fetchSetting(array('exchange_rate'));
    return number_format(($arySettings['exchange_rate'] * $price), 2);
}

function convertpaypalprice($price) {
    global $db;
    $arySettings = fetchSetting(array('exchange_rate'));
    return ($arySettings['exchange_rate'] * $price);
}

function dmytomdytime($datef) {
    $newdate = explode("/", $datef);
    return $newdate[2] . '-' . $newdate[1] . '-' . $newdate[0];
}

function getAddress($fullname, $address, $city, $state, $country, $postcode) {
    global $db;
    $data = array();
    if ($fullname != "") {
        $data[] = $fullname;
    }
    if ($address != "") {
        $data[] = $address;
    }
    if ($city != "") {
        $data[] = $city;
    }
    if ($state != "") {
        $data[] = $state;
    }
    if ($country != "") {
        $name = $db->getVal("select name from country where id=" . $country . "");
        $data[] = $name;
    }
    if ($postcode != "") {
        $data[] = $postcode;
    }
    if (count($data) > 0) {
        return ucwords(strtolower(implode(", ", $data)));
    } else {
        return 'NA';
    }
}

//function translate($data)
//{
//	global $db;
//	if(isset($_SESSION['language']) && $_SESSION['language']=='')
//	{
//		$val = $db->getVal("SELECT french FROM translate where english='$data'");	
//	}
//	else
//	{ 
//	$val = $db->getVal("SELECT ".$_SESSION['language']." FROM translate where english='$data'");
//	}
//	if($val==''){
//		return $data;
//				}else{
//					return $val;
//					 }
//	
//}
function total_Charmer($user_id) {
    global $db;
    $val = $db->getVal("SELECT count(cid) FROM charmer WHERE charmer_to='" . $user_id . "'");
    if ($val == '') {
        return $data;
    } else {
        return 0;
    }
}

function total_unseen_Charmer($user_id) {
    global $db;
    $val = $db->getVal("SELECT count(cid) FROM charmer WHERE charmer_to='" . $user_id . "' is_seen=0");
    if ($val == '') {
        return $data;
    } else {
        return 0;
    }
}

function total_adopt($user_id, $gender) {
    global $db;
    if ($gender == 1) {
        $ta = $db->getVal("SELECT count(book_id) FROM book_cart WHERE book_by='" . $user_id . "' AND book_status=1");
    } else {
        $ta = $db->getVal("SELECT count(book_id) FROM book_cart WHERE book_to='" . $user_id . "' AND book_status=1");
    }
    if ($ta != '') {
        return $ta;
    } else {
        return 0;
    }
}

function total_due_adopt($user_id, $gender) {
    global $db;
    if ($gender == 1) {
        $ta = $db->getVal("SELECT count(book_id) FROM book_cart WHERE book_by='" . $user_id . "' AND book_status=1 AND book_date > CURDATE()");
    } else {
        $ta = $db->getVal("SELECT count(book_id) FROM book_cart WHERE book_to='" . $user_id . "' AND book_status=1 AND book_date > CURDATE()");
    }
    if ($ta != '') {
        return $ta;
    } else {
        return 0;
    }
}

function total_message($user_id, $gender) {
    global $db;
    if ($gender == 1) {
        $msg = $db->getVal("SELECT count(msg_id) FROM msg_initiate WHERE msg_from='" . $user_id . "'");
    } else {
        $msg = $db->getVal("SELECT count(msg_id) FROM msg_initiate WHERE msg_to='" . $user_id . "'");
    }
    if ($msg != '') {
        return $msg;
    } else {
        return 0;
    }
}

function total_inbox_message($user_id, $gender) {
    global $db;
    if ($gender == 1) {
        $msg = $db->getVal("SELECT count(msg_id) FROM msg_initiate WHERE msg_from='" . $user_id . "' AND del_from!=1");
    } else {
        $msg = $db->getVal("SELECT count(msg_id) FROM msg_initiate WHERE msg_to='" . $user_id . "' AND del_to!=1");
    }
    if ($msg != '') {
        return $msg;
    } else {
        return 0;
    }
}

function total_visit($user_id) {
    global $db;
    if ($gender == 1) {
        $tv = $db->getVal("SELECT count(vid) FROM profile_visits WHERE visit_to='" . $user_id . "' and is_seen='0'");
    } else {
        $tv = $db->getVal("SELECT count(vid) FROM profile_visits WHERE visit_to='" . $user_id . "' and is_seen='0'");
    }
    if ($tv != '') {
        return $tv;
    } else {
        return 0;
    }
}

function signup_email($content, $logo, $user_name, $to) {
    $subject = "Areevu Registration Email";
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


    $check = mail_template_or($to, $body, $subject);
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

function forgot_password_mail($content, $logo, $user_name, $password, $to) {
    $subject = "Areevu Forgot Password Email";
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
    $body = str_replace('$password', $password, $body);
    $check = mail_template_or($to, $body, $subject);
}

function invite_users_email($content, $logo, $user_type, $invitation_link, $to) {
    $subject = "Areevu Invite Notification";
    $body1 = '<table border="0" cellpadding="0" cellspacing="0" width="50%">
				<tr>
				 <td>
				  <img src="' . $logo . '" alt="" width="15%" height="50" style="display: block;" />
				 </td>
				</tr>
			   </table>';
    $body = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $content);
    $body = str_replace('$logo', $body1, $body);
    $body = str_replace('$user_type', $user_type, $body);
    $body = str_replace('$invitation_link', $invitation_link, $body);
    $check = mail_template_or($to, $body, $subject);
}

function notification_email($content, $logo, $user_name, $to) {
    $subject = "Areevu Notification";
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

function newsletter_email($content, $logo, $user_name, $to) {
    $subject = "Areevu Newsletter";
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

function get_usertype($id) {
    global $db;
    $role = $db->getRow("Select role_name,label_name,id from role where id='" . $id . "' and status=1 and deleted=1");

    if ($role['id'] == 1) {
?><?= $role['label_name'] ?><?php } elseif ($role['id'] == 2) {
?><?= $role['label_name'] ?><?php } elseif ($role['id'] == 3) {
?><?= $role['label_name'] ?><?php } elseif ($role['id'] == 4) {
?><?= $role['label_name'] ?><?php } elseif ($role['id'] == 5) {
?><?= $role['label_name'] ?><?php

    } else {
        echo "-";
    }
}

function time_seconds($time) {
    $seconds = 0;
    $parts = explode(':', $time);
    if (count($parts) > 2) {
        $seconds += $parts[0] * 3600;
    }
    $seconds += $parts[1] * 60;
    $seconds += $parts[2];
    return $seconds;
}

?>