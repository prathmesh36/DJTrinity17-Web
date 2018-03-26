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

$sql = "update aei_users set vse_read_rules = 1 where iq_sap_id = '".$_SESSION["sap_id"]."'";
$result = $conn->query($sql);
if($result){
    redirect("../quiz");
}else{
    session_unset();
    session_destroy();
    redirect("../home?tab=login&status=failed&message=Something Went Wrong");
}
?>