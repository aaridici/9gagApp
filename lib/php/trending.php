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
/***Get trending content***/
$next = "/trending/";
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
$tabIndex = 1;
$content = "";
/*****PERSISTANT CONNECTION TO DB*****/
$link = mysql_pconnect('lab1.fatcowmysql.com', '9gag', 'ZomG3pol56'); 
if (!$link) { 
	die('Could not connect: ' . mysql_error()); 
}
mysql_select_db('9gag');
/*****END OF DB CONNECTION*****/

while($i<3){
	$file_url = 'http://9gag.com' . $next;
	$html = file_get_html($file_url);
	foreach ($html->find('.entry-item') as $li ) {
		if(@$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
			$content .= '<a name="trending'.$tabIndex.'"><div style="min-height: 90px;">&nbsp;</div></a><div class="content" tabindex="'.$tabIndex.'">';
			$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
			$content .= '<div class="image"><a onclick="popUpImage(\'popup_trending_'.$tabIndex.'\');"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></a></div>';
			$content .= '<div id="popup_trending_'.$tabIndex.'" class="popup hidden" data-rel="popup"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div><script>$(\'#popup_'.$tabIndex.'\').popup();</script>';
			$query = "SELECT * FROM trending_archieve WHERE url='".mysql_real_escape_string($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src)."' ";
			$result = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($result)<1){
				$query = "INSERT INTO trending_archieve (label,url)VALUES('".mysql_real_escape_string($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt)."','".mysql_real_escape_string($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src)."')";
				$result = mysql_query($query) or die(mysql_error());
			}
			$tabIndex++;
		}
	}
	$next = $html->find('a[id=next_button]',0)->href;
	if(@$next_modifier!=0&&@$next_modifier!="0"&&$i==0){
		$content = "";
	}
	$i = $i+1;
}
echo($content);
?>