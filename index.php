<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
			<script src='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js'></script>
			<link rel='stylesheet' href='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css'>
			<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
		</head>
		<body>
			<div id="pageContainer">
				
				<div id="p1cont">
					<canvas id="loadingCircle" height="200px" width="200px"></canvas>
					<div id="page1">
						<div id="welcomecontainer" class="pagecontainer" >
							<div id="welcome" class="title" class="page-header"><h1 id="weltitle">Welcome!<small>This is SimpleTask</small></h1></div>
							<div id="contain" >
								
								<div class="tabs">
									<div class="btn-group" role="group" aria-label="...">
									  <button type="button" class="btn btn-default" onclick="signupexit()">Sign In</button>
									  <button type="button" class="btn btn-default" onclick="signup()" >Sign Up</button>
									</div>
							    </div>
								<form id="login"  action="comp/login_page.php" method="post">
									
									<div class="form-group">
										<label id="ulab" for="user">Enter your username</label>
										<input id="user" type="text" class="form-control"  name="username">
										<br>
										<label id="plab" for="pass">Enter your password</label>
										<input id="pass" type="password" class="form-control" minlength="6" name="psw">
										 <div id="remcheck" class="checkbox">
										    <label>
										      <input id="c1" type="checkbox"> Remember Me
										    </label>
										  </div>
										
										<input id="" type="button" onclick="eSubmit()" class="btn btn-default" value="login">
									</div>
								</form>
								<form id="register"  action="comp/login_page.php" method="post">
									<div class="form-group">
										<label id="ulab" for="user2">Enter your username</label>
										<input id="user2" type="text" class="form-control"  name="username">
										<label id="maillab" for="mail">Enter your email</label>
										<input id="mail" type="email" class="form-control"  name="email">
										<br>
										<label id="plab" for="pass2">Enter your password</label>
										<input id="pass2" type="password" class="form-control" minlength="6" name="psw">
										<label id="plab2" for="pswconf">Re-enter your password</label>
										<input id="pswconf" type="password" class="form-control" minlength="6" name="psw2">

										<input id="" type="button" onclick="register()" class="btn btn-default" value="register">
									</div>
								</form>
							</div>
							<div id="response"></div>
						</div>

						<div id="purposecontainer" class="pagecontainer">
							<div class="upscrollbutton"></div>
							<div id="welcome" class="title"><h1 id="weltitle">What is SimpleTask?</h1></div>
							<div id="purposeParagraph">SimpleTask is a simple, clean website which helps you keep track of important projects and tasks. Enjoy a free mind while we take care of your memos!</div>
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
							<div id="createdtitle" class="title"><h1 id="weltitle">The Creators <br><small>Who we are</small></h1></div>
							<div id="createdppl">
								<!-- <div class="profilecont">
									<div class="profpic"></div>
									<div class="profinfo">
										<div class="profname"></div>
										<div class="proflink">
											<div class="social"><a href="javascript:void(0);" class="icon-linkedin"></a></div>
										</div>
									</div>
								</div> -->
							</div>
						</div>	

					</div>
				</div>
				<div id="p2cont">
					<div id="page2">
						<div id="logout"><a id="lgout" href="javascript:;" onclick="r()">Log Out</a></div>
						<div id="result"></div>
						<button id="addexp" type="button" class="btn btn-default" onclick="clickadd()" aria-label="plus">
 							 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						</button>
						<div id="addtask"><form>
						    <div class="mdl-textfield mdl-js-textfield">
						        <input class="mdl-textfield__input" type="text" id="task_name">
						        <label class="mdl-textfield__label" for="task_name">Task Name</label>	
							</div><br>
						        <div class="mdl-textfield mdl-js-textfield">
						        <textarea class="mdl-textfield__input" type="text" rows= "3" id="description" ></textarea>
						        <label class="mdl-textfield__label" for="description">Description</label> 
							</div><br>
							<div class="mdl-textfield mdl-js-textfield">
						        <input class="mdl-textfield__input" type="text" pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" id="finish_date">
						        <label class="mdl-textfield__label" for="finish_date">Finish Date YYYY-MM-DD</label>
						        <span class="mdl-textfield__error">Input is not a date!</span>
					 		</div>  <br>
					 		<div class="mdl-textfield mdl-js-textfield">
						     	<input class="mdl-textfield__input" type="text" id="category">
						        <label class="mdl-textfield__label" for="category">Category</label>
					 		</div><br>
					 		<div class="mdl-textfield mdl-js-textfield">
						        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="priority">
						        <label class="mdl-textfield__label" for="priority">Priority</label>
						        <span class="mdl-textfield__error">Input is not a number!</span> 
						    </div>
						    
					    </form>
					    <button id="addbutton" onclick="addend()" name="add" class="mdl-button mdl-js-button mdl-button--raised" value="Add Task">
					      	Add Task
					    	</button> <br></div>
				     
				    
				    <button type="submit" name="delete" class="mdl-button mdl-js-button mdl-button--raised" >
				      Delete Task(s)
				    </button>

				</div>
			</div>
			   
			</div>
		</body>
	</html>

	<script type="text/javascript">

	var jqloaded = false;
	var ploaded = false;
	var cookloaded= false;

	

	var res = document.getElementById("result");

	function onloadCallback(){
		console.log("call")
		if(jqloaded && ploaded && cookloaded){
			initPage();
		}
	}

	

	
	

	</script>
	<script type="text/javascript" src="js/encryption.js"></script>
	<script type="text/javascript" src="js/jquery.min.js?v=1.11.3" async onload="jqloaded=true;onloadCallback()">//  async loading of scripts</script>
	<script type="text/javascript" src="js/pLoader.js" async onload="ploaded=true;onloadCallback()"></script>
	<script type="text/javascript" src="js/jquery.cookie.js" async onload="cookloaded=true;onloadCallback()"></script>