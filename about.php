<h2 class="head">About
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
                            <p> 
                                The web site was developed  to bring all live traffic updates.
                                
                            </p>
                            <p> 
                                The purpose is to update road users about current status of traffic road conditions as they happen.
                                
                            </p>
                            <p> Road users can also post their own updates which are not recognize by the website. </p>
                            <p><a href="index.php?page=how"><b>How it Works</b></a></p>
</div>
