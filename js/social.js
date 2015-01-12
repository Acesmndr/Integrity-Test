window.fbAsyncInit = function() {
    FB.init({
      appId      : '1526576327594693',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

/*  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));*/

(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];if   (d.getElementById(id)) {return;}js = d.createElement('script'); js.id = id; js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));

function postToFeed(title, desc, url, image) {
    var obj = {display:'popup',method: 'feed',link: url, picture: "http://vignette4.wikia.nocookie.net/arkhamcity/images/3/3e/Arkhamcity-Batman-Gotham.jpg/revision/latest?cb=20140612183213",name: title,description: desc};
    function callback(response){}
    FB.ui(obj,function(response){});
}

var fbShareBtn = document.querySelector('.fb_share');
fbShareBtn.addEventListener('click', function(e) {
    e.preventDefault();
    var title = fbShareBtn.getAttribute('data-title'),
        desc = fbShareBtn.getAttribute('data-desc'),
        url = fbShareBtn.getAttribute('href'),
        image = fbShareBtn.getAttribute('data-image');
    postToFeed(title, desc, url, image);

    return false;
});
