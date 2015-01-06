var a=new Array();
var data;
(function(){ 
$.ajax({
        type    :'POST',
        url     :'list_question.php',
        /*beforeSend:function(){
            $("#result").html('<img src="<?php echo base_url();?>assets/loading.gif"/>');
        },*/
        success:function(result){
	   	result=$.parseJSON(result);
		for(i=0;i<result.data.length;i++){
			var temp=result.data[i];
			 var $tr = $('<tr/>');
    			$tr.append($('<td/>').html(result.data[i][0]));
    			$tr.append($('<td/>').html(result.data[i][1]));
    			$tr.append($('<td/>').html('<button type="button" class="btn btn-primary" value='+result.data[i][0]+' id="e'+1+'">Edit</button>'));
			$tr.append($('<td/>').html('<button type="button" class="btn btn-danger" value='+result.data[i][0]+' id="d'+1+'">Delete</button>'));
   			$('#table tr:last').before($tr);
			a.push(temp);
		}
	$(".btn").on("click",function(result){
		data=result;
		var idToEdit=result.target.value;
		alert(idToEdit)	
		if(result.target.id[0]=="d"){
			var temp=confirm("Are you sure you want to delete this question?");
			if(temp==true){
				$.ajax({
        				type    :'POST',
        				url     :'delete.php',
					data	:{data:idToEdit},
					success	:function(){
						console.log("Deletes");						
						}
					});
				$(this).parent().parent().remove();
			}
			
		}else{
					
		}		
	});
        }
});
})();

