var correctAnswerIndex;
var question;
var ansArray=new Array();
var hintArray=new Array();
$(".btn").click(function(){
question=$("#qstn").val();
correctAnswerIndex=($('input[type=radio]:checked').val());
for(i=1;i<5;i++){
	ansArray.push($("#ans"+i).val());
	hintArray.push($("#hint"+i).val());
}
$.ajax({
        				type    :'POST',
        				url     :'insert_question.php',
					data	:{correct:correctAnswerIndex,answer:ansArray,hint:hintArray,question:question},
					success	:function(){
						window.location.reload();			
						console.log("Inserted");						
						}
					});
});
