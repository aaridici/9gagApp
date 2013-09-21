<?php
include('lib/php/functions.php');
getUserInfo();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Funny Images from 9gag" />
<meta name="keywords" content="9, nine, gag, 9gag, ninegag, fun, funny, image, images, post, posts, hot, trending, vote, new, android, fan, app, reader, rss, amazon, market, place, marketplace, store, appstore, web, application, 9gag.com, aaridici, aaridici.com, ardaaridici, ardaaridici.com" />
<title>9Gag Reader Fan App</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link href="lib/css/style.css" rel="stylesheet" type="text/css" />
<link href="lib/js/jquery.mobile-1.2.0/jquery.mobile-1.2.0.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.mobile-1.2.0/jquery.mobile-1.2.0.min.js"></script>
<script type="text/javascript">
var hotCurrent = '/hot/';
var trendingCurrent = '/trending/';
var hotCount = 0;
var trendingCount = 0;
var loadingText = "Please wait while the content is loading...\n\n\nPlease rate & review the app on Amazon. Your reviews will be taken into account";
var inAppLoadingText = "Please wait while the content is loading...";
var limitHTML = '<div style="height:100%; width:400px; vertical-align:middle; font-family: \'Droid Sans\', sans-serif; margin-left:auto; margin-right:auto; color:#000000;"><br><br><br><br><br><p><h2>You have reached your limit of next posts. You can choose to <input type="button" value="Reload" onClick="window.location.reload()"> this app to get newer content.<br><br>If you want more content, you may want to upgrade to <a href="http://www.amazon.com/dp/B0070Z76PA" target="_window" style="text-decoration:none;">9gag Fan App Premium</a>. It will be available on the Kindle Fire shortly.</h2></p></div>';

var hotNextButton = '<br /><center><a name="hot31" href="#" id="hot_next_button" data-role="button" data-theme="a" data-inline="true" data-mini="true" style="min-width:100px;" onclick="hotNext();">Next</a></center>';

var trendingNextButton = '<br /><center><a name="trending31" href="#" id="trending_next_button" data-role="button" data-theme="a" data-inline="true" data-mini="true" style="min-width:100px;" onclick="trendingNext();">Next</a></center>';

var tabIndex = 0;

var hotOrTrending = "hot";

function hotNext(){
	tabIndex = 1;
	location.href = '#'+hotOrTrending+'1';
	
	$('#hot_next_button').addClass('ui-disabled');
	$.mobile.loading('show',{ theme: "a", text: inAppLoadingText, textonly: false ,textVisible:true})
	if(hotCount<5){
		$.get('lib/php/hot_next.php?next='+hotCurrent,[],function(hotHTMLNext){
			hotCurrent = hotHTMLNext;
			$.get('lib/php/hot.php?next='+hotCurrent,[],function(hotHTML){
				$('document').scrollTop();
				$('#hot_content').html(hotHTML+hotNextButton);
				$('#hot_next_button').button();
				$.mobile.loading('hide');
				$('#hot_content').trigger('create');
				hotCount++;
			});
		});
	}else{
		  $.mobile.loading('hide');
		  $('#hot_content').html(limitHTML);
		  $('#hot_content').trigger('create');
	}
}

function trendingNext(){
	tabIndex = 1;
	location.href = '#'+hotOrTrending+'1';
	
	$('#trending_next_button').addClass('ui-disabled');
	$.mobile.loading('show',{ theme: "a", text: inAppLoadingText, textonly: false ,textVisible:true})
	if(trendingCount<5){
		$.get('lib/php/trending_next.php?next='+trendingCurrent,[],function(trendingHTMLNext){
			trendingCurrent = trendingHTMLNext;
			$.get('lib/php/trending.php?next='+trendingCurrent,[],function(trendingHTML){
				$('document').scrollTop();
				$('#trending_content').html(trendingHTML+trendingNextButton);
				$('#trending_next_button').button();
				$.mobile.loading('hide');
				$('#trending_content').trigger('create');
				trendingCount++;
			});
		});
	}else{
		  $.mobile.loading('hide');
		  $('#trending_content').html(limitHTML);

		  $('#trending_content').trigger('create');
	}
}

