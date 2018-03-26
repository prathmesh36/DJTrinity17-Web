<?php 

$dbhost = "localhost";
$dbuser = "";
$dbpass = "";
$dbname = "";

 
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$sql = "SELECT id FROM sponsors;";
 
$res = mysqli_query($con,$sql);

$result = array();
 
while($row = mysqli_fetch_array($res)){
   $result[]=$row['id'];
}

foreach($result as $key=>$value){
   $sql="UPDATE sponsors SET `image`='http://www.djtrinity.in/assets/sponsors/".$key.".jpg' WHERE `id`=".$key.";";
   $res = mysqli_query($con,$sql);

}
print_r($result);
 
mysqli_close($con);
 
?>