<?php

//this code identifies IP addresses that begin with "202" and denies them access to the download options

$deny = array("202.*.*.*");

if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
  include($_SERVER['DOCUMENT_ROOT']."denialofservice.html");
  exit();
} else {

// these functions will discover the user's operating system and browser combo 
//and translate them into more intelligible language using associative arrays

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 6.2/i'     =>  'Windows',
                            '/windows nt 6.1/i'     =>  'Windows',
                            '/windows nt 6.0/i'     =>  'Windows',
                            '/windows nt 5.2/i'     =>  'Windows',
                            '/windows nt 5.1/i'     =>  'Windows',
                            '/windows xp/i'         =>  'Windows',
                            '/windows nt 5.0/i'     =>  'Windows',
                            '/windows me/i'         =>  'Windows',
                            '/win98/i'              =>  'Windows',
                            '/win95/i'              =>  'Windows',
                            '/win16/i'              =>  'Windows',
                            '/macintosh|mac os x/i' =>  'Mac OS',
                            '/mac_powerpc/i'        =>  'Mac OS',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();
}

//this code checks to make sure the user's operating system and browser are compatible with the software 
//and sends the user to the appropriate page to download the software if the systems are compatible

if ($user_os == 'Mac OS' && $user_browser == 'Firefox') {
//header("location: http://dianaprince.usersource.com/downloadMac.html");
//include($_SERVER['DOCUMENT_ROOT']."downloadMac.html");
include($_SERVER['DOCUMENT_ROOT']."downloadInputForm.php");
$redirect = "?redirect=downloadMac.html";
} else if ($user_os == 'Mac OS' && $user_browser != 'Firefox') {
//header("location: http://dianaprince.usersource.com/downloadFirefox.html");
//include($_SERVER['DOCUMENT_ROOT']."downloadFirefox.html");
include($_SERVER['DOCUMENT_ROOT']."downloadInputForm.php");
$redirect = "?redirect=downloadFirefox.html";
} else if ($user_os == 'Windows' && $user_browser == 'Firefox') {
//header("location: http://dianaprince.usersource.com/downloadWin-FF.html");
//include($_SERVER['DOCUMENT_ROOT']."downloadWin-FF.html");
include($_SERVER['DOCUMENT_ROOT']."downloadInputForm.php");
$redirect = "?redirect=downloadWin-FF.html";
} else if ($user_os == 'Windows' && $user_browser == 'Internet Explorer') {
//header("location: http://dianaprince.usersource.com/downloadWin-IE.html");
//include($_SERVER['DOCUMENT_ROOT']."downloadWin-IE.html");
include($_SERVER['DOCUMENT_ROOT']."downloadInputForm.php");
$redirect = "?redirect=downloadWin-IE.html";
}  else {
//include($_SERVER['DOCUMENT_ROOT']."downloadGeneric.html");
include($_SERVER['DOCUMENT_ROOT']."downloadInputForm.php");
$redirect = "?redirect=downloadGeneric.html";
}

?>