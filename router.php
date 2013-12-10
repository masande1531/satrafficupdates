<?php


   if($_GET['page']== 'about')
  {
   require("about.php");
   }
   
  else if($_GET['page']== 'contact'){
   require("contact.php");
  }
  
  //content menu
  
  else if($_GET['page']== 'view_reports'){
   require("view_reports.php");
   }
   
  else if($_GET['page']== 'report'){
   require("report.php");
   
   }
   //Forms
   else if($_GET['page']== 'login'){
   require("login.php");
   }
   
  else if($_GET['page']== 'register'){
   require("register.php");
   
   }else if($_GET['page']== 'register_m'){
   require("reg_message.php");
   
   }else if($_GET['page']== 'thank_you'){
   require("confirm_message.php");
   
   }
   
   else if($_GET['page']== 'confirm'){
   require("confirmreg.php");
   }
   //logout
    else if($_GET['page']== 'logout'){
   require("logout.php");
   }
   
    else if($_GET['page']== 'reset'){
   require("reset_password.php");
   
   }
     else if($_GET['page']== 'reset_m'){
   require("reset_message.php");
   
   }
     else if($_GET['page']== 'reseted'){
   require("reset_compete.php");
   
   }
   //How It Work
    else if($_GET['page']== 'how'){
   require("how_it_work.php");
   
   }   else if($_GET['page']== '404'){
   require("404.php");
   
   }
   else{
       
   require("live_traffic.php");
   
   }
   
 