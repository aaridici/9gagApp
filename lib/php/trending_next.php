<?php
include('simplehtmldom/simple_html_dom.php');
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2');
$header = array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
    'Accept-Language: en-us;q=0.8,en;q=0.6'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: __qca=P0-1700194650-1306031923659; __gads=ID=98b460e75e5ea88f:T=1306094510:S=ALNI_MafSLzYtpevxaw9TgiW86nr4FMwgA; exp_email_sub=1; exp_sub_show_cnt_1=-1; exp_shuffle_test=0; exp_sub_show_cnt_2=-1; exp_flip=1; exp_headbar_bookmark=-1; exp_withnow_ads=0; exp_withnow_ads_1=1; exp_signup_btn_color=0; PHPSESSID=qfl7frs4etj3un4aio2p5tqmc7; isSnowing=1; vvall-grid-promotion=1; __utma=235148638.1242699795.1310273557.1324352384.1324521588.481; __utmb=235148638.12.10.1324521588; __utmc=235148638; __utmz=235148638.1323385494.453.302.utmcsr=facebook.com|utmccn=(referral)|utmcmd=referral|utmcct=/l.php; AWSELB=DB1DB151124C8C9CE509698A4BF8088C193C8354D5C8EB87A171804E0C8AED0BD671A3482B181EBB840980769726971413247C485E24B2C77E1A6EEE842A1CDB823D426215"
  )
);

$context = stream_context_create($opts);
/***Get trending content***/
if(isset($_GET["next"])){
	if($_GET["next"]!=""){
		$next = $_GET["next"];
	}else{
		$next = "/trending/";
	}
}else{
	$next = "/trending/";
}
$i = 0;
$content = "";
while($i<3){
	$file_url = 'http://9gag.com' . $next;
	$html = file_get_html($file_url);
	$next = $html->find('a[id=next_button]',0)->href;
	$i = $i+1;
}
echo($next);
?>