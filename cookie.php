<!DOCTYPE html>
	<html>
		<head>

		</head>
		<body>
			<div id="welcomecontainer" class="pagecontainer">
				<div id="welcome" class="title"></div>
				<div id="loginbox">
					<div id="username"></div>
					<div id="password"></div>
					<input type="checkbox" id="c1" />Remember Me<br />
					<input type="submit" id="usersubmit" />
				</div>
				<div id="register"></div>
				<div class="downscrollbutton"></div>
			</div>

			<div id="purposecontainer" class="pagecontainer">
				<div class="upscrollbutton"></div>
				<div id="purpose" class="title"></div>
				<div id="purposeParagraph"></div>
				<div class="downscrollbutton"></div>
			</div>
			
			<!-- use json html iteration here -->
			<div id="technologycontainer" class="pagecontainer">
				<div id="techbubblecontainer">
					<div id="frontendtechtitle" class="subtitle"></div>
					<div id="frontendbubbles"></div>
					<div id="backendtechtitle" class="subtitle"></div>
					<div id="backendbubbles"></div>
				</div>
			</div>
			

			<!-- use bootstrap for this list -->
			<div id="learncontainer">
				<div id="learntitle" class="title"></div>
				<div id="learnpositive">
					<li id="poslist">   
						<ul></ul>
						<ul></ul>
						<ul></ul>
					</li>
				</div>
				<div id="learnnegative">
					<li id="neglist">
						<ul></ul>
						<ul></ul>
						<ul></ul>
					</li>
				</div>
			</div>

			<div id="createdContainer">
					<div id="createdtitle" class="title"></div>
					<div id="createdppl"></div>
				</div>	

			
		</body>
	</html>

	<script type="text/javascript">
	
	<script src="js/jquery.cookie.js"></script>
	<script src="js/login.js"></script>
	</script>

	<script type="text/javascript" src="js/jquery.min.js?v=1.11.3" async onload="jqloaded=true;onloadCallback()">//async loading of scripts
	
	$('#loginsubmit').click(function(){
	      if($('#c1').is(':checked')) {
	                var username=$('#usersubmit').val(); 
	                $.cookie("username", username, { expires: 365 }); 
	     }
	}

	$(document).ready(function(){
	var username=$.cookie("username");
	if(username!=undefined){
	     $('#loginsubmit').val(username);   // Display username on input box if avail on cookie.
	      $('#c1').prop('checked', true);  
	}
	
	</script>