    <?php 
        $appId = env('FACEBOOK_APP_ID','1941089599495744');
    ?>
@extends("layouts/$fsid/main")
@section('content')
<script type='text/javascript'>
    var clickToChange = '<div class="facebook-authorize-app click-to-change">' + 
        'The Facebook profile for <b>FACEBOOK_ID</b> is currently attached to this apartment property.' + 
        'To change this, log out of Facebook then click the Log In link below.' + 
        '</div>';
        
  function saveAccessToken(response){
        $.ajax({
            'url': '/facebook/post/saveAccessToken',
            'type': 'post',
            'data':{
                'response': response,
                'token': response.authResponse.accessToken,
                'replace': 'y'
            }
        }).done(finishSaveAccessToken);
  }

  function finishSaveAccessToken(msg){
        var json = $.parseJSON(msg);
        $("#status").append("<hr>");
        $("#status").append("<b>Fetching reviews...</b>");
        if(json.data.status == 'ok'){
            $.ajax({
                'url': '/api/reviews/pull?platforms[]=fb',
                'type': 'get',
            }).done(function(msg){
                $("#status").html("Reviews fetched!");
                var response = msg;
                var data = response.data;
                console.log(response.data);
                if(response.status == 'ok'){
                    $("#reviews").html("<b>Okay here are the reviews...</b>");
                    for(var i in response.data){
                        $("#reviews").append("<hr><b>" + response.data[i].author_name + "</b> said: ");
                        $("#reviews").append("<img src='" + response.data[i].author_url + "'><br>");
                        $("#reviews").append("<p>" + response.data[i].text_body + "</p><b>rating: " + response.data[i].rating + "</b>");
                    }
                }
            });
        }
    }

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
      saveAccessToken(response);
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('login-notice').innerHTML = '<h3>Please click the "Log In" button to link your Facebook page to the Marketapts.com Reviews app. <br>*You must log in with a Facebook account that has ADMIN access to the apartment property\'s Facebook page.*</h3>';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '<?php echo $appId;?>',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
		if(response.status == 'connected'){
            console.log('tools');
			console.log(response.authResponse.accessToken);
            saveAccessToken(response);
		}
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
    });
  }
</script>
<style>
.facebook-authorize-app div {
    text-align: center;
}
.facebook-authorize-app .fb-login-current {
    
}
</style>
<div class='container relative'>
    <div class='facebook-authorize-app main-content'>
        <!--
          Below we include the Login Button social plugin. This button uses
          the JavaScript SDK to present a graphical Login button that triggers
          the FB.login() function when clicked.
        -->
        <div class="login-notice" id="login-notice"></div>
        <div id='fb-login-current'></div>
        <div id="fb-login-wrapper" class="center" style='text-align: center;'>
            <fb:login-button scope="public_profile,email,manage_pages" onlogin="checkLoginState();" id='fb_login_btn'>
            </fb:login-button>
        </div>
        <div id="status" style='text-align:center;'>
        </div>
        <div id='reviews'>
        <b>Reviews will appear here when you authorize the app</b>
        </div>
    </div>
</div>
@stop
