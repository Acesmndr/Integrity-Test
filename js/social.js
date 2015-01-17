var share_url='http://integrity-test.com' //need to change it to the URL!
var scorePromo='I scored 100% in Integrity Test! Play to know yours!';
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1526576327594693',
      status	 : true,
      xfbml      : true,
      version    : 'v2.2'
    });
  };

 (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

function fbShareFunction(){
	var description ='Integrity Test is an game where you play as well as learn different factors of Integrity! In this game you choose from different answers and learn which is right and which is wrong along the way';
	var share_image ="https://www.dropbox.com/s/p6oicf5s1bjfz2m/FBbanner.jpg?dl=1";
	var share_capt ='Awesome Score';
    FB.ui({
        method: 'feed',
        name: scorePromo,
        link: share_url,
        picture: share_image,
        caption: share_capt,
        description: description

    }, function(response) {
        if(response && response.post_id){}
        else{}
    });

}
$("#fbShare").click(function(){
		fbShareFunction();	
	});
score=parseInt(score,16);
scoretotal=parseInt(scoretotal,16);
score-=1000;
scoretotal-=1000;
var result=score/scoretotal*100;
scorePromo='I scored '+result+'% in Integrity Test! Play to know yours!';
$("a[id=twitter_share]").attr("href","http://twitter.com/share?via=IntegrityTest&text="+encodeURI(scorePromo)+"&url="+share_url);
/*if(result>=90){
				result="You have great moral Values!";
			}else{
				if(result>=75){
					result="You need to learn about Integrity a little more";
				}else{
					result="Sorry but you need to work a lot on your Integrity and Moral Values";
				}
			}*/	
			$.ajax({
        				type    :'GET',
        				url     :'final_score.php',
					data	:{score:score,scoretotal:scoretotal},
					success	:function(results){
							var results=JSON.parse(results);
							$("#myScore").text(result+"%");
							$("#avgScore").text(results[0].toFixed(2)+"%");
						}
					});

