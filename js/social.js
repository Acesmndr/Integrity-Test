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
	var product_name ='I scored 100% in Integrity Test! Play to know yours!';
	var description ='Integrity Test is an game where you play as well as learn different factors of Integrity! In this game you choose from different answers and learn which is right and which is wrong along the way';
	var share_image ="https://www.dropbox.com/s/p6oicf5s1bjfz2m/FBbanner.jpg?dl=1";
	var share_url ='main.html';	
        var share_capt ='Awesome Score';
    FB.ui({
        method: 'feed',
        name: product_name,
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

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
/*(function(){var link = document.createElement('a');
link.setAttribute('href', 'https://twitter.com/share');
link.setAttribute('class', 'twitter-share-button');
link.setAttribute('style', 'margin-top:5px;');
link.setAttribute("data-text" , "I just achieved a score of " + score + " on #2048Lagos a game where you find transport methods in lagos and score high." );
link.setAttribute("data-via" ,"denvycom") ;
link.setAttribute("data-size" ,"large") ;
document.appendChild(link) ;
twttr.widgets.load();})()*/



