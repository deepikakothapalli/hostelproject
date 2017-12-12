<?php

//Your authentication key
$authKey = "175951ApBZSN4Cdx159c4e2fd";

//Multiple mobiles numbers separated by comma
$mobileNumber = "9666695357";

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "hostel";

//Your message to send, Add URL encoding here.
$message = urlencode("https://control.msg91.com/api/sendhttp.php?authkey=175951ApBZSN4Cdx159c4e2fd&mobiles=9666695357&message=hi&sender=hostel&route=4&country=91");

//Define route 
$route = "default";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="https://control.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;
?>