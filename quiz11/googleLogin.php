<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="948355637657-068ebnu3p3f385uufe5fe2hh02qd2n2u.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
   <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
        body {
          background: url("img/bg.jpg");
        background-size: cover;
        }
        .row{
          padding-top: 15%;
        }
      </style>
    </head>

    <body>


      <div class="v-wrapper v-box row">
        <div class="col s12 m6 offset-m3">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><center><i class="material-icons" style="font-size: 4rem;border:1px solid #000;">accessibility</i>   <h3>I'm not a robot</h3><p>We use Google Authentication.Please Sign-In via Google.</p></center></span>
            </div>
            <div class="card-action">
               <center><div class="g-signin2" data-onsuccess="onSignIn"  data-theme="dark"></div></center>
               <!-- data-onsuccess="onSignIn" 
                -->
            </div>
          </div>
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
    
    <script>

    $(document).ready(function(){
      $('.g-signin2').click(onSignIn);
    });
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        var email = profile.getEmail();
        var img = profile.getImageUrl();
        //document.write(email);
        // console.log("ID Token: " + id_token);
        window.location.href = "scripts/googleKey.php?email=" + email + "&img=" + img;
      };
    </script>
<script type="text/javascript">
        
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
        });
      </script> 
</html>