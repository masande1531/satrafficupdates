<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SA Traffic Updates</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<meta http-equiv="keywords" content="Live traffic reports, Traffic updates, Recent traffic activities, map view on traffic update, free traffic reports" />
<meta http-equiv="description" content="Get your live traffic reports now ,When you travel to work you can easly access the live traffic "/>
<link href="css/style.css"rel="stylesheet" type="text/css" />
<link rel="SHORTCUT ICON" href="images/icon.png"> 
<link rel="stylesheet" type="text/css" href="css/map.css" />
<script type="text/javascript" src="js/OpenLayers-2.12.min.js"></script>
<script type="text/javascript" src="js/tomtom.map.js"></script>
      <script type="text/javascript">
window.onload = function() {
        		
        		tomtom.setImagePath("images/");
        		
        		var map = new tomtom.Map({
        			domNode: "map",
                                apiKey: "Your Tom-Tom API HERE",

                                displayTraffic: true,
        			cookie: false,
                                center: new OpenLayers.LonLat(26.85059, -31.4512),
                                zoom: 6,
        			scale: true,
        			panZoomBar: true
        		});
        		
        		var manager = new tomtom.MarkerManager({ map: map, animation: { effect: "drop", delay: 0, duration: 500 } });
        		
        		map.events.register("mapload", window, function() {
	        		
	        		manager.update();
        		});
        	};
</script>
</head>

<body>
    <div div="logo"><a href="index.php"><h1>Traffic Updates</h1> </a></div>
  
    <? require_once 'router.php'; ?>

<div class="footer">
   <div class="menu">
    <a href="index.php?page=how">How it works</a>
	<a href="index.php?page=view_reports">View Reports</a>
    <a href="index.php?page=report">Report</a>
    <a href="index.php?page=live_traffic">Live Traffic</a>

</div>
   
   <center>
       <a href="index.php?page=about">About</a> | <a href="index.php?page=contact">Contact</a>
                <p><a href="http://www.facebook.com/pages/Satrafficupdates/463800653691299" target="_blank"><img src="images/ficon.jpg" alt="Follow us" /> </a> <a href="https://twitter.com/satrafficupdate" target="_blank"><img src="images/ticon.png" alt="Follow us"/></a>developed By <a href="http://masande.comuv.com/" target="_blank">Masande</a></p>
   </center>
</div>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38947515-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
