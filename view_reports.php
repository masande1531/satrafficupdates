<? session_start();
  if(!$_SESSION['username']){
      header("location:index.php?page=login"); 
       echo '<script> window.location = "http://satrafficupdates.co.za/index.php?page=login"; </script>';
  }else{}
?>
<h2 class="head">View Reports
 <? 
 if(isset($_SESSION['username']))
     { echo '{'.$_SESSION['username'].' | <a href="logout.php">Logout</a>}';
     
     } 
else{
    echo '{<a href="http://satrafficupdates.co.za/index.php?page=login">Login</a>}';
    
    } ?>

</h2>
<div class="content">
<div id='retrieved-data'>
	<!-- 
	this is where data will be  shown
	-->
    <img src="images/ajax-loader.gif" />
</div>
<script type = "text/javascript" src = "js/jquery-1.7.1.min.js"></script>

<script type = "text/javascript">
$(function() {
	//call the function onload
	getdata( 1 );
});

function getdata( pageno ){                     
	var targetURL = 'search_results.php?page=' + pageno;   

	$('#retrieved-data').html('<p><img src="images/ajax-loader.gif" /></p>');        
	$('#retrieved-data').load( targetURL ).hide().fadeIn('slow');
}      
</script>
   
  

</p> 
</div>
