<?php
include('lib/php/functions.php');
getUserInfo();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>9Gag Reader Fan App</title>
<link href="lib/js/sencha-touch-1.1.1/resources/css/android.css" rel="stylesheet" type="text/css" />
<link href="lib/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/js/jquery-1.7.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#loading').hide();
});

</script>
</head>

<body>
<div id="loading" style="width:100%; height:100%; display:block;">
<center>
<br /><br />
<p>Please wait while the content from 9gag is loading... Can take up to 30 seconds.</p><br />
<img src="resources/images/loading.gif" width="275" height="225" /><br />
</center>
</div>
<div id="main" class="main">
<h2 style="background-color:#993333; color: #FFF; padding:10px;">Currently cloudfront.net is having issues. Some ISP's are having problems while resolving their ip addresses. While they work on a fix, the images may not appear on this page!</h2>
<?php
include('lib/php/simplehtmldom/simple_html_dom.php');
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
/***Get vote content***/
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
	foreach ($html->find('.entry-item') as $li ) {
		if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
			$content .= '<div class="contentWP">';
			$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
			$content .= '<div class="imageWP"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
		}
	}
	$next = $html->find('a[id=next_button]',0)->href;
	$i = $i+1;
}
echo($content);
?>
</div>
<div id="bottom_nav" class="bottom_nav">
<a id="next" class="next" style="font-size: 48px;" href="windows2.php?next=<?php echo($next); ?>"><span style="font-size:48px;">Next</span></a>
<br />
<br />
</div>
</body>
</html>