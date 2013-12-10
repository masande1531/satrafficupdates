
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    
<h2 class="head">Register {<a href="index.php?page=login">Login</a>} </h2>
<div class="content">
<form name='register' id='submitted' action='p_register.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Registration Form</legend>
<div class='short_explanation'>* required fields</div>


<div><?php if (isset($_SESSION['error'])) {
    echo'<span class="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']); }?></div>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='name' ><b>Full Name*</b></label>
<input type='text' name='name' id='name'  maxlength="50" />
<span id='register_name_errorloc' class='error'></span>
<label for='name' ><b>Surname*</b></label>
<input type='text' name='surname' id='name'  maxlength="50" />
<span id='register_name_errorloc' class='error'></span>
<label for='email' ><b>Email Address*</b></label>
<input type='text' name='email' id='email'  maxlength="50" />
<span id='register_email_errorloc' class='error'></span>
 <label for='email' ><b>Cell No*</b></label>
<input type='text' name='cell_no' id='cell_no' maxlength="50" />
 
<label for='username' ><b>UserName*</b></label>
<input type='text' name='username' id='username' maxlength="50" />
 
<label for='password' ><b>Password*</b></label>
<input type='password' name='password' id='password' maxlength="50" />
<label for='password' ><b>Confirm Password*</b></label>
<input type='password' name='c_password' id='c_password' maxlength="50" />
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>
</form>
</div>
<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>