<!DOCTYPE html>
<html>
<head>
<title>Auth</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.navbar-inverse .navbar-brand {
    color: #ffffff;
}
.navbar-inverse .navbar-nav>li>a {
    color: #ffffff;
}
nav.navbar.navbar-inverse {
    background: #0a0adb;
}
#profile,#logout{
    display: none;
}
#fb {
    margin-top: 14px;
}
.container {
    padding-left: 50px;
    padding-top: 50px;
}
h1#heading,#headings {
    font-weight: 800;
    color: darkblue;
    font-family: math;
}
p#para {
    font-family: monospace;
    font-size: 16px;
}
</style>
</head>
<body>
<script>

    
  window.fbAsyncInit = function() {
    console.log('got here');
    FB.init({
      appId      : '188847487430541',
      cookie     : true,
      xfbml      : true,
      version    : 'v16.0'
    });
      
    FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));





   function statusChangeCallback(response){
    if(response.status === 'connected')
    {
        console.log("Logged In");
        setElements(true);
        testAPI();
    }
    else{
        console.log("Not Logged In");
        setElements(false);
    }
   }



   function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
       });
   }



   function testAPI(){
    FB.api('/me?fields=id,name,email',function(response){
       if(response && !response.error){
        console.log(response);
       }
    });
   }



        function setElements(isLoggedIn){
           if(isLoggedIn)
           {
             document.getElementById('logout').style.display = 'block';
             document.getElementById('profile').style.display = 'block';
             document.getElementById('headings').style.display = 'block';
             document.getElementById('para').style.display = 'block';
             document.getElementById('heading').style.display = 'none';
             document.getElementById('fb').style.display = 'none';
           }
           else{
             document.getElementById('logout').style.display = 'none';
             document.getElementById('fb').style.display = 'block';
             document.getElementById('heading').style.display = 'block';
             document.getElementById('profile').style.display = 'none';
             document.getElementById('headings').style.display = 'none';
             document.getElementById('para').style.display = 'none';
           }
        }



        function logout()
        {
            FB.logout(function(response){
              setElements(false);
            });
        }

  </script>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <a class="navbar-brand" href="#">WebSiteName</a>
                  </div>
                  <ul class="nav navbar-nav">
                    <li><a id="logout" href="#" onclick="logout()">Logout</a></li>
                   
                  </ul>
                </div>
              </nav>

              <div class="container">
                 <h1 id="heading">Log In To View Your Profile...</h1>
                 <h1 id="headings">Meta Connect</h1>
                 <p id="para">Authorize Advertising Assets.</p>

                  <div id="fb">
                    <fb:login-button 
                    config_id="579642270656110"
                    onlogin="checkLoginState();">
                    </fb:login-button>
                  </div>

                 <div id="profile"></div>
              </div>


</body>
</html>