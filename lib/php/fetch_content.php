<?php
echo "Top of file<br>";
include('simplehtmldom/simple_html_dom.php');
$html = file_get_html('http://www.9gag.com/hot/');
echo "html received<br>";

/***Get HOT content***/
$content = "";
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/hot/2');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/hot/3');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/hot/4');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/hot/5');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
echo "parsing done<br>";
$filename = 'cache/hot.html';

/**clean file**/
$fp = fopen("$filename", w);
fclose($fp);
/**clean file done**/

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

    echo "Success, wrote to file ($filename)";

    fclose($handle);

} else {
    echo "The file $filename is not writable";
}
/***End of get HOT content ***/
/***Get TRENDING content***/
$content = "";//nullify content
$html = file_get_html('http://www.9gag.com/trending/');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/trending/2');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/trending/3');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/trending/4');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/trending/5');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
echo "parsing done<br>";
$filename = 'cache/trending.html';

/**clean file**/
$fp = fopen("$filename", w);
fclose($fp);
/**clean file done**/

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

    echo "Success, wrote to file ($filename)";

    fclose($handle);

} else {
    echo "The file $filename is not writable";
}
/***End of get TRENDING content***/
/***Get VOTE content***/
$content = "";//nullify content
$html = file_get_html('http://www.9gag.com/vote/');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/2');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/3');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/4');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/5');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/6');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/7');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/8');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/9');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
$html = file_get_html('http://www.9gag.com/vote/10');
foreach ($html->find('.entry-item') as $li ) {
	if($li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=""&&$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src!=NULL){
		$content .= '<div class="content">';
		$content .= '<div class="alt">'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->alt.'</div>';
		$content .= '<div class="image"><img src="'.$li->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->src.'" /></div>';
	}
}
echo "parsing done<br>";
$filename = 'cache/vote.html';

/**clean file**/
$fp = fopen("$filename", w);
fclose($fp);
/**clean file done**/

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

    echo "Success, wrote to file ($filename)";

    fclose($handle);

} else {
    echo "The file $filename is not writable";
}
/***End of get VOTE content***/
?>