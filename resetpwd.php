<?PHP
require_once("./include/membersite_config.php");

$success = false;
if($fgmembersite->ResetPassword())
{
    $success=true;
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
<body>
<div id='fg_membersite_content'>
<?php
if($success){
?>
<h3>Password is Reset Successfully</h3>
Your new password is sent to your email address.
<?php
}else{
?>
<h2>Error</h2>
<span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span>
<?php
}
?>
</div>

</body>
</html>