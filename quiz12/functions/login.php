<?php
require_once "../classes/DBConnect.php";
require_once "../classes/Security.php";
require_once "../classes/Constants.php";

$conn = DBConnect::getInstance();
$security = new Security($conn);

function redirect($url){
    header("Location: " . $url);
    exit();
}

session_start();
if (isset($_SESSION["sap_id"])) {
    redirect("../quiz");
}

if ($security->is_ip_blocked()) {
    redirect("../banned");
}

if(isset($_REQUEST["sap_id"], $_REQUEST["password"])){
    $sap=$conn->real_escape_string(trim($_REQUEST['sap_id']));
    $pass=sha1($conn->real_escape_string(trim($_REQUEST['password'])));

    $sql = "SELECT qo_name, zp_department, mp_token, xi_score FROM aei_users WHERE iq_sap_id = '".$sap."' AND kz_password = '".$pass."';";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row["mp_token"] != "null"){
            if($row["xi_score"] != -1){
                session_unset();
                session_destroy();
                redirect("../home?tab=login&status=".Constants::STATUS_FAILED."&message=You have already taken the Quiz");
            }else{
                $_SESSION["sap_id"]=$sap;
                redirect("../rules");
            }
        }else{
            redirect("verify");
        }
    }
    else {
        redirect("../home?tab=login&status=".Constants::STATUS_FAILED."&message=Invalid Credentials");

    }
}else{
    redirect("../home?tab=login&status=".Constants::STATUS_FAILED."&message=Invalid Submission");
}

?>