<?PHP
require_once("./include/membersite_config.php");

if($fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("orgPage.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("orgPage.php");
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
          <li><a href="http://www.codex209.com/~prodapp/source/give.php">Give to Organizations</a></li>
          <li><a href="http://www.codex209.com/~prodapp/source/login.php">Organization Log-in/Sign-Up</a></li>
      </ul>
  </div>
</head>
  <h3 >Login</h3> 
  
<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='login' style='max-width:40%;' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation' style='color:red'>* required fields</div><div></div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label class = 'thick' for='username' >UserName*:</label><br/>
    <input type='text' name='username' style='max-width:50%;' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='login_username_errorloc' class='error'></span>
</div>
<div class='container'>
    <label class = 'thick' for='password' >Password*:</label><br/>
    <input type='password' style='max-width:50%;' name='password' id='password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
<div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
<div class='short_explanation'><a href='register.php'>Not yet a Member? Sign-Up!</a></div>
</fieldset>
</form>
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
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>