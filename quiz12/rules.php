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

        .row {
            padding-top: 4%;
        }
    </style>
</head>
<?php
$sql = "SELECT qo_name as name, zp_department as dept, ky_year as year, ap_image_url as image FROM aei_users WHERE iq_sap_id = '" . $_SESSION["sap_id"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $dept_init = $row["dept"];
        $year_init = $row["year"];
        $url = $row["image"];

        switch ($year_init){
            case 1:
                $year = "First Year";
                break;
            case 2:
                $year = "Second Year";
                break;
            case 3:
                $year = "Third Year";
                break;
            case 4:
                $year = "Fourth Year";
                break;
        }

        switch ($dept_init){
            case "comps":
                $dept = "Computer Engineering";
                break;
            case "bioprod":
                $dept = "Bio-Prod Engineering";
                break;
            case "elec":
                $dept = "TElectronic Engineering";
                break;
            case "chem":
                $dept = "Chemical Engineering";
                break;
            case "extc":
                $dept = "Electronics And Telecomunications";
                break;
            case "it":
                $dept = "Information Technology";
                break;
            case "mech":
                $dept = "Mechanical Engineering";
                break;
        }
    }
} else {
    redirect("home?tab=login&status=" . Constants::STATUS_FAILED . "&message=Invalid Attempt");
}
?>

<body>
<div class="row">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-content">
                <div class="col s2 m2"><img src=<?= $url ?> class="circle responsive-img"></div>
                <div class="col s10 m10"><span class="card-title right-align"> <?= $name ?></span><br>
                    <?= $_SESSION["sap_id"] ?><br><?= $year ?>, <?= $dept ?><br><br></div>
                <hr>
                <span class="card-title">Rules and Regulations</span>
                <p><span class="left-align">
              <ol type="1">
                <li>You will be asked objective questions</li>
                <li>You are required to answer each question in the stipulated time.</li>
                <li>If you fail to answer, the question is forfieted</li>
                <li>Once you have selected your answer, you can procced to the next question.</li>
                <li>Remaining time is not carried forward</li>
                <li>The end result of your test will be displayed</li>
              </ol>
            </span></p>
            </div>
            <div class="card-action">
               <a href="functions/read_rules">
                        <button class="btn btn-medium waves-effect waves-light" type="submit" name="begin"
                                id="btn_submit" value="Begin">Begin<i class="material-icons right">send</i></button>
               </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>

