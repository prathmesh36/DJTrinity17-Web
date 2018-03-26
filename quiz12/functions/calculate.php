<?php
require_once "../classes/DBConnect.php";
require_once "../classes/Security.php";
require_once "../classes/Constants.php";

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


$ans[0] = isset($_POST["ans1"]) ? $_POST["ans1"] : "NULL";
$ans[1] = isset($_POST["ans2"]) ? $_POST["ans2"] : "NULL";
$ans[2] = isset($_POST["ans3"]) ? $_POST["ans3"] : "NULL";
$ans[3] = isset($_POST["ans4"]) ? $_POST["ans4"] : "NULL";
$ans[4] = isset($_POST["ans5"]) ? $_POST["ans5"] : "NULL";
$ans[5] = isset($_POST["ans6"]) ? $_POST["ans6"] : "NULL";
$ans[6] = isset($_POST["ans7"]) ? $_POST["ans7"] : "NULL";
$ans[7] = isset($_POST["ans8"]) ? $_POST["ans8"] : "NULL";
$ans[8] = isset($_POST["ans9"]) ? $_POST["ans9"] : "NULL";
$ans[9] = isset($_POST["ans10"]) ? $_POST["ans10"] : "NULL";

$department = "";
$qIds = "";
$sql = "select jr_questions_list, zp_department as d from aei_users where iq_sap_id = " . $_SESSION["sap_id"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $qIds = $row["jr_questions_list"];
        $department = $row["d"];
    }
} else {
    session_unset();
    session_destroy();
    redirect("../home?tab=login&status=failed&message=Error Occurred");
}

$questionID = explode(',', $qIds);

$count = 0;
$right = 0;
$wrong = 0;
$nA = 0;

$sql = "select qk_answer as a from rqz_questions where id in (" . $qIds . ")";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($ans[$count] == $row["a"]) {
            $right++;
        } elseif ($ans[$count] == "NULL") {
            $nA++;
        } else {
            $wrong++;
        }
        $count++;
    }
} else {
    session_unset();
    session_destroy();
    redirect("home?tab=login&status=failed&message=Error Occurred");
}

$multiply = 1;
if($dept == "it"){
    $multiply = 2;
}

$right *= $multiply;
$wrong *= $multiply;
$nA *= $multiply;

$total = $right + $wrong + $nA;
$_SESSION["score"] = $right;
$_SESSION["right"] = $right;
$_SESSION["wrong"] = $wrong;
$_SESSION["nA"] = $nA;

$sql = "update aei_users set xi_score = " . $right . " where iq_sap_id = '".$_SESSION["sap_id"]."'";
if($conn->query($sql)){
    redirect("../pie");
}else{
    session_unset();
    session_destroy();
    redirect("home?tab=login&status=failed&message=Error Occurred");
}
?>