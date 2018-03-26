<?php

//todo: cross check start time and end time, standings pade

require_once "classes/DBConnect.php";
require_once "classes/Security.php";
require_once "classes/Constants.php";

$conn = DBConnect::getInstance();
$security = new Security($conn);

function redirect($url){
    header("Location: " . $url);
    exit();
}

session_start();
if (isset($_SESSION["sap_id"])) {
    redirect("quiz");
}

if ($security->is_ip_blocked()) {
    redirect("banned");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>IDPT QUIZ | DJ Trinity</title>
    <meta name="description"
          content="A party for all the filmy ones to brainstorm their minds and prove their love for the industry and fandoms to the stars with a quirky, filmy Quiz!">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style type="text/css">
        body {
            background: url("images/bg.jpg");
            background-size: cover;
        }

        select {
            overflow-y: auto !important;
        }

        .error {
            color: red !important;
        }

        .row {
            margin-bottom:0;
        }
    </style>
    <script>
        grecaptcha.execute();
    </script>
</head>

<body>
<!--Login form-->
<div class="v-wrapper row" style="min-height:100vh">
    <div class="v-box row">
        <div class="center">
            <img src="images/logo2.png" style="height: 200px">
        </div>
        <div class=" col m4 offset-m4">
            <div class="card teal">
                <?php if(isset($_REQUEST["status"], $_REQUEST["message"])): ?>
                <div class="card-content white-text center">
                      <h6 style="color:<?php if(isset($_REQUEST["status"]) && $_REQUEST["status"] == Constants::STATUS_SUCCESS){ echo '#b7eca9';}else{echo '#b32e1b';} ?>"><?php echo $_REQUEST["message"] ?></h6>
                </div>
                <?php endif;?>
                <div class="card-tabs ">
                    <ul class="tabs tabs-fixed-width tabs-transparent">
                        <li class="tab"><a class="<?php if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'login') echo 'active'; ?>" href="#login">Login</a></li>
                        <li class="tab"><a class="<?php if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'register') echo 'active'; ?>" href="#register">Register</a></li>
                    </ul>
                </div>
                <div class="card-content white lighten-4">
                    <div id="login">
                        <form method="post" id="form_login" class="center" action="functions/login">
                            <input type="number" placeholder="SAP ID" name="sap_id" id="sap_id_login" required/>
                            <input type="password" placeholder="Password" name="password" id="password_login" required/>
                            <div class="g-recaptcha"
                                 data-sitekey="your_site_key"
                                 data-callback="onSubmit"
                                 data-size="invisible">
                            </div>
                            <button class="g-recaptcha" data-sitekey="6LcPNBkUAAAAAN7dKAyNYF1EAyUJ_tNz4Ux5UUyK" data-callback='onSubmit' class="btn btn-medium waves-effect waves-light" type="submit" name="login">
                                Login<i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>

                    <div id="register">
                        <form method="post" id="form_register" action="functions/register" class="center">
                            <input type="number" placeholder="SAP ID" name="sap_id" id="sap_id_register" required/>
                            <input type="text" placeholder="Name" name="name" id="name" required/>
                            <select name="department" id="department" required>
                                <option value="null">Select Department</option>
                                <option value="bioprod">Bio-Prod Engineering</option>
                                <option value="comps">Computer Engineering</option>
                                <option value="chem">Chemical Engineering</option>
                                <option value="elec">Electronic Engineering</option>
                                <option value="extc">Electronics And Telecomunications</option>
                                <option value="it">Information Technology</option>
                                <option value="mech">Mechanical Engineering</option>
                            </select>
                            <select name="year" id="year" required>
                                <option value="null" selected>Select Year</option>
                                <option value="1">First Year</option>
                                <option value="2">Second Year</option>
                                <option value="3">Third Year</option>
                                <option value="4">Fourth Year</option>
                            </select>
                            <input type="password" placeholder="Password" name="password" id="password_register" required/>
                            <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password_register" required/>
                            <p style="color:red"><b>Note</b>: Password should have minimum 8 characters.<br>Only points of the
                                quiz
                                played between 8pm to 12am will be counted.<br><br><br></p>
                            <div class="g-recaptcha"
                                 data-sitekey="your_site_key"
                                 data-callback="onSubmit"
                                 data-size="invisible">
                            </div>
                            <button class="g-recaptcha" data-sitekey="6LcPNBkUAAAAAN7dKAyNYF1EAyUJ_tNz4Ux5UUyK" data-callback='onSubmit' class="btn btn-medium waves-effect waves-light" type="submit" name="register" id="register_button">
                                Register<i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('select').material_select();

        $("#form_login").submit(function (e) {
            var password = $("#password_login").val();
            if (password.length < 8) {
                $("#password_register").addClass("error");
                alert('Password must have atleast 8 characters.');
                e.preventDefault();
                return;
            }else {
                $("#password_register").removeClass("error");
            }

            $("#form_login").unbind('submit').submit();

        });

        $("#form_register").submit(function (e) {
            console.log("on click");

            var password = $("#password_register").val();
            var cpassword = $("#confirm_password_register").val();

            var name = $("#name").val();
            console.log("Name: " + name + "  " + name.length);
            if(name.length <= 0){
                alert("Name Cannot Be Empty");
                e.preventDefault();
                return;
            }

            var sap_id_register = $("#sap_id_register").val().toString();
            if(sap_id_register.length <= 0 || sap_id_register.length > 11){
                alert("SAP ID is Invalid");
                e.preventDefault();
                return;
            }

            var dept = $("#department").val();
            if(dept == "null" || dept == ""){
                alert("Department Value is Invalid");
                e.preventDefault();
                return;
            }

            var year = $("#year").val();
            if(year  == "null" || year == ""){
                alert("Year Value is Invalid");
                e.preventDefault();
                return;
            }

            if (password.length < 8) {
                $("#password_register").addClass("error");
                alert('Password must have atleast 8 characters.');
                e.preventDefault();
                return;
            }else {
                $("#password_register").removeClass("error");
            }

            if (password != cpassword){
                $("#password_register").addClass("error");
                $("#confirm_password_register").addClass("error");
                alert("Passwords Do Not Match");
                e.preventDefault();
                return;
            }else {
                $("#password_register").removeClass("error");
                $("#confirm_password_register").removeClass("error");
            }
            $("#form_register").unbind('submit').submit();

        });
    });


</script>
</body>
</html>