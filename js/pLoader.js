
var fbubbleData = [{title: "",description: "We used some new features of HTML5 such as the canvas tag. This allowed us to easily implement a loader animation without having to import a gif", image:"img/html.png"},{title: "",description: "Bootstrap makes your programmer life easier. We used some buttons pattern to make the visual better. ", image:"img/bootstrap.png"},{title: "",description: "As a cross-browser library, by using jquery, we minimize the work needed for the page to be cross-browser compaitble.", image:"img/jquery.png"},{title: "",description: "We used the Jquery cookie technology to remember the username if the user checks the « remember me » box.", image:"img/cookie.png"}];
var bbubbleData = [{title: "",description: "Client’s security is one of our priority. We use password encryption to ensure your password is unclear when it transits to our server.", image:"img/security.png"},{title: "XAMPP",description: "Xampp is a free and open source cross-platform web server solution package. It includes Apache HTTP server, MySQL Database and various interpreters for scripts written in PHP.", image:""},{title: "",description: "We use MySQL to manage your datas. It is an open-source relational database management system.", image:"img/mysql.png"},{title: "",description: "We used PHP embedded into HTML code for our back end management. We also used the mail feature to communicate with the client’s mailbox", image:"img/php.png"},{title: "Email",description: "We use the php technology to notify you by email.", image:""}];
var specbubbleData = [];

