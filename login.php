
<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$body = $app->request->getBody();
$body1 = json_decode($body);
$user = $body1->{"username"};
$epwd = $body1->{"password"};
$email = $body1->{"mail"};


$servername = "localhost";
$username = "root";
$password = "260562995";
$dbname = "tasklist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT * FROM members WHERE username='".$user."'";
//$result = $conn->query($sql);
//$success="...";

$id=0;
$uname="";
$pword="";
$sharedkey = 12;



$sub;
$acc;
$dpword = decrypt($epwd,$sharedkey,"");



$exist = "SELECT * FROM users WHERE username = '$user'";
$res = $conn->query($exist);
if($res->num_rows > 0){
	logfail();
}
else{
	logsuccess($user, $email, $dpword);
}

function decrypt($str,$sk,$acc){
	for ($i=0; $i < strlen($str); $i++) { 
		$sub = ord($str[$i]) - $sk - $i;
		if ($sub <33){
			$sub = $sub + 94;
		}
		$acc = $acc.chr($sub);	
	}
	return $acc;
}

function logsuccess($user, $mail, $dpword){
	global $conn;
	$valid = 0;
	$hash = md5( rand(0,1000) );
	$q = "INSERT INTO users (valid, username, email, password, hash) VALUES (0, '$user', '$mail', '$dpword', '$hash')";
	$conn->query($q);

	echo "<div id='success'> Congratulations $user! You have created an account </div>";
	
	
	$to      = $mail; 
	$subject = 'Simple Task Sign In'; 
	$message = "
 
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after 	you have activated your account by pressing the url below.
 
	------------------------
	Username: $user
	Password: $dpword
	------------------------
 
	Please click this link to activate your account:
	https://localhost/verify.php?email=$mail&hash=$hash
 
	";
                     
	$headers = 'From:noreply@simpletask.com' . "\r\n"; 
	mail($mail, $subject, $message); 
}

function logfail(){
	echo "<div id='fail'>Choose an other username</div>";
	
}

$conn->close();
?>

