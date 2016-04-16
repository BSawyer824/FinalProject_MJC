<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->ChangePassword())
   {
        $fgmembersite->RedirectToURL("changed-pwd.html");
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
</head>
<body background="cup-hand-mug-potatoes.jpg" style="background-size:100% auto;">
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
<body>


<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Change Password</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='oldpwd' >Old Password*:</label><br/>
    <div class='pwdwidgetdiv' id='oldpwddiv' ></div><br/>
    <noscript>
    <input type='password' name='oldpwd' id='oldpwd' maxlength="50" />
    </noscript>    
    <span id='changepwd_oldpwd_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='newpwd' >New Password*:</label><br/>
    <div class='pwdwidgetdiv' id='newpwddiv' ></div>
    <noscript>
    <input type='password' name='newpwd' id='newpwd' maxlength="50" /><br/>
    </noscript>
    <span id='changepwd_newpwd_errorloc' class='error'></span>
</div>

<br/><br/><br/>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('oldpwddiv','oldpwd');
    pwdwidget.enableGenerate = false;
    pwdwidget.enableShowStrength=false;
    pwdwidget.enableShowStrengthStr =false;
    pwdwidget.MakePWDWidget();
    
    var pwdwidget = new PasswordWidget('newpwddiv','newpwd');
    pwdwidget.MakePWDWidget();
    
    
    var frmvalidator  = new Validator("changepwd");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("oldpwd","req","Please provide your old password");
    
    frmvalidator.addValidation("newpwd","req","Please provide your new password");

// ]]>
</script>

<p>
<a href='login-home.php'>Home</a>
</p>

</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>