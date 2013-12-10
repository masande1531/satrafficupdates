<?
session_start();
if($_GET['code']){
    require_once 'p_confirm.php';
}
?>

<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
<h2 class="head">Confirm</h2>
<div class="content">
<!-- Form Code Start -->


 <?php echo form_open('page/confirm_register') ?>
<fieldset>
<legend>Confirm registration</legend>
<p>
Please enter the confirmation code in the box below
</p>
<div><?php if (isset($_SESSION['error'])) {
    echo'<span class="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']); }?></div>
<div class='container'>
    <label for='code' ><b>Confirmation Code:*</b> </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
    <span id='register_code_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("confirm");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("code","req","Please enter the confirmation code");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

