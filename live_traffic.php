<h2 class="head">Live Traffic
 <? 
 session_start();
 if(isset($_SESSION['username']))
     { echo '{'.$_SESSION['username'].' | <a href="logout.php">Logout</a>}';
     
     } 
else{
    echo '{<a href="index.php?page=login">Login</a>}';
   
    
    } ?>
</h2>
<div class="content">
    
    <script type="text/javascript">
if ((screen.width < 700))
      {document.write('<p><div id="map" style="width:100%; height:300px;"></div></p>');}

else if ((screen.width > 700))
      {document.write('<p style="float: right;"><div id="map" style="width:100%; height:400px;"></div></p>');}
      </script>
    <!--<p><div id="map" style="width:340px; height:300px;"></div> </p> -->
</div>
