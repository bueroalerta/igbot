<?php
$green  = "\e[1;92m";
$cyan   = "\e[1;36m";
$normal = "\e[0m";
$blue   = "\e[34m";
$green1 = "\e[0;92m";
$yellow = "\e[93m";
$red    = "\e[1;91m";
function getuid($username)
{
    $url      = "https://www.instagram.com/" . $username;
    $html     = file_get_contents($url);
    $arr      = explode('window._sharedData = ', $html);
    $arr      = explode(';</script>', $arr[1]);
    $obj      = json_decode($arr[0], true);
    $id       = $obj['entry_data']['ProfilePage'][0]['graphql']['user']['id'];
    
    return $id;
}

function getmediaid($url)
{
    $getid   = file_get_contents("https://api.instagram.com/oembed/?url=".$url);
    $json1   = json_decode($getid);
    $mediaid = $json1->media_id;
    
    return $mediaid;
}

function req($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if($data):
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    endif;
    $response = curl_exec($ch);
    
    return $response;
}

function version()
{
    return "1.5";
}

function banner()
{
    $string = "
  _   _ _____ _   _    _    _   _ _____ ____  
 | \ | |_   _| | | |  / \  | \ | |  ___|  _ \ 
 |  \| | | | | |_| | / _ \ |  \| | |_  | |_) |
 | |\  | | | |  _  |/ ___ \| |\  |  _| |  __/ 
 |_| \_| |_| |_| |_/_/   \_\_| \_|_|   |_|    
                                              \n";

    return $string;
}

function banner1()
{
    $banner  = "========== Instagram Tools Ver ".version()." ==========\n";

    return $banner;

}

function banner2()
{
    $banner  = "================== Code by ==================\n";
    $banner2 = "============= NTHANFP | AXEC0DE =============\n\n";

    return $banner."".$banner2;
}
?>
