<!DOCTYPE html>
<head></head>
<body> 




	<div>HELLO! there</div>

	<div>
		<form id="login" action="comp/login_page.php" method="post">
			User name:<br>
			<input id="user" type="text" name="username">
			<br>
			User password:<br>
			<input id="pass" type="password" minlength="6" name="psw">
			<input type="button" onclick="encryptSubmit()" value="login">
		</form>
	</div>

	<div id="result"></div>


</body>


<script>



function encryptSubmit(){

	var u = document.getElementById("user").value;
	var p = document.getElementById("pass").value;
	var pEncrypt = "";
	var pEncrypt2= "";

	
	console.log(u);
	
	console.log(p);

	

	var sharedKey = 0;

	for (var i =0; i< u.length; i++) {
		sharedKey = sharedKey + u.charAt(i).charCodeAt();
	};
	console.log(sharedKey);

	var c1 = sharedKey%2 + 2;
	var c2 = (sharedKey%100 - sharedKey%10) / 10 ;
	var c3 = c2 + 7;
	while (!isPrime(c2) && c1 != c2){
		c2++;
	}

	console.log("c1 is:" + c1 + "    c2 is:" + c2 +"     c3 is:" + c3);

	for(var i = 0; i<Math.ceil(p.length/c1);i++){
		var sub = p.substring(i*c1,(i+1)*c1);
		console.log("sub is: "+sub);
		for(var j = 0; j < c2%sub.length; j++){
			if(sub.length != 1) sub = sub.substring(1,sub.length) + sub.substring(0,1);
		}
		pEncrypt = pEncrypt + sub;
	}
	console.log(pEncrypt);

	for(var i = 0; i<pEncrypt.length; i++){
		var lshiftnum = (pEncrypt.charAt(i).charCodeAt() + c3) % 127;
		if(lshiftnum < 33){
			lshiftnum = lshiftnum + 33;
			var lettershift = String.fromCharCode(lshiftnum);
		}
		else{
			var lettershift = String.fromCharCode(lshiftnum);
		}
		console.log(lshiftnum);
		console.log(lettershift);
		pEncrypt2 = pEncrypt2 + lettershift;

	}

	console.log(pEncrypt2);

	var memberData = {username: u,password:pEncrypt2 };

	var json = "{username:'" + u +"',password:'"+pEncrypt2+"'}";
	
	var param = JSON.stringify(memberData);
	console.log(param);
	//document.getElementById("login").submit();


	var xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    	if (xhttp.readyState == 4 && xhttp.status == 200) {
      	document.getElementById("result").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("POST", "login.php", true);
  
  xhttp.send(param);
	

	
	
	
} 

function isPrime(value) {
    for(var i = 2; i < value; i++) {
        if(value % i === 0) {
            return false;
        }
    }
    return value > 1;
}


</script>