var createdData = [{name:"Thomas Wong",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABK5zlcBxRhFIMoTUu8hOR8ZOHG64_iLz9Q&trk=nav_responsive_tab_profile_pic"},{name:"Marie Lagarde",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAMAABrwe0ABMAGedWtFhtn4ncE25qWTBGfnBV0&trk=hp-identity-name"},{name:"Michelle Yang",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABpdaDsBvZBLGKhN-K80T-cjfcuKiE3BZfc&trk=nav_responsive_tab_profile"}]
var global_user = "";

function eSubmit(){
		
		var u = document.getElementById("user").value;
		var p = document.getElementById("pass").value;	
		global_user = u;

		if($('#c1').is(':checked')) {
                var username=u; 
                $.cookie("username", username, { expires: 365 }); 
     	}
     	var memberData1 = {username: u};
		var param1 = JSON.stringify(memberData1);
     	var count = document.getElementById("fcount");
     	var xhttp1 = new XMLHttpRequest();
	  		xhttp1.onreadystatechange = function() {
	    	if (xhttp1.readyState == 4 && xhttp1.status == 200) {
	      		count.innerHTML = xhttp1.responseText;
	    		}
		  }
		  xhttp1.open("POST", "finishcount.php", true);
		  xhttp1.send(param1);

		var pEncrypt = encrypt(p);
		var memberData = {username: u,password:pEncrypt};
		var param = JSON.stringify(memberData);
		
		var xhttp = new XMLHttpRequest();
	  		xhttp.onreadystatechange = function() {
	    	if (xhttp.readyState == 4 && xhttp.status == 200) {
	      	res.innerHTML = xhttp.responseText;
	     	
			   if($("#fail").length == 0){
			   	$("#pageContainer").animate({"margin-left":"-100%"},300);
			     $("#response").html("");
			     $("#tasktable").css("height",($("tr").length - 1)*100+20 + "px");
			     $("#tasktable").css("width","800px");
			   }
			   else{
			   		console.log("stayin!");
			   		$("#response").html("<div id='regsuccess'>It seems that there is an error with the information you've entered. Please try again!</div>")
			   }
			
	    		}
		  }
		  xhttp.open("POST", "loginServerSide.php", true);
		  
		  xhttp.send(param);

		 
} 

function loader(){
	var loadingTime = 1200;



var startTimeLoading = 0; 


startLoading();

//remove circle when it's done
setTimeout(function(){$("#loadingCircle").fadeOut(500)},loadingTime)

//bring in the main stuff
setTimeout(function()
           {


  $("#page1").animate({"opacity":"1"},500);


},loadingTime + 500)



//Initiate loading
function startLoading()
{	
  startTimeLoading = new Date().getTime();
  window.requestAnimationFrame(drawFrameLoading);  
}
////////////////////////////////////
//Draw the loading circle until done

//config
var totalTime = loadingTime;

//Rest of it
var c=document.getElementById("loadingCircle");  
var ctx=c.getContext("2d");

//writing preferences
ctx.font="15px sans-serif";
ctx.fillStyle = "#666" ;	 //inner

//drawing preferences
ctx.lineWidth = 2;
ctx.strokeStyle = '#AAA';   	//border     

//radius
var totalWidth = c.width;
radius=(totalWidth/2) - 2;
var innerRadius = radius - 5;

//recursive function
function drawFrameLoading()
{
  ctx.clearRect(0, 0, c.width, c.height);

  //time calcs
  var timeDiff = (new Date().getTime() - startTimeLoading) ;            
  var sAngle=-90;
  var eAngle = (360/totalTime)*timeDiff - 90;

  //writing
  var dotCount = parseInt(1+((timeDiff/(totalTime/4))));
  var dots = Array(dotCount ).join(".")
  var loadingText = "loading" + dots;  
  ctx.fillText(loadingText,70,105);

  //Maths        
  var a = d2r(sAngle + ((eAngle - sAngle) / 2));      

  //drawing
  ctx.beginPath();                              
  
  //Line drawing
  var fullCircle = 2*Math.PI;
  ctx.arc(totalWidth/2, totalWidth/2, radius, d2r(sAngle), d2r(eAngle)); 
  ctx.stroke();        

  //Recursion
  if (timeDiff < totalTime)
  {    
    window.requestAnimationFrame(drawFrameLoading);   
  }
}
function d2r(x)
{
  return (x/360)*(2*Math.PI); 
}
}

function clickadd(){

	$("#addtask").css("display", "block");
	$("#addtask").animate({"margin-top":"0"},{duration:300, queue:false});
	$("#addoverlay").css("display", "block");
	$("#addoverlay").animate({"opacity":"1"},{duration:300, queue:false});
	$("#addtask").delay(100).animate({"opacity":"1"},{duration:300, queue:false});
	$("#task_name").val("");
  	$("#description").val("");
  	$("#finish_date").val("");
  	$("#category").val("");
  	$("#out_tn").removeClass("is-dirty");
  	$("#out_ds").removeClass("is-dirty");
  	$("#out_fd").removeClass("is-dirty");
  	$("#out_ct").removeClass("is-dirty");
}
function addexit(){
	$("#addtask").animate({"margin-top":"-25%"},{duration:350, queue:false, complete: function() {
    // Animation complete.
	
    $("#addoverlay").css("display", "none");


    $("#addtask").css("display", "none");
  	}});
  	$("#addoverlay").animate({"opacity":"0"},{duration:300, queue:false});
	$("#addtask").animate({"opacity":"0"},{duration:200, queue:false});
}
function addend(){
	
	var tn = document.getElementById("task_name").value;
	var ds = document.getElementById("description").value;
	var fd = document.getElementById("finish_date").value;
	var ct = document.getElementById("category").value;

	if(tn != "" && fd != "" && ct != ""){
	addexit();
	console.log ("tn: "+ tn +"    ds: "+ds+"    fd:"+fd+"    ct:"+ct);
	var data = {username:global_user,task_name: tn,description:ds,finish_date:fd,category:ct};
	var param = JSON.stringify(data);
	var data2 = {username:global_user};
	var param2 = JSON.stringify(data2);


	var xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    	if (xhttp.readyState == 4 && xhttp.status == 200) {
    	

      	var xhttp2 = new XMLHttpRequest();
	  		xhttp2.onreadystatechange = function() {
	    	if (xhttp2.readyState == 4 && xhttp2.status == 200) {
	    		var input ="<div id='success'><h1 id='weltitle'>"+global_user+"'s tasks | <small>Click to a select task(s)</small> </h1></div>"+xhttp2.responseText
	    		res.innerHTML = input;
			   	console.log
				$("#tasktable").css("width","800px");
			     $("#tasktable").css("height",($("tr").length - 1)*100+20 + "px");
			  	
			
	    		}
		  }
		  xhttp2.open("POST", "printTasks.php", true);
		  
		  xhttp2.send(param2);

    		}
	  }
	  xhttp.open("POST", "addtask.php", true);
	  
	  xhttp.send(param);
	}
	else{
		alert("Please make sure you've filled in all of the required areas");
	}


	  
	}

function deleteRows(){
	var data2 = {username:global_user};
	var param2 = JSON.stringify(data2);
	var limit = $("tr").length - 1;
	var num = 0;
	for(var i = 0; i<limit;i++){
		var row = "#tableValues"+i;

		if($(row).hasClass("is-selected")){
			num++;
			$(row).css("display","none");
			$("#tasktable").css("height",(limit - num)*100+20 + "px")
			var tn = $($(row).children()[0]).html();
			var ds = $($(row).children()[1]).html();
			var fd = $($(row).children()[2]).html();
			var ct = $($(row).children()[3]).html();
			var data = {username:global_user,task_name: tn,description:ds,finish_date:fd,category:ct};
			var param = JSON.stringify(data);
			
			var xhttp = new XMLHttpRequest();
		  		xhttp.onreadystatechange = function() {
			    	if (xhttp.readyState == 4 && xhttp.status == 200) {
			     		var xhttp2 = new XMLHttpRequest();
				  		xhttp2.onreadystatechange = function() {
				    	if (xhttp2.readyState == 4 && xhttp2.status == 200) {
				    		var input ="<div id='success'><h1 id='weltitle'>"+global_user+"'s tasks | <small>Click to a select task(s)</small> </h1></div>"+xhttp2.responseText
				    		res.innerHTML = input;
						   	console.log("did you delete????");
							$("#tasktable").css("width","800px");
						     $("#tasktable").css("height",($("tr").length - 1)*100+20 + "px");
			  	
			
	    		}
		  }
		  xhttp2.open("POST", "printTasks.php", true);
		  
		  xhttp2.send(param2);
			    	}
			 	}
			  xhttp.open("POST", "deletetask.php", true);
			  
			  xhttp.send(param);



		}
	}
	
}

function finishRows(){
	var data2 = {username:global_user};
	var param2 = JSON.stringify(data2);
	var limit = $("tr").length - 1;
	var num = 0;
	for(var i = 0; i<limit;i++){
		var row = "#tableValues"+i;

		if($(row).hasClass("is-selected")){
			num++;
			$(row).css("display","none");
			$("#tasktable").css("height",(limit - num)*100+20 + "px")
			var tn = $($(row).children()[0]).html();
			var ds = $($(row).children()[1]).html();
			var fd = $($(row).children()[2]).html();
			var ct = $($(row).children()[3]).html();
			var data = {username:global_user,vars:{username:global_user,task_name: tn,description:ds,finish_date:fd,category:ct}};
			var param = JSON.stringify(data);
			
			var xhttp = new XMLHttpRequest();
		  		xhttp.onreadystatechange = function() {
			    	if (xhttp.readyState == 4 && xhttp.status == 200) {
			    		console.log($("#fcount").html());
			    		$("#fcount").html(xhttp.responseText)
			    		var xhttp2 = new XMLHttpRequest();
				  		xhttp2.onreadystatechange = function() {
				    	if (xhttp2.readyState == 4 && xhttp2.status == 200) {
				    		var input ="<div id='success'><h1 id='weltitle'>"+global_user+"'s tasks | <small>Click to a select task(s)</small> </h1></div>"+xhttp2.responseText
				    		res.innerHTML = input;
						   console.log("ajsnfdajsdnsaljn");
							$("#tasktable").css("width","800px");
						     $("#tasktable").css("height",($("tr").length - 1)*100+20 + "px");
			  	
			
	    		}
		  }
		  xhttp2.open("POST", "printTasks.php", true);
		  
		  xhttp2.send(param2);
			    	}
			 	}
			  xhttp.open("POST", "finishtask.php", true);
			  
			  xhttp.send(param);



		}
	}
	
}
	
function selectRow(n){
	var id = "#tableValues"+ n;
	$(id).toggleClass("is-selected");
}
function signup(){
	console.log("reg");
	$("#register").css("display","block");
	$("#contain").animate({"padding-bottom":"470px"},{duration:300,queue:false});

	$("#login").animate({"margin-left":"-300px"},{duration:300, queue:false});
	$("#login").animate({"opacity":"0"},{duration:300, queue:false, complete:function(){$("#login").css("display", "none");}});
	$("#response").html("");
	$("#response").animate({"top":"620px"},{duration:300,queue:false});
	$("#response").animate({"opacity":"1"},{duration:300,queue:false});
	$("#register").animate({"opacity":"1"},{duration:300,queue:false});
	$("#register").animate({"left":"0px"},{duration:300,queue:false});
}
function signupexit(){
	console.log("reg");
	$("#login").css("display","block");
	$("#contain").animate({"padding-bottom":"330px"},{duration:300,queue:false});

	$("#login").animate({"margin-left":"0"},{duration:300, queue:false});
	$("#register").animate({"opacity":"0"},{duration:300, queue:false});
	$("#register").animate({"left":"300px"},{duration:300,queue:false});
	$("#response").animate({"top":"500px"},{duration:300,queue:false});
	$("#response").animate({"opacity":"0"},{duration:300,queue:false});
	$("#login").animate({"opacity":"1"},{duration:300, queue:false, complete:function(){$("#register").css("display", "none");}});
}

function r(){
	$("#pass").val("");
	$("#pageContainer").animate({"margin-left":"0"},{duration:300, complete: function(){$("#result").html("");}});
}

function register(){

			var res = document.getElementById("response");
			var u = document.getElementById("user2").value;
			var p = document.getElementById("pass2").value;	
			var x = document.getElementById("mail").value;
			var c = document.getElementById("pswconf").value;

			console.log(x);
			if(p!=c){
			alert("passwords must match");
			}
			else{

				var pEncrypt = encrypt(p);
				var memberData = {username: u,password:pEncrypt,mail:x};
				var param = JSON.stringify(memberData);
				console.log("user:"+u+"   password:"+p+"    mail:"+x);

				var xhttp = new XMLHttpRequest();
			  		xhttp.onreadystatechange = function() {
			    	if (xhttp.readyState == 4 && xhttp.status == 200) {
			      	res.innerHTML = xhttp.responseText;
			    		}
				  }
				  xhttp.open("POST", "login.php", true);
				  
				  xhttp.send(param);
				  
				}

	}

function initPage(){

	loader();

	var username=$.cookie("username");
	if(username!=undefined){
	     $('#user').val(username);   // Display username on input box if avail on cookie.
	      $('#c1').prop('checked', true);  
	}

	initBubbleCont($("#technologycontainer"));

	function initBubbleCont(container){
		var html='';
		var conttitle = [{title:"Front End",contname:"frontendbubbles"},{title:"Back End",contname:"backendbubbles"}, {title:"Special Techniques",contname:"specialtechbubbles"}];
		for(var i=0; i<conttitle.length; i++){
			var bubble = conttitle[i];
			console.log("this is"+bubble);
			html = html+bubbleHtml(bubble);
		}
		container.html(html);

		function bubbleHtml(bubble){
			return '<div id="technology'+bubble.contname+'" class="title"><h1 id="weltitle">Technology    <br><small>'+bubble.title+'</small></h1></div>'+
							'<div id="techbubblecontainer">'+
								'<div id="'+bubble.contname+'">'+
								'</div>'+
								
							'</div>';

		}
	}

	initBubbleData($("#frontendbubbles"), fbubbleData);
	initBubbleData($("#backendbubbles"), bbubbleData);
	
	function initBubbleData(container , data){
		var html='';
		console.log("haiii");
		for(var i=0; i<data.length; i++){
			var bubble = data[i];
			html = html+bubbleHtml(bubble);
		}
		container.html(html);

		function bubbleHtml(bubble){
			return '<div class="bubbleCont">'+
								'<div class="bubble" style="background-image:url('+bubble.image+');">'+
									'<div class="overlay" id="overlay1"><div class="bubbleoverlay1">'+bubble.title+'</div></div>'+
									'<div class="overlay" id="overlay2"><div class="bubbleoverlay2">'+ bubble.description+'</div></div>'+
								'</div>'+
							'</div>';

		}
	}


	initCreatedData($("#createdppl"), createdData);
	
	function initCreatedData(container , data){
		var html='';
		console.log("haiii");
		for(var i=0; i<data.length; i++){
			var created = data[i];
			html = html+createdHtml(created);
		}
		container.html(html);

		function createdHtml(created){
			return '<div class="profilecont">'+
							'<div class="profpic" style="background-image:url('+created.picture+');"></div>'+
							'<div class="profinfo">'+
								'<div class="profname">'+created.name+'</div>'+
								'<div class="proflink">'+
									'<div class="social"><a href="'+created.linkedin+'" class="icon-linkedin"></a></div>'+
								'</div>'+
							'</div>'+
						'</div>';

		}
	}
}