<?php

require_once "classes/DBConnect.php";
require_once "classes/Security.php";
require_once "classes/Constants.php";

$conn = DBConnect::getInstance();
$security = new Security($conn);

function redirect($url)
{
    header("Location: " . $url);
    exit();
}

session_start();
if (!isset($_SESSION["sap_id"])) {
    redirect("../quiz");
}

if ($security->is_ip_blocked()) {
    redirect("../banned");
}
?>

<html lang="en">
<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id"
          content="948355637657-068ebnu3p3f385uufe5fe2hh02qd2n2u.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style type="text/css">
    body {
        background: url("images/bg.jpg");
        background-size: cover;
    }

    .row {
        padding-top: 10%;
    }
</style>
</head>

<body>


<div class="v-wrapper v-box row">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><center><i class="material-icons"
                                                    style="font-size: 4rem;border:1px solid #000;">accessibility</i>   <h3>I'm not a robot</h3><p>We use Google Authentication.Please Sign-In via Google.</p></center></span>
            </div>
            <div class="card-action">
                <center>
                    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
                </center>
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
    $(document).ready(function () {
        $('.g-signin2').click(onSignIn);
    });
    function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        var id_token = googleUser.getAuthResponse().id_token;
        var email = profile.getEmail();
        var img = profile.getImageUrl();
        window.location.href = "functions/addGoogleToken.php?email=" + email + "&img=" + img + "&token=" + id_token;
    }
</script>
</html>