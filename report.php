<? session_start();
  if(!$_SESSION['username']){
      header("location:index.php?page=login"); 
      echo '<script> window.location = "http://satrafficupdates.co.za/index.php?page=login"; </script>';
  }
?>
<h2 class="head">Report
 <? 
 if(isset($_SESSION['username']))
     { echo '{'.$_SESSION['username'].' | <a href="logout.php">Logout</a>}';
     
     } 
else{
    echo '{<a href="http://satrafficupdates.co.za/index.php?page=login">Login</a>}';
    
    } ?>
</h2>
<div class="content">
   <?php  if (isset($_SESSION['success'])) {
    echo'<p id="success">' . $_SESSION['success'] . '</p>';
    unset($_SESSION['success']);
}  
    
    if (isset($_SESSION['error'])) {
    echo'<p id="error">' . $_SESSION['error'] . '<p>';
    unset($_SESSION['error']);
} ?>
    <form name="report" action="insert_report.php" method="post" >
        <fieldset >
            <legend>Post Traffic Update</legend>
    <label for="subject"><b>Subject</b></label> 
                <input type="input" name="subject" /> (e.g. Road works, Accident)<br/>
                <label for="location"><b>location</b></label> 
                <input type="input" name="location" /> (e.g. City Name and Street)<br/>
                <label for="details"><b>details</b></label> <br/>
                <textarea name="details"></textarea>

             &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="submit" name="submit" value=" Send " /> 
    </form>
    </fieldset >
</div>
