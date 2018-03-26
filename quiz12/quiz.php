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
    session_unset();
    session_destroy();
    redirect("home?tab=login");
}

if ($security->is_ip_blocked()) {
    redirect("../banned");
}

$sql_read_rules = "select vse_read_rules as rr from aei_users where iq_sap_id = '".$_SESSION["sap_id"]."'";
$result = $conn->query($sql_read_rules);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row["rr"] == 0){
        redirect("functions/read_rules");
    }
}else{
    session_unset();
    session_destroy();
    redirect("home?tab=login&status=failed&message=Invalid Access");
}

$sql = "select jr_questions_list as ql, ks_registration_time as rt from aei_users where iq_sap_id = " . $_SESSION["sap_id"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $qIds = $row["ql"];
        $time = $row["rt"];
    }
} else {
    session_unset();
    session_destroy();
    redirect("home?tab=login&status=failed&message=Error Occurred");
}

$questionID = explode(',', $qIds);


$sql = "update aei_users set zp_quiz_start_time='".date('Y-m-d H:i:s')."' where iq_sap_id = " . $_SESSION["sap_id"];
if (!$conn->query($sql)) {
    session_unset();
    session_destroy();
    redirect("home?tab=login&status=failed&message=Error Occurred");
}
?>

<!DOCTYPE html>
<html>
<head>
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

        label {
            color: #000;
        }

    </style>
</head>

<body>


<div class="row">
    <div class="col s12 m10 offset-m1 l6 offset-l3">
        <div class="card">
            <div class="card-content">
                <div class="card-title">IDPT Quiz
                    <div class="right" style="font-size: 1.2em"><i class=" material-icons">alarm_on</i>&nbsp;
                        <span class="right timer" id="timer_div"></span></div>
                </div>
                <form action="functions/calculate.php" method="post">

                    <div class="row left-align demoClass ">
                        <?php
                        $counter = 1;
                        $ans = "ans";
                        $sql = "select * from rqz_questions where id IN (" . $qIds . ")";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $qId = $row["id"];
                                $question = $row["zt_question"];
                                $optionA = $row["xs_option_a"];
                                $optionB = $row["bf_option_b"];
                                $optionC = $row["yj_option_c"];
                                $optionD = $row["kf_option_d"];
                                $ans = "ans" . $counter;
                                echo '
                              <br>
                              <div class="col m3"><h2 class="center-align" style="color:#008B8B">Q' . $counter++ . '</h2></div>
                              <div class="col m9 center-align">';
                                if (!empty($row["QImg"])) {
                                    echo '<images class="materialboxed" width="100%" src="' . $row["QImg"] . '">';
                                }
                                echo '<h4>' . $question . '</h4>
                                <div class="row">

                                <p class="col m6" style="padding-bottom:1em"><input type="radio" name="' . $ans . '" id="' . $optionA . $qId . '" value="' . $optionA . '"><label for="' . $optionA . $qId . '" style="font-size:20px">' . $optionA . '</label></p>
                                <p class="col m6" style="padding-bottom:1em"><input type="radio" name="' . $ans . '" id="' . $optionB . $qId . '" value="' . $optionB . '"><label for="' . $optionB . $qId . '" style="font-size:20px">' . $optionB . '</label></p>
                                <p class="col m6" style="padding-bottom:1em"><input type="radio" name="' . $ans . '" id="' . $optionC . $qId . '" value="' . $optionC . '"><label for="' . $optionC . $qId . '" style="font-size:20px">' . $optionC . '</label></p>
                                <p class="col m6" style="padding-bottom:1em"><input type="radio" name="' . $ans . '" id="' . $optionD . $qId . '" value="' . $optionD . '"><label for="' . $optionD . $qId . '" style="font-size:20px">' . $optionD . '</label></p>
                                
                                </div>
                              </div>
                            ';
                            }
                        } else {
                            session_unset();
                            session_destroy();
                            redirect("home?tab=login&status=failed&message=Error Occurred");
                        }

                        ?>
                    </div>
                    <div class="card-action center">
                        <button class="btn btn-medium waves-effect waves-light" type="submit" name="submit">
                            Submit<i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">

    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>
<script type="text/javascript">
    var timer = setInterval(function () {
        var time_left;
        //$(document).ready(function(){
        var time = new Date();

        var present_hours = time.getHours();
        var present_min = time.getMinutes();
        var present_secs = time.getSeconds();
        console.log("on load present (to be subtracted from endtime) " + present_hours + ":" + present_min + ":" + present_secs);

        var start = "<?=$time;?>";
        var darray = start.split(':');
        var end_hour = parseInt(darray[0]);
        var end_minutes = parseInt(darray[1]);
        var end_seconds = parseInt(darray[2]);

        end_hour = end_hour + 5;
        end_minutes = end_minutes + 30;

        if (end_minutes >= 60) {
            end_minutes = end_minutes - 60;
            end_hour = end_hour + 1;
        }

        var left_hour = 0;
        var left_minutes;
        var left_seconds;

        console.log(" quiz end time in IST " + end_hour + ":" + end_minutes + ":" + end_seconds);


        if (end_minutes < present_min) {
            left_minutes = end_minutes + 60 - present_min;
            left_hour = -1;
        } else {
            left_minutes = end_minutes - present_min;
        }
        if (end_seconds < present_secs) {
            left_seconds = end_seconds + 60 - present_secs;
            left_minutes -= 1;
        } else {
            left_seconds = end_seconds - present_secs;
        }
        left_hour = left_hour + end_hour - present_hours;

        if (left_hour != 0) {
            left_hour = 0;
        }
        if (left_minutes > 15) {
            left_minutes = 15;
        }

        time_left = (left_hour) + ":" + (left_minutes) + ":" + (left_seconds);
        console.log("time left end - previous " + time_left);

        document.getElementById('timer_div').innerHTML = time_left;

        if ((left_minutes < 0)) {
            $('form input[type="radio"]').prop("disabled", true);
            clearInterval(timer);
            alert("Quiz time up.Please Submit your Answers.");
        }

    }, 1000);

</script>
</body>
</html>
