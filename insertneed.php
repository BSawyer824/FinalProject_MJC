<?php
require_once("./include/membersite_config.php");
$servername = $fgmembersite->GetDBHost();
$username = $fgmembersite->GetDBUser();
$password = $fgmembersite->GetDBPass();
$dbname = $fgmembersite->GetDB();

//$orginName = $_POST["orgName"];
$contactName = $_POST["needContactName"];
$email = $_POST["needContactEmail"];
$about = $_POST["needInfo"];
$needTime = $_POST["needTime"];
$needDate = $_POST["needDate"];
$needQuantity = $_POST["needQuantity"];
$needGoodTF = $_POST["goodsType"];
$needServiceTF = $_POST["servicesType"];
$needOrg = $_POST['needOrg'];

if ($needGoodTF === NULL) {
  $needtype = "Goods";
  $needsubtype = $needGoodTF;
} else {
  $needtype = "Services";
  $needsubtype = $needServiceTF;
}

//$orgName = $_POST["orgName"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO needs (organization_name, needtype, needsubtype, description, contact_firstname, email)
VALUES ('$needOrg', '$needtype', '$needsubtype', '$about', '$contactName', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "<html><head>
    <meta charset='UTF-8'>
    <title>Thank You</title>
    <link href='../stylesheet1.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id='navBar'>
        <ul>
            <a href='http://www.codex209.com/~prodapp/home.html'>
                <li style='padding-right: 40px;'><img src='../cupOfSugarLogo1.jpg' /></li>
            </a>
            <li><a href='http://www.codex209.com/~prodapp/source/give.php'>Give</a></li>
            <li><a href='http://www.codex209.com/~prodapp/requests.html'>Your Requests</a></li>
            <li><a href='http://www.codex209.com/~prodapp/source/logout.php'>Log-out</a></li>
        </ul>
    </div>
    <div class='content' style='padding-top: 100px;'>
        <h3>Thanks for creating a new Request!</h3>
        <h6>Click below to view your submission and others on our 'Request' page.</h6>
    </div>
    <a href='orgPage.php'><center><button>Continue</button></center></a>
</body>
</html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>