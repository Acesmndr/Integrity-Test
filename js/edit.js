var editOrNew=0;
if(phpData!=undefined){
	editOrNew=1;
	$('input[type=radio][name=answer0]').attr("checked",false);
	$('input[type=radio][name=answer'+phpData.correct+']').attr("checked",true);
	$("#qstn").val(phpData.output);
	correctAnswerIndex=phpData.correct;
	question=phpData.question;
	for(i=1;i<5;i++){
		$("#ans"+i).val(phpData.option[i-1]);
		$("#hint"+i).val(phpData.hint[i-1]);
	}	
}	
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
	if(editOrNew!=0){
					$.ajax({
        				type    :'POST',
        				url     :'edit_question.php',
					data	:{qid:qId,correct:correctAnswerIndex,answer:ansArray,hint:hintArray,question:question},
					success	:function(){
						//location.href="admin.php";
						}
					});
	}else{
	$.ajax({
        				type    :'POST',
        				url     :'insert_question.php',
					data	:{correct:correctAnswerIndex,answer:ansArray,hint:hintArray,question:question},
					success	:function(){
						location.reload();			
						console.log("Inserted");						
						}
				});
	}
	});
	
