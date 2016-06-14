 <?php
require("connect.php");
require ("functions.php");
require ("lang_hu.php");

$main_url = "http://www.kassaiholmi.sk";
$timenow = time();
$now_year = date("Y",$timenow);
$now_month = date("m",$timenow);
$now_day = date("d",$timenow);
$now_date = date("Y-m-d",$timenow);	

if (!isset($_REQUEST['sort'])) {
	
	$sqlselect = "SELECT * FROM calendar WHERE YEAR(date)='$now_year' AND MONTH(date)='$now_month' AND status='1' ORDER BY date ASC, begin_time ASC";
}

if (isset($_REQUEST['sort'])) {
	
	$sortyear = $_REQUEST['year'];
	$sortmonth = $_REQUEST['month'];
	
	$sqlselect = "SELECT * FROM calendar WHERE YEAR(date)='$sortyear' AND MONTH(date)='$sortmonth' AND status='1' ORDER BY date ASC, begin_time ASC";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Kassai HolMi - Kassai Magyar Események, Programok, Rendezvények</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<meta name="description" content="Kassai Holmi - Kassai Magyar események, programok" />
<meta name="copyright" content="(c) Kikelet Kassa" />
<meta name="GOOGLEBOT" content="noarchive" />
<meta name="language" content="hu" />
<meta name="keywords" content="kassai események, kassai programfüzet, Kassa, Košice, Kikelet, holmi, kassaiholmi" />
<meta property="og:url" content="http://kassaiholmi.sk/" />
<meta property="og:image" content="http://kassaiholmi.sk/images/holmi-facebook-thumb.png" />
<meta property="og:title" content="Kassai HolMi - Kassai Magyar Események, Programok, Rendezvények" />
<meta property="og:description" content="kassaiholmi@kassaiholmi.sk" />
<link rel="stylesheet" type="text/css" href="css/stiluslap.css" />
<link rel="stylesheet" type="text/css" href="css/modalbox.css" />
<link rel="stylesheet" type="text/css" href="css/lightbox.css" />
<script type="text/javascript" src="js/chooser.js" ></script>
<script type="text/javascript" src="js/nevnapok.js" ></script>
<script type="text/javascript" src="js/jquery_1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery_modalbox-1.4.1.js"></script>
<script type="text/javascript" src="js/lightbox.js" ></script>
<script type="text/javascript">
$(function() {
var highestCol = Math.max($('.left_lane').height(),$('.c1').height(),$('.c2').height(),$('.right_lane').height());
$('.left_lane, .c1, .c2, .right_lane').height(highestCol);
} );

function setFade() {
        $( ".blink").fadeOut(1000, function () {
            $(".blink").fadeIn();
        });
        }
        setInterval("setFade();",70);

/* $(document).ready(function(){       
  $("li.show-hide").hide();

  $("a.showhide").click(function(){
  $("li.show-hide").slideToggle("fast",function(){

($("a.showhide").attr('src')=="images/b_open.png")?$("a.showhide").attr("src", "images/b_close.png"):$("a.showhide").attr("src", "images/b_close.png");
  });
  return false;
});
}); */

$(document).ready(function(){       
  $("li.show-hide").hide();

$("a.showhide").click(function(){
  $("li.show-hide").slideToggle("fast");
    $(this).find('img').attr('src',function(i,src){
        return (src.indexOf('images/b_open.png') != -1)? 'images/b_close.png' : 'images/b_open.png';
    })
});

$('.event-icons img').mouseover(function() {
    var tipTxt = $(this).attr('alt');
    var toolTip = $(this).parent().parent().next();
    var position = $(this).offset();
    toolTip.css({ 'top': (position.top - 50) + 'px', 'left': (position.left - 5) });
    toolTip.html(tipTxt + '<div class="arrow-bottom"></div>');
    toolTip.show();
});
$('.event-icons img').mouseout(function() {
    $('.tooltip').empty();
    $('.tooltip').hide();    
});

$('.row1').each(function() {
    var textLength = $(this).children('div').text().length;
    if(textLength > 30) { $(this).children('div').removeClass('event-title'); $(this).children('div').addClass('event-title-long'); }
});

var scroll_text;
$('.row1').hover(function() {
    var $elmt = $(this);
    scroll_text = setInterval(function() {
        scrollText($elmt);
    }, 10);
}, function() {
    clearInterval(scroll_text);
    $(this).find('.event-title-long').css({
        left: 0
    });
});
var scrollText = function($elmt) {
    var left = $elmt.find('.event-title-long').position().left - 1;
    left = -left > $elmt.find('.event-title-long').width() ? $elmt.width() : left;
    $elmt.find('.event-title-long').css({
        left: left
    });
};


});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5851620-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="maincontainer">
	<div id="header">
		<div class="h1"><a href="/"><img src="images/holmi_logo_part1.png" alt="holmi logo" title="Kassai HolMi" /></a></div>
		<div class="h2">
            <script type="text/javascript">        
                document.writeln('<div class="nameday">Ma ' + ev + '. ' + honev(ho) + ' ' + nap + '. (' + napnev(ido.getDay()+1) + '), <strong>' + havinev(ev, ho, nap) + '</strong> napja van.<br />Holnap <strong>' + havinev(ev,ho, nap+1) + '</strong> névnapja lesz.</div>')
            </script>                                    
            <!--<div class="news">
				<form method="post" action="">
				<input type="text" name="email" id="subscribe" onfocus="if(this.value=='feliratkozás hírlevélre')this.value=''" onblur="if(this.value=='')this.value='feliratkozás hírlevélre'" value="feliratkozás hírlevélre" style="margin-right:5px;" /> <input type="submit" name="submit" value="OK" class="button" />
				</form>
			</div>-->
        </div>
		
		<div class="h3"><a href="/"><img src="images/holmi_logo_part2.png" alt="holmi logo" title="Kassai HolMi" /></a></div>
		<div class="h4">
			<div class="menu">
				<ul>
					<li><a href="fooldal" class="menu1">ESEMÉNYNAPTÁR</a></li>
					<li><a href="kuldetesunk" class="menu2">KÜLDETÉSÜNK</a></li>
					<li><a href="fotogaleria" class="menu1">FOTÓGALÉRIA</a></li>
					<li><a href="archivum" class="menu2">ARCHÍVUM</a></li>
					<li><a href="kapcsolat" class="menu1">KAPCSOLAT</a></li>
                    <li><a href="admin" target="_blank" class="menu2">BEJELENTKEZÉS</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="clear"></div>