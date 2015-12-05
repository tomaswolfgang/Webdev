<php?
require 'vendor/autoload.php';

mysql_connect("localhost", "root", "webdev") or die(mysql_error()); 
mysql_select_db("members") or die(mysql_error()); 

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $email = mysql_escape_string($_GET['email']);
    $hash = mysql_escape_string($_GET['hash']); 
}

$search = mysql_query("SELECT email, hash, valid FROM users WHERE email='".$email."' AND hash='".$hash."' AND valid='0'") or die(mysql_error()); 
$match  = mysql_num_rows($search);

  if( $match == 0 ){
$query = mysql_query("UPDATE users SET valid='1' WHERE email='".$email."' AND hash='".$hash."' AND valid='0'") or die(mysql_error());
	echo "Your account has been activated, you can now login";
	}
	else{
	        echo "URL invalid or already used";
	    }          
	}
	

else{
	    echo "This link is not valid";
	}
?>