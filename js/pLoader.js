
var fbubbleData = [{title: "test1",description: "lsdhafbadslhfb", image:""},{title: "test2",description: "description2", image:""},{title: "test3",description: "description3", image:""},{title: "test4",description: "description4", image:""},{title: "test1",description: "lsdhafbadslhfb", image:""},{title: "test2",description: "description2", image:""},{title: "test1",description: "lsdhafbadslhfb", image:""},{title: "test2",description: "description2", image:""},{title: "test1",description: "lsdhafbadslhfb", image:""},{title: "test2",description: "description2", image:""},{title: "test3",description: "description3", image:""}];

var bbubbleData = [{title: "test1",description: "lsdhafbadslhfb", image:""},{title: "test2",description: "description2", image:""},{title: "test3",description: "description3", image:""},{title: "test4",description: "description4", image:""}];

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
								'<div class="bubble">'+
									'<div class="overlay" id="overlay1"><div class="bubbleoverlay1">'+bubble.title+'</div></div>'+
									'<div class="overlay" id="overlay2"><div class="bubbleoverlay2">'+ bubble.description+'</div></div>'+
								'</div>'+
							'</div>';

		}
	}
}