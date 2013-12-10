<h2 class="head">How It Work
 <? 
 session_start();
 if(isset($_SESSION['username']))
     { echo '{'.$_SESSION['username'].' | <a href="index.php?page=logout">Logout</a>}';
     
     } 
else{
    echo '{<a href="http://satrafficupdates.co.za/index.php?page=login">Login</a>}';
    
    } ?>
</h2>
<div class="content">
        
    <script type="text/javascript">
if ((screen.width < 700))
      {document.write('<p><img src="images/how_it_work - Copy.jpg" alt="How it works"  /></p>')}

else if ((screen.width > 700))
      {document.write('<p ><img src="images/how_it_work.jpg" alt="How it works" /></p>')}
      </script>
        <p><img src="images/up_down.jpg" alt="Move" width="42" height="44" /><br/>Use this control to move up, left, down and right </p>
	<p>&nbsp;&nbsp;&nbsp;<img src="images/zoom_in_out.jpg" alt="Zoom" width="22" height="40" /> <br/>Use this control to zoom in and out. </p>
    
    <h2><u>Summary</u></h2>
    </p>
    <table width="100%" border="0">

      <tr>
        <td width="3%"><img src="images/Traffic_major.jpg" alt="Major" width="22" height="23" /></td>
        <td width="97%">Stationary traffic (Major) </td>
      </tr>
      <tr>
        <td><img src="images/moderate.jpg" alt="moderate" width="22" height="23" /></td>
        <td>Queing traffic (Moderate) </td>
      </tr>
      <tr>
        <td><img src="images/traffic_minor.jpg" alt="minor" width="22" height="23" /></td>
        <td>Slow traffic (Minor) </td>
      </tr>
      <tr>
        <td><img src="images/traffic_unknown.jpg" alt="unknown" width="22" height="23" /></td>
        <td>Unknown traffic (Unknown) </td>
      </tr>
      <tr>
        <td><img src="images/accident.jpg" alt="accident" width="27" height="28" /></td>
        <td>Accident (Major, Moderate, Minor, Unknown)</td>
      </tr>
      <tr>
        <td><img src="images/block.jpg" alt="block" width="22" height="23" /></td>
        <td>Blocked  (Major, Moderate, Minor, Unknown)</td>
      </tr>
      <tr>
        <td><img src="images/road_closed.jpg" alt="road_close" width="22" height="22" /></td>
        <td>Road close  (Major, Moderate, Minor, Unknown)</td>
      </tr>
      <tr>
        <td><img src="images/road_works.jpg" alt="road_works" width="29" height="25" /></td>
        <td>Road work  (Major, Moderate, Minor, Unknown)</td>
      </tr>
    </table>
    <p>&nbsp;</p>
</div>
