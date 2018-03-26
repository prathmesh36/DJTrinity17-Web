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

$dept = "";

$sql = "select zp_department as d, xi_score as s, (sum(s)/count(s)) as t  from aei_users where iq_sap_id = " . $_SESSION["sap_id"] . ";";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dept = $row["d"];
    }
} else {
    echo "<script type='text/javascript'>alert('An error was encountered');</script>";
    header("location:../home.php");

}

// echo $dept;

$score = 0;
$entries = 0;
$sql = "SELECT Score, Entries FROM departmentstandings WHERE DepartmentName LIKE '" . $dept . "';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $score = $row["Score"];
        $entries = $row["Entries"];
    }
} else {

    echo "<script type='text/javascript'>alert('An error was encountered');</script>";
    header("location:../home.php");
}

$score = $score + $_SESSION["score"];
$entries++;
$tally = $score / $entries;

$sql = "UPDATE departmentstandings SET Score=" . $score . ",Entries=" . $entries . ",Tally=" . $tally . " WHERE DepartmentName LIKE '" . $dept . "'";

//echo "<br><br>".$sql."<br><br>";

if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
    echo "<script type='text/javascript'>alert('An error was encountered');</script>";
    header("location:../home.php");
}
$sql = "UPDATE users SET Score=" . $_SESSION["score"] . " WHERE SapId LIKE " . $_SESSION["SAP"] . ";";

//echo "<br><br>".$sql."<br><br>";

if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
    echo "<script type='text/javascript'>alert('An error was encountered');</script>";
    header("location:../home.php");
}
// @session_destroy();
header("location:../interdepartment.php")
?>