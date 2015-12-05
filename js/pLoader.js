
var fbubbleData = [{title: "",description: "We used some new features of HTML5 such as email input. Email input is know checked by the browser to ensure a valid email address has been entered.", image:"img/html.png"},{title: "",description: "Bootstrap makes your programmer life easier. We used some buttons pattern to make the visual better. ", image:"img/bootstrap.png"},{title: "",description: "JQTHIS AND THAT BLAH BLAH", image:"img/jquery.png"},{title: "",description: "Client’s security is one of our priority. We use password encryption to ensure your password is unclear when it transits to our server.", image:"img/security.png"},{title: "",description: "We used the Jquery cookie technology to remember the username if the user checks the « remember me » box.", image:"img/cookie.png"},{title: "XAMPP",description: "Xampp is a free and open source cross-platform web server solution package. It includes Apache HTTP server, MySQL Database and various interpreters for scripts written in PHP.", image:""},{title: "",description: "We use MySQL to manage your datas. It is an open-source relational database management system.", image:"img/mysql.png"},{title: "",description: "We used PHP embedded into HTML code for our back end management. We also used the mail feature to communicate with the client’s mailbox", image:"img/php.png"},{title: "Email",description: "We use the php technology to notify you by email.", image:""}];

var createdData = [{name:"Thomas Wong",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABK5zlcBxRhFIMoTUu8hOR8ZOHG64_iLz9Q&trk=nav_responsive_tab_profile_pic"},{name:"Marie Lagarde",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABK5zlcBxRhFIMoTUu8hOR8ZOHG64_iLz9Q&trk=nav_responsive_tab_profile_pic"},{name:"Michelle Yang",picture:"test.png",linkedin:"https://www.linkedin.com/profile/view?id=AAIAABK5zlcBxRhFIMoTUu8hOR8ZOHG64_iLz9Q&trk=nav_responsive_tab_profile_pic"}]

function initPage(){
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