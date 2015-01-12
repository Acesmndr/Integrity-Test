var qid=0;
var hintArray=new Array();
var qArray=new Array();
var correctAnswerIndex;
var teacher;
var score=0,scoreadd=2,scoretotal=0;
var datatemp=0;
//var datar;
var corEx=["You did the right thing","You made the right choice!","Yes! you are right!","That is what even I would have done too","Yes! You are pretty smart"];
function loader(qid){
	$.ajax({
                    url: "output_json.php",
                    data: {"qid":qArray[qid]},
                    dataType: 'json',
                    type: 'GET',
		success:function(data){
			correctAnswerIndex=data.correct;
			hintArray=data.hint;
			//datar=data;	
			$("#question").text(data.output);
			$("#ans0").text(data.option[0]);
			$("#ans1").text(data.option[1]);
			$("#ans2").text(data.option[2]);
			$("#ans3").text(data.option[3]);
			}	
		});
}
$(".answeroption").click(function(){
	var clickIndex=parseInt(this.id.slice(3));
	if(clickIndex==correctAnswerIndex){
		qid++;
		score+=scoreadd;
		scoreadd=2;
		scoretotal+=2;
		if(qid==qArray.length){
			var result=score/scoretotal*100;
			$(".row").hide();
			if(result>=90){
				result="You have great moral Values!";
			}else{
				if(result>=75){
					result="You need to learn about Integrity a little more";
				}else{
					result="Sorry but you need to work a lot on your Integrity and Moral Values";
				}
			}	
			$.ajax({
        				type    :'GET',
        				url     :'final_score.php',
					data	:{score:score,scoretotal:scoretotal},
					success	:function(results){
							results=JSON.parse(results);
						$("#question").html("Your score: "+score+" out of "+scoretotal+" </br>"+result+"</br> Average Score= "+results[0]+"</br> High Score="+results[1]);
						}
					});
			
		}
		loader(qid);
		teacher.play("Congratulate");
		$("#score").html(score+"/"+scoretotal);
		teacher.speak(corEx[Math.floor(Math.random() * 4)]);
	}else{
		scoreadd=1;
		teacher.speak(hintArray[clickIndex]);
	}
});
(function(){
	var now=new Date();
	$("#date1").html("Date: "+now.toDateString());
	clippy.load('Genius', function(agent){
	teacher=agent;
	agent.moveTo(window.innerWidth-200,window.innerHeight/1.6);
	//agent.play("Greeting");
	//console.log(agent.animations());
	});
	
	})();
var img = document.createElement('img');
			img.src = "http://s3.amazonaws.com/clippy.js/Agents/Genius/map.png";
			img.style.display = 'none'; // don't display preloaded images
			img.onload = function () {
					$.ajax({
                    				url: "random_question.php",
                    				dataType: 'json',
                    				type: 'GET',
		    				success:function(results){
							qArray=results.random;
							loader(0);
						}
	});
				}
