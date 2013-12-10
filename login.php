<?
session_start();
require_once("include/membersite_config.php");
?>
<script type='text/javascript' src='js/gen_validatorv31.js'></script>
<h2 class="head">Login</h2>
<div class="content">

   
<form id='login' action='p_login.php' method='post' accept-charset='UTF-8'>
 <fieldset>
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' ><b>UserName*:</b></label>
<div><?php if (isset($_SESSION['error'])) {
    echo'<span class="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']); }?></div>

<input type='text' name='username'  id='username'  maxlength="50" />
<span id='login_username_errorloc' class='error'></span><p></p>
<label for='password' ><b>Password*:</b></label>
<input type='password' name='password' id='password' maxlength="50" />
<span id='login_password_errorloc' class='error'></span>
 
<input type='submit' name='Submit' value=' Login ' /><br/>

<a href="index.php?page=register">Create Account</a>

</form>

 
<div class='short_explanation'><a href='index.php?page=reset'>Forgot Password?</a></div>

</fieldset>
    
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>