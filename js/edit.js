var att;
$(".btn").click(function(){
	var correctAnswerIndex;
	var question;
	var ansArray=new Array();
	var hintArray=new Array();
	question=$("#qstn").val();
	correctAnswerIndex=($('input[type=radio]:checked').val());
	for(i=1;i<5;i++){
		ansArray.push($("#ans"+i).val());
		hintArray.push($("#hint"+i).val());
	}
	att=ansArray;
	$.ajax({
        				type    :'POST',
        				url     :'insert_question.php',
					data	:{correct:correctAnswerIndex,answer:ansArray,hint:hintArray,question:question},
					success	:function(){
						location.reload();			
						console.log("Inserted");						
						}
				});
});
