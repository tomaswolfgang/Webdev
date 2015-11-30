<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

		</head>
		<body>
			<div id="welcomecontainer" class="pagecontainer" >
				<div id="welcome" class="title" class="page-header"><h1 id="weltitle">Welcome!<small>This is SimpleTask</small></h1></div>
				<div id="contain" >
	
					<form id="login"  action="comp/login_page.php" method="post">
						<div class="form-group">
							<label id="ulab" for="user">Enter your username</label>
							<input id="user" type="text" class="form-control"  name="username">
							<br>
							<label id="plab" for="pass">Enter your password</label>
							<input id="pass" type="password" class="form-control" minlength="6" name="psw">
							<input id="" type="button" onclick="encryptSubmit()" class="btn btn-default" value="login">
						</div>
					</form>
					<div id="register"><a href="">Don't have an account? Click here to register</a></div>
				</div>
				<div class="downscrollbutton"></div>
			</div>

			<div id="purposecontainer" class="pagecontainer">
				<div class="upscrollbutton"></div>
				<div id="welcome" class="title"><h1 id="weltitle">What is SimpleTask?</h1></div>
				<div id="purposeParagraph">purpose purpose prupose asjkhfb sadjf sadjfsd fnsdal kladf kldsaklasdfklsdafkafewfkjaen  njk nk n  kn kan kndk anfklsdanf ksadn dn  njk nkjan kjasn kjadnfksan ksan sn kn kjsdanf kdasnfksdanfk san</div>
				<div class="downscrollbutton"></div>
			</div>
			
			<!-- use json html iteration here -->
			<div id="technologycontainer" class="pagecontainer">
				<div id="technology" class="title"><h1 id="weltitle">Technology    <br><small>Front End & Back End</small></h1></div>
				<div id="techbubblecontainer">
					<div id="frontendbubbles">
					</div>
					<div id="backendtechtitle" class="title"></div>
					<div id="backendbubbles"></div>
				</div>
			</div>
			

			<!-- use bootstrap for this list -->
			<div id="learncontainer" class="pagecontainer">
				<div id="learntitle" class="title"><h1 id="weltitle">Everything we learned. <br> <small>The good and the bad</small></h1></div>
				<div id="learn">
					<div id="learnpositive" class="panel panel-default">
					  <!-- Default panel contents -->
					  <div class="panel-heading" id="lhead">Positive</div>

					  <!-- List group -->
						  <ul class="list-group">
						    <li  class="list-group-item" id="llist">Cras justo odio</li>
						    <li  class="list-group-item" id="llist">Dapibus ac facilisis in</li>
						    <li  class="list-group-item" id="llist">Morbi leo risus</li>
						    <li  class="list-group-item" id="llist">Porta ac consectetur ac</li>
						</ul>
					</div>
					
					<div id="learnnegative" class="panel panel-default">
					  <!-- Default panel contents -->
					  <div class="panel-heading" id="lhead">Negative</div>

					  <!-- List group -->
					  <ul class="list-group">
					    <li  class="list-group-item" id="llist">Cras justo odio</li>
					    <li  class="list-group-item" id="llist">Dapibus ac facilisis in</li>
					    <li  class="list-group-item" id="llist">Morbi leo risus</li>
					    <li  class="list-group-item" id="llist">Porta ac consectetur ac</li>
					  </ul>
					</div>
				</div>
			</div>

			<div id="createdcontainer" class="pagecontainer">
					<div id="createdtitle" class="title"></div>
					<div id="createdppl"></div>
				</div>	

			
		</body>
	</html>

	<script type="text/javascript">

	jqloaded = false;
	ploaded = false;

	function onloadCallback(){
		console.log("call")
		if(jqloaded && ploaded){
			initPage();
		}
	}
	

	</script>

	<script type="text/javascript" src="js/jquery.min.js?v=1.11.3" async onload="jqloaded=true;onloadCallback()">//  async loading of scripts</script>
	<script type="text/javascript" src="js/pLoader.js" async onload="ploaded=true;onloadCallback()"></script>