<?php
require_once "../classes/DBConnect.php";
require_once "../classes/Security.php";

$conn = DBConnect::getInstance();
$security = new Security($conn);

function redirect($url)
{
    header("Location: " . $url);
    exit();
}

session_start();
if (isset($_SESSION["sap_id"], $_SESSION["token"])) {
    redirect("../quiz");
}

if ($security->is_ip_blocked()) {
    redirect("../banned");
}

if (isset($_POST["sap_id"], $_POST["name"], $_POST["department"], $_POST["year"], $_POST["password"], $_POST["confirm_password"])) {

    $sap_id = mysqli_real_escape_string($conn, $_POST["sap_id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $dept = mysqli_real_escape_string($conn, $_POST["department"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    if ($password !== $confirm_password) {
        redirect("../home?tab=register&status=" . Constants::STATUS_FAILED . "&message=Passwords Do Not Match");
    }

    if (strlen($sap_id) != 11) {
        redirect("../home?tab=register&status=" . Constants::STATUS_FAILED . "&message=SAP IDs Is Invalid");
    }

    if (substr($sap_id, 0, 4) != "6000") {
        redirect("../home?tab=register&status=" . Constants::STATUS_FAILED . "&message=SAP IDs Is Invalid");
    }

    if (strlen($password) < 8) {
        redirect("../home?tab=register&status=" . Constants::STATUS_FAILED . "&message=Password Length Must Be 8 Characters");
    }

    $password = sha1($password);

    $counter = 0;
    $questions_array = array();

    $sql = "SELECT id FROM rqz_questions ORDER BY RAND() LIMIT 10";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions_array[$counter++] = $row["id"];
        }
    } else {
        redirect("../home?tab=register&status=failure&message=Something Went Wrong");
    }


    $questions_list = implode(",", $questions_array);


    $sql = "insert into aei_users (iq_sap_id, kz_password, qo_name, zp_department, ky_year, jr_questions_list) " .
        "values('$sap_id', '$password', '$name', '$dept', '$year', '$questions_list')";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION["sap_id"] = $sap_id;
        redirect("../verify");
    } else {
        redirect("../home?tab=register&status=" . Constants::STATUS_FAILED . "&message=Already Registered");
    }
}else{
    redirect("../home?tab=register&status=" . Constants::STATUS_FAILED . "&message=In Valid Values Submitted");
}
?>