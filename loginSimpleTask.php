<!DOCTYPE html>



<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css" >
</head>
<style>
	body{
background-color :  #B0C4DE;
font-family: "Palatino Linotype", Georgia, Serif;ahah
}
</style>
<body> 
	<h1 style="text-align:center" font face="verdana";>Login</h1>
	<h3 style="text-align:center" font size="+1" font face="symbol";>
	<div id="contain" >
	
		<form id="login"  action="comp/login_page.php" method="post">
			<div class="form-group">
			<br>
			<input id="user" type="text" name="userid"/>Username
			</br>
			<br>
			<input id="pass" type="password" minlength="6" name="psw"/>Password
			</br>
			<br>
			<input id="" type="button" onclick="test()" class="btn btn-default" value="Create">
			<button type type="reset" value="Cancel" class="btn btn-primary">Cancel</button>
			</br>
			</div>
			
			<div id="result"></div>
			<div id="error"></div>
		</form>

	
<script language="javascript">
</script>
</p>
</h3>
<p style="text-align:center">
	Back to home page
</p>
<p style="text-align:center">
		
	  <a href="tom.php"span class="glyphicon glyphicon-home" aria-hidden="true"></span>
		  </a>
</p>	

</body>


<script language="javascript">

var res = document.getElementById("result");


function test(){
			loginNow();
	}

function loginNow(){
			var u = document.getElementById("user").value;
			var p = document.getElementById("pass").value;	

		var pEncrypt = encrypt(p);
		var memberData = {username: u,password:pEncrypt};
		var param = JSON.stringify(memberData);
		
		var xhttp = new XMLHttpRequest();
	  		xhttp.onreadystatechange = function() {
	    	if (xhttp.readyState == 4 && xhttp.status == 200) {
	      	res.innerHTML = xhttp.responseText;
	    		}
		  }
		  xhttp.open("POST", "loginServerSide.php", true);
		  
		  xhttp.send(param);
} 
</script>
<script type="text/javascript" src="js/encryption.js"></script>