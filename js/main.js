function loader(qid){
	$.ajax({
                    url: "output_json.php",
                    data: {"qid":qid}, //returns all cells' data
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
(function(){
	loader(1);
	}();
