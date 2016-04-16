<?PHP
require_once("./include/membersite_config.php");

$emailsent = false;
if(isset($_POST['submitted']))
{
   if($fgmembersite->EmailResetPasswordLink())
   {
        $fgmembersite->RedirectToURL("reset-pwd-link-sent.html");
        exit;
   }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cup-of-Sugar</title>
  <link href='../stylesheet1.css' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
  <script type="text/javascript">
      // show sign-in or sign-up form
      function selectDiv (divID1, divID2) {
          var showDiv = document.getElementById(divID1);
          var hideDiv = document.getElementById(divID2);
          
          if(showDiv.style.display == 'none') {
              showDiv.style.display = 'block';
              hideDiv.style.display = 'none';
          }
          else
              showDiv.style.display = 'none';
      }
  </script>
  <div id="navBar">
      <ul>
          <a href='http://www.codex209.com/~prodapp/home.html'>
              <li style="padding-right: 40px;"><img src="../cupOfSugarLogo1.jpg" /></li>
          </a>
          <li><a href="http://www.codex209.com/~prodapp/source/give.php">Give</a></li>
          <li><a href="http://www.codex209.com/~prodapp/requests.html">Your Requests</a></li>
          <li><a href="http://www.codex209.com/~prodapp/source/login.php">Log-in</a></li>
          <li><a href="http://www.codex209.com/~prodapp/source/register.php">Sign-Up</a></li>
      </ul>
  </div>
</head>
  <h3 >Reset Password</h3> 
  
<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='resetreq' style='max-width:40%;' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Reset Password</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation' style='color:red'>* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='username' >Your Email*:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='resetreq_email_errorloc' class='error'></span>
</div>
<div class='short_explanation'>A link to reset your password will be sent to the email address</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
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

</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>