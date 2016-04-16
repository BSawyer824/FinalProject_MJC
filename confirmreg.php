<?PHP
require_once("./include/membersite_config.php");

if(isset($_GET['code']))
{
   if($fgmembersite->ConfirmUser())
   {
        $fgmembersite->RedirectToURL("thank-you-regd.html");
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


<h3>Confirm registration</h3>
<p>
Please enter the confirmation code in the box below
</p>

<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='confirm' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
<div class='short_explanation'>* required fields</div>
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='code' >Confirmation Code:* </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
    <span id='register_code_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

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

</body>
</html>