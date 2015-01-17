var editOrNew=0;
if(phpData!="default"){
	editOrNew=1;
	$("input[type=radio][value="+parseInt(phpData.correct)+"]").click();
	$("#qstn").val(phpData.output);
	correctAnswerIndex=phpData.correct;
	question=phpData.question;
	for(i=1;i<5;i++){
		$("#ans"+i).val(phpData.option[i-1]);
		$("#hint"+i).val(phpData.hint[i-1]);
	}
	$(".btn-success").hide();
	$(".btn-primary").html("Update");	
}	
$(".btn").click(function(){
	var correctAnswerIndex;
	var question;
	var ansArray=new Array();
	var hintArray=new Array();
	question=$("#qstn").val();
	correctAnswerIndex=($('input[type=radio]:checked').val());
	if(question==""){
		alert("Question can't be empty");
		return;
		}
	for(i=1;i<5;i++){
		ansArray.push($("#ans"+i).val());
		hintArray.push($("#hint"+i).val());
		if(($("#ans"+i).val())==""){
			alert("Answer Field can't be empty");
			return; 
		}
	}
	if(editOrNew!=0){
					$.ajax({
        				type    :'POST',
        				url     :'edit_question.php',
					data	:{qid:qId,correct:correctAnswerIndex,answer:ansArray,hint:hintArray,question:question},
					success	:function(){
						location.href="admin.php";
						}
					});
	}else{
	$.ajax({
        				type    :'POST',
        				url     :'insert_question.php',
					data	:{correct:correctAnswerIndex,answer:ansArray,hint:hintArray,question:question},
					success	:function(){
						location.reload();			
						}
				});
	}
	});
$(".btn-primary").click(function(){
	location.href="admin.php";
	});
	
