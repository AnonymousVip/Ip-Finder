<?php
error_reporting(0);
$tok = '1351864369:AAHpy_rzaNtqmAQya56nkYrcm52uXAWDP6s';

$update = file_get_contents('php://input');
$update = json_decode($update, true);

$mid = $update['message']['message_id'];
$uid = $update['message']['from']['id'];
$fname = $update['message']['from']['first_name'];
$lname = $update['message']['from']['last_name'];
$uname = $update['message']['from']['username'];
$text = $update['message']['text'];
$fullname = ''.$fname.''.$lname.'';
 $message = "<b>Hey! $fullname,\nI am Ip Finder Bot \n I Will Help You In Checking The Details Of Any I P...  \nOnly Thing You Must Do Is To Type /detail and Then Type The Ip Address... \n Example => <code> /detail 127.0.0.1 </code> \n Remember That There Is Only one Space Between <code>/detail and Ip Address</code>\n❤️ Bot Made With  PHP ❤️  \n</b>";

function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
} 
function send($method, $data){
    $url = "https://api.telegram.org/bot$tok/$method";

    if(!$curld = curl_init()){
        exit;
    }
    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curld);
    curl_close($curld);
    return $output;
}


$ch2 = curl_init( ); 
curl_setopt($ch2, CURLOPT_URL, "https://api.telegram.org/bot1391161450:AAG-1SnylDUWVbHse8h_96qFya57GPFcjeg/getChatMembersCount?chat_id=1391161450"); 
curl_setopt($ch2, CURLOPT_POST, false); 
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 
$output2 = curl_exec($ch2); 
$json2 = json_decode($output2,true);
curl_close($ch2);
$tot = $json2['result'];
//echo $output2;


if ($text == '/start') {


$keyboard = [
    'inline_keyboard' => [
        [
            ['text' => 'Feedback Us', 'url' => 'http://t.me/Thugscripts_help_bot']
        ]
    ]
];
$encodedKeyboard = json_encode($keyboard);
    $post = [
        'chat_id' => ''.$uid.'',
        'caption' => ''.$message.'',
        'parse_mode' => 'HTML',
        'reply_to_message_id'=>''.$mid.'',
        'reply_markup' => $encodedKeyboard,
        'photo'=>'https://i.pinimg.com/originals/fd/a1/3b/fda13b9d6d88f25a9d968901d319216a.jpg',
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"https://api.telegram.org/bot1351864369:AAHpy_rzaNtqmAQya56nkYrcm52uXAWDP6s/sendPhoto?");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($curl);
echo $response;

}
elseif(startsWith($text,'/detail')){
    $ip =  urlencode(str_replace('/detail ', "",$text));
    $ch = curl_init( ); 
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/$ip?fields=status,message,continent,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,isp,org,as,asname,reverse,mobile,proxy,hosting,query"); 
curl_setopt($ch, CURLOPT_POST, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
$json1 = json_decode($output,true);
curl_close($ch);
echo $output;
$status = $json1['status'];
$continent = $json1['continent'];
$country = $json1['country'];
$cc = $json1['countryCode'];
$region = $json1['region'];
$state = $json1['regionName'];
$city = $json1['city'];
$district = $json1['district'];
$zip = $json1['zip'];
$lat = $json1['lat'];
$lon = $json1['lon'];
$tz = $json1['timezone'];
$isp = $json1['isp'];
$org = $json1['org'];
$as = $json1['as'];
$asname = $json1['asname'];
$reverse = $json1['reverse'];
$mobile = $json1['mobile'];
$proxy = $json1['proxy'];
$hosting = $json1['hosting'];
$message2 = $json1['message'];
if ($message2 == true) {
  $messa = "<b> Please Provide Valid IP My Dear..🥺 </b>";
 $post1 = [
        'chat_id' => ''.$uid.'',
        'text' => ''.$messa.'',
        'parse_mode' => 'HTML',
        'reply_to_message_id'=>''.$mid.'',
    ];
             $curl1 = curl_init();
    curl_setopt($curl1, CURLOPT_URL,"https://api.telegram.org/bot".$tok."/sendMessage?");
    curl_setopt($curl1, CURLOPT_POST, 1);
    curl_setopt($curl1, CURLOPT_POSTFIELDS, $post1);
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, 0);
$response1 = curl_exec($curl1);
echo $response1;
}
else{
    $messu = "Details Of The IP => $ip
Status => $status
Continent => $continent
Country => $country
Country Code => $cc
Zip Code => $zip
Region => $region
State => $state
City => $city
District => $district
Time Zone => $tz
Latitude => $lat
Longitude => $lon
Isp => $isp
Organisation => $org 
As => $as
As Name => $asname";

 $post12 = [
        'chat_id' => ''.$uid.'',
        'text' => ''.$messu.'',
        'parse_mode' => 'HTML',
        'reply_to_message_id'=>''.$mid.'',
    ];
    send("sendMessage",$post12);
             $curl1 = curl_init();
    curl_setopt($curl1, CURLOPT_URL,"https://api.telegram.org/bot".$tok."/sendMessage?");
    curl_setopt($curl1, CURLOPT_POST, 1);
    curl_setopt($curl1, CURLOPT_POSTFIELDS, $post12);
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, 0);
$response1 = curl_exec($curl1);
echo $response1;
}
}
else{
    echo "Not Found";
}