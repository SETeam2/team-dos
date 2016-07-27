
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
    	// Logged into your app and Facebook.
      	
        FB.api('/me', {fields: 'id,name,email'}, function(response) {
          window.location.replace("facebooklogin.php?username="+response.name+"&email="+response.email);          
        });        
      
    } else if (response.status === 'not_authorized') {
      	// The person is logged into Facebook, but not your app.
    } else {
      	// The person is not logged into Facebook, so we're not sure if
      	// they are logged into this app or not.
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
}

function login(){
  FB.login(function(response) { // opens the login dialog
    if(response.authResponse) { // check if user authorized the app
      checkLoginState();
    }
  });
}

window.fbAsyncInit = function() {
	FB.init({
	appId      : '1618794075102552',
	cookie     : true,  // enable cookies to allow the server to access 
	                    // the session
	xfbml      : true,  // parse social plugins on this page
	version    : 'v2.2' // use any version
});
	
};

// Load the SDK asynchronously
(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
