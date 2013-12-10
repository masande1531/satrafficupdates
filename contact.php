<h2 class="head">Contact
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
                                Email: mmbondwana@gmail.com
                            </p>
                           
</div>
