<?php 

$dbhost = "localhost";
$dbuser = "";
$dbpass = "";
$dbname = "";

 
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$sql = "SELECT event_url FROM event_gallery;";
 
$res = mysqli_query($con,$sql);

$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,array('url'=>$row[0]));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>