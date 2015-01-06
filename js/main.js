var qid=0;
var hint;
var qArray=new Array();
var correctAnswerIndex;
var teacher;
var corEx=["You did the right thing","You made the correct choice!","Yes! you are right!","That is what even I would have done too","Yes! You are pretty smart"];
function loader(qid){
	$.ajax({
                    url: "output_json.php",
                    data: {"qid":qArray[qid]}, //returns all cells' data
                    dataType: 'json',
                    type: 'GET',
		success:function(data){
	correctAnswerIndex=data.correct;
	hint=data.hint;
	arr=data;	
	$("#question").text(data.output);
	$("#ans1").text(data.option[0]);
	$("#ans2").text(data.option[1]);
	$("#ans3").text(data.option[2]);
	$("#ans4").text(data.option[3]);
	}	
	});
}
$(".answeroption").click(function(){
	if(parseInt(this.id.slice(3))==correctAnswerIndex){
		qid++;
		loader(qid);
		teacher.play("Congratulate");
		teacher.speak(corEx[Math.floor(Math.random() * 4)]);
	}else{
		teacher.speak(hint);
	}
});
(function(){
	$.ajax({
                    url: "random_question.php",
                    dataType: 'json',
                    type: 'GET',
		    success:function(results){
			qArray=results.random;
		}
	});		
	clippy.load('Genius', function(agent){
	teacher=agent;
	agent.moveTo(window.innerWidth-200,window.innerHeight/1.6);
	agent.play("Greeting");
	console.log(agent.animations());
	});
	
	})();
var img = document.createElement('img');
			img.src = "http://s3.amazonaws.com/clippy.js/Agents/Genius/map.png";
			img.style.display = 'none'; // don't display preloaded images
			img.onload = function () {
				loader(qid);
				}
