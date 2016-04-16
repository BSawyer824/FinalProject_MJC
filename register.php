<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
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
            <li><a href="http://www.codex209.com/~prodapp/source/login.php">Log-in</a></li>
            <li><a href='http://www.codex209.com/~prodapp/source/logout.php'>Log-out</a></li>
        </ul>
    </div>
<body>

<!-- Form Code Start -->
<h3>Register your Organization!</h3>
<div id='fg_membersite'>
<form id='register' style='max-width:50%;' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<div class='short_explanation' style='color:red'>* required fields</div><div></div>

<input type='hidden' class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='name' >Organization Name*:</label>
    <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='email' >Email Address*:</label>
    <input type='text' name='email' id='email' value:40='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='register_email_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='username' >UserName*:</label>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='register_username_errorloc' class='error'></span>
</div>
<div class='container' style='height:80px;'>
    <label for='password' >Password*:</label><br/>
    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
    <input type='password' name='password' id='password' maxlength="50" />
    <div id='register_password_errorloc' class='error' style='clear:both'></div>
</div>
<div class='container'>
    <label for="contactName">Contact Name*</label>
    <input id="contactName" name="contactName" type="text" style="max-width:20%;" value='<?php echo $fgmembersite->SafeDisplay('contactName') ?>' maxlength="50" required>
    &nbsp;    
    <label for="phoneNumber">Phone Number*</label>
    <input id="phoneNumber" name="phoneNumber" type="text" style="max-width:20%;" value='<?php echo $fgmembersite->SafeDisplay('phoneNumber') ?>' maxlength="50" required>
</div>
<div class='container'>
    <label for='address1' >Address 1*:</label><br/>
    <input type='text' name='address1' id='address1' value='<?php echo $fgmembersite->SafeDisplay('address1') ?>' maxlength="50" /><br/>
</div>
<div class='container'>
    <label for='address2' >Address 2:</label><br/>
    <input type='text' name='address2' id='address2' value='<?php echo $fgmembersite->SafeDisplay('address1') ?>' maxlength="50" /><br/>
</div>
<div class='container'>
    <label for="orgCity">City*</label>
    <input id="orgCity" name="orgCity" type="text" style="max-width:20%;" value='<?php echo $fgmembersite->SafeDisplay('orgCity') ?>' maxlength="50" required>
    <label for="orgState">State*</label>
    <input id="orgState" name="orgState" type="text" style="max-width:10%;" value='<?php echo $fgmembersite->SafeDisplay('orgState') ?>' maxlength="50" required>
    &nbsp;
    <label for="orgZipCode">Zip Code</label>
    <input id="orgZipCode" name="orgZipCode" type="text" maxLength="10" style="max-width:10%;" value='<?php echo $fgmembersite->SafeDisplay('orgZipCode') ?>' maxlength="50" required>
    <br />
    <label for="orgDescription">Organization Description</label>
    <input id="orgDescription" name="orgDescription" type="text" maxlength="250" value='<?php echo $fgmembersite->SafeDisplay('orgDescription') ?>'>
    <br />
    <label for="orgTaxID">Tax ID #: (Enter as XX-XXXXXXX)</label>
    <input id="orgTaxID" name="orgTaxID" type="text" style="max-width:30%;" value='<?php echo $fgmembersite->SafeDisplay('orgTaxID') ?>' maxlength="50" >
    <br />
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

<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>