function switchToHot(){
	hotOrTrending = "hot";
	
	tabIndex = 1;
	location.href = '#'+hotOrTrending+'1';
	
	$('#hot_button').addClass('ui-disabled');
	$('#trending_button').removeClass('ui-disabled');
	

	$('#hot_button_footer').addClass('ui-disabled');
	$('#trending_button_footer').removeClass('ui-disabled');
	
	$('#trending_content').hide();
	$('#hot_content').show();
	
	$('document').scrollTop();
	$('#hot_content').trigger('create');
}

function switchToTrending(){
	hotOrTrending = "trending";
	
	tabIndex = 1;
	location.href = '#'+hotOrTrending+'1';
	
	$('#trending_button').addClass('ui-disabled');
	$('#hot_button').removeClass('ui-disabled');
	
	$('#trending_button_footer').addClass('ui-disabled');
	$('#hot_button_footer').removeClass('ui-disabled');
	
	$('#hot_content').hide();
	$('#trending_content').show();
	
	$('document').scrollTop();
	$('#trending_content').trigger('create');
}

function nextPost(){
	tabIndex++;
	if(tabIndex>31){
		tabIndex = 31;
	}
	location.href = '#'+hotOrTrending+tabIndex;
}

function previousPost(){
	tabIndex--;
	if(tabIndex<1){
		tabIndex = 1;
	}
	location.href = '#'+hotOrTrending+tabIndex;
}

function popUpImage(_imgDiv){
	$('#'+_imgDiv).popup();
	$('#'+_imgDiv).removeClass('hidden');
	var maxHeight = $('body').height() - 60 + "px";
    $( ".popup img").css( "max-height", maxHeight );
	$('#'+_imgDiv).popup('open');
	$('#'+_imgDiv).bind({
		popupafterclose: function(event, ui) {
			location.href = '#' + tabIndex;
		}
	});
}

$(document).ready(function(e) {
	$('#hot_button').addClass('ui-disabled');
	$('#trending_button').addClass('ui-disabled');
	
	$('#hot_button_footer').addClass('ui-disabled');
	$('#trending_button_footer').addClass('ui-disabled');
	
	$.mobile.loading('show',{ theme: "a", text: loadingText, textonly: false ,textVisible:true});
    $.get('lib/php/hot.php?next='+hotCurrent,[],function(hotHTML){
		hotHTML+=hotNextButton;
		$('#hot_content').html(hotHTML);
		$('#hot_next_button').button();
		$.mobile.loading('hide');
		$('#hot_content').show();
		$('#footer').show();
		$('#hot_content').trigger('create');
		
		$.get('lib/php/trending.php?next='+trendingCurrent,[],function(trendingHTML){
			trendingHTML+=trendingNextButton;
			$('#trending_content').html(trendingHTML);
			$('#trending_next_button').button();
			$('#trending_button').removeClass('ui-disabled');
			$('#trending_button_footer').removeClass('ui-disabled');
			$('#trending_content').trigger('create');
		});
		
		
	});
});

</script>
</head>

<body>

<div data-role="page">

	<div data-role="header" data-position="fixed">
		<h1>9gag Fan App</h1>
        <center>
        	<a href="#" id="hot_button" onclick="switchToHot();" data-role="button" data-theme="a" data-inline="true" data-mini="true" style="min-width:100px;">Hot</a>
            <a href="#" id="trending_button" onclick="switchToTrending();" data-role="button" data-theme="a" data-inline="true" data-mini="true" style="min-width:100px;">Trending</a>
        </center>
	</div><!-- /header -->
    
    <div id="hot_content" data-role="content" style="display:none; z-index:90;">
    </div>
    
    <div id="trending_content" data-role="content" style="display:none; z-index:90;">
    </div>
    
    <div id="footer" data-role="footer" style="display:none;">
        <center>
        	<a href="#" id="hot_button_footer" onclick="switchToHot();" data-role="button" data-theme="a" data-inline="true" data-mini="true" style="min-width:100px;">Hot</a>
            <a href="#" id="trending_button_footer" onclick="switchToTrending();" data-role="button" data-theme="a" data-inline="true" data-mini="true" style="min-width:100px;">Trending</a>
        </center>
        <h1>9gag Fan App</h1>
	</div><!-- /header -->
    
    
    <div class="anchor_navigator_next">
    	<a onclick="nextPost();"><img src="lib/css/images/down_arrow.png" /></a>
    </div>
    <div class="anchor_navigator_previous">
    	<a onclick="previousPost();"><img src="lib/css/images/up_arrow.png" /></a>
    </div>

</div><!-- /page -->
</body>
</html>