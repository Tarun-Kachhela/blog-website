<?php

$to = "someone@someone.com";
$subject = "Test mail";


$message = "<b>This is message";

$header = "From:ht@sl.com\r\n";
$header .= "CC:abc@gmail.com\r\n";
$header .= "MIME-version: 1.0\r\n";
$header .= "Content-Type: text/html\r\n";
//echo $header;
if(mail($to,$subject,$message,$header)){
    echo  "sent";

}else{
    echo "failed";
}