jQuery(document).ready(function($) {
  (function(w, d, s) {
 
    function go(){
     var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
     if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.src = url; js.id = id;
       fjs.parentNode.insertBefore(js, fjs);
     };
         //Facebook
     load('//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0', 'fbjssdk');
         //Twitter
     load('//platform.twitter.com/widgets.js', 'tweetjs');
         //LinedIN
     load('//platform.linkedin.com/in.js', 'lnkdjs');
     }
    if (w.addEventListener) { w.addEventListener("load", go, false); }
     else if (w.attachEvent) { w.attachEvent("onload",go); }
  
 }(window, document, 'script'));
});
