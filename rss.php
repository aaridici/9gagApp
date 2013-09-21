<?php
header("Content-Type: text/xml");

include('lib/php/simplehtmldom/simple_html_dom.php');
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2');
$header = array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
    'Accept-Language: en-us;q=0.8,en;q=0.6'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$content = "<items>";
/**Advertisement**/
/*
$content .= '<item>';
$content .= '<title>New 9gag Fan App on Amazon Appstore for Android for FREE!</title>';
$content .= '<description>&lt;img src="http://aaridici.com/9gag/resources/9gag_app_ad.jpg"/&gt;&lt;a href="http://www.amazon.com/gp/product/B006J8NMR0"&gt;9gag Fan App Lite&lt;/a&gt;</description>';
$content .= '<link>http://aaridici.com/9gag/resources/9gag_app_ad.jpg</link>
<guid>http://aaridici.com/9gag/resources/9gag_app_ad.jpg</guid>';
$content .= '</item>';*/
/**End of advertisement**/

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: __qca=P0-1700194650-1306031923659; __gads=ID=98b460e75e5ea88f:T=1306094510:S=ALNI_MafSLzYtpevxaw9TgiW86nr4FMwgA; exp_email_sub=1; exp_sub_show_cnt_1=-1; exp_shuffle_test=0; exp_sub_show_cnt_2=-1; exp_flip=1; exp_headbar_bookmark=-1; exp_withnow_ads=0; exp_withnow_ads_1=1; exp_signup_btn_color=0; PHPSESSID=qfl7frs4etj3un4aio2p5tqmc7; isSnowing=1; vvall-grid-promotion=1; __utma=235148638.1242699795.1310273557.1324352384.1324521588.481; __utmb=235148638.12.10.1324521588; __utmc=235148638; __utmz=235148638.1323385494.453.302.utmcsr=facebook.com|utmccn=(referral)|utmcmd=referral|utmcct=/l.php; AWSELB=DB1DB151124C8C9CE509698A4BF8088C193C8354D5C8EB87A171804E0C8AED0BD671A3482B181EBB840980769726971413247C485E24B2C77E1A6EEE842A1CDB823D426215"
  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set abov


//echo(file_get_contents("htts://9gag.com/",false, $context));
/*
error_reporting(E_ALL); 
$file = 'http://9gag.com/';

if ( file_exists( $file ) ) { 
print 'FILE EXISTS! <br>'; 
$data = file_get_contents("50.18.253.130",false, $context); 
print $data; 
} else { 
print 'FILE DOES NOT EXIST!'; 
}*/


/***Get trending content***/
$next = "/trending/";
$i = 0;
$prev_link = "";
while($i<3){
	$file_url = 'http://9gag.com' . $next;
	$html = file_get_html($file_url);
	
	//echo($html);
	foreach($html->find('.entry-item') as $li ) {
		if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
			if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=$prev_link){
				$content .= '<item>';
				$content .= '<title>'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</title>';
				$content .= '<description>&lt;img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /&gt;</description>';
				$content .= '<link>'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'</link>';
				$content .= '<guid>'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'</guid>';
				$content .= '</item>';
				$prev_link = $li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src;
			}
		}
	}
	$next = $html->find('a[id=jump_next]',0)->href;
	
	$i = $i+1;
}
$content .= '</items>';
echo($content);


/*
$html = explode('<item>',file_get_contents('http://tumblr.9gag.com/rss'),2);

echo($html[0]);
/*
echo('<item>');
echo('<title>New 9gag Fan App on Amazon Appstore for Android for FREE!</title>');
echo('<description>&lt;img src="http://aaridici.com/9gag/resources/9gag_app_ad.jpg"/&gt;&lt;a href="http://www.amazon.com/gp/product/B006J8NMR0"&gt;9gag Fan App Lite&lt;/a&gt;</description>');
echo('<link>http://aaridici.com/9gag/resources/9gag_app_ad.jpg</link>
<guid>http://aaridici.com/9gag/resources/9gag_app_ad.jpg</guid>
<pubDate>Tue, 12 Dec 2011 11:20:58 +0800</pubDate>');
echo('</item>');
echo('<item>');
echo($html[1]);*/
?>