<?php
include('simplehtmldom/simple_html_dom.php');
/***Get vote content***/
$next = "/vote/";
$i = 0;
$content = "";
while($i<20){
	$file_url = 'http://9gag.com' . $next;
	$html = file_get_html($file_url);
	foreach ($html->find('.entry-item') as $li ) {
		if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
			$content .= '<div class="content">';
			$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
			$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
		}
	}
	$next = $html->find('a[id=jump_next]',0)->href;
	$i = $i+1;
}
echo($content);
?>