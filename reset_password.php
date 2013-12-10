<?
if($_GET['code'] && $_GET['code']){
    require_once 'p_resetp.php';
}
?>

<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

<!-- Form Code Start -->
<h2 class="head">Reset Your Password</h2>
<div class="content">
<form id='resetreq' action='p_resetp.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Reset Password</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><?php if (isset($_SESSION['error'])) {
    echo'<span class="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']); }?></div>
<div class='container'>
    <label for='username' ><b>Your Email*:</b></label><br/>
    <input type='text' name='email' id='email'  maxlength="50" /><br/>
    <span id='resetreq_email_errorloc' class='error'></span>
</div>
<div class='short_explanation'>A link to reset your password will be sent to the email address</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
</div>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("resetreq");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("email","req","Please provide the email address used to sign-up");
    frmvalidator.addValidation("email","email","Please provide the email address used to sign-up");

// ]]>
</script>

