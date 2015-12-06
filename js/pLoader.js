
var fbubbleData = [{title: "",description: "We used some new features of HTML5 such as email input. Email input is know checked by the browser to ensure a valid email address has been entered.", image:"img/html.png"},{title: "",description: "Bootstrap makes your programmer life easier. We used some buttons pattern to make the visual better. ", image:"img/bootstrap.png"},{title: "",description: "JQTHIS AND THAT BLAH BLAH", image:"img/jquery.png"},{title: "",description: "Client’s security is one of our priority. We use password encryption to ensure your password is unclear when it transits to our server.", image:"img/security.png"},{title: "",description: "We used the Jquery cookie technology to remember the username if the user checks the « remember me » box.", image:"img/cookie.png"},{title: "XAMPP",description: "Xampp is a free and open source cross-platform web server solution package. It includes Apache HTTP server, MySQL Database and various interpreters for scripts written in PHP.", image:""},{title: "",description: "We use MySQL to manage your datas. It is an open-source relational database management system.", image:"img/mysql.png"},{title: "",description: "We used PHP embedded into HTML code for our back end management. We also used the mail feature to communicate with the client’s mailbox", image:"img/php.png"},{title: "Email",description: "We use the php technology to notify you by email.", image:""},{title: "",description: "We use the php technology to notify you by email.", image:""}];

var createdData = [{name:"Thomas Wong",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABK5zlcBxRhFIMoTUu8hOR8ZOHG64_iLz9Q&trk=nav_responsive_tab_profile_pic"},{name:"Marie Lagarde",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAMAABrwe0ABMAGedWtFhtn4ncE25qWTBGfnBV0&trk=hp-identity-name"},{name:"Michelle Yang",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABpdaDsBvZBLGKhN-K80T-cjfcuKiE3BZfc&trk=nav_responsive_tab_profile"}]

function eSubmit(){
		
		var u = document.getElementById("user").value;
		var p = document.getElementById("pass").value;	

		if($('#c1').is(':checked')) {
                var username=u; 
                $.cookie("username", username, { expires: 365 }); 
     	}

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
		  $("#pageContainer").animate({"margin-left":"-100%"},300);
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
	$("#addtask").delay(100).animate({"opacity":"1"},{duration:300, queue:false});
}
function addend(){
	
	$("#addtask").animate({"margin-top":"-25%"},{duration:350, queue:false, complete: function() {
    // Animation complete.

    $("#addtask").css("display", "none");
  	}});
	$("#addtask").animate({"opacity":"0"},{duration:200, queue:false});
	
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

	initBubbleData($("#frontendbubbles"), fbubbleData);
	
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