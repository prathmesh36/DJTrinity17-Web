<?php
include 'admin/event/connect.php';

						$cdate=date('Y-m-d');
						$id=$_GET['id'];
						$query="SELECT * FROM event WHERE id='".mysql_real_escape_string($id)."'";
						$query_run=mysql_query($query);
						while($qdata=mysql_fetch_assoc($query_run))
						{
							  $rstime=substr($qdata['stime'],0,strpos($qdata['stime'],':'));
							  $retime=substr($qdata['etime'],0,strpos($qdata['stime'],':'));				  
							  if($rstime>=12 || $retime>=12)
							  {
								 $sflag="am";								  
								 $eflag="am";
								 if($rstime>12)	
								 {
								 $rstime=$rstime-12;
								 $sflag="pm";
							     }
								 if($retime>12)
							     {
  								 $retime=$retime-12;
								 $eflag="pm";
								 }
								 if($rstime==12)
									 $sflag="pm";
								 if($retime==12)
									 $eflag="pm";								 
								 $strtime=$rstime.':'.substr($qdata['stime'],3,2).$sflag.' '; 
								 if($qdata['etime']!="00:00:00")
								  $strtime = $strtime.'to '.$retime.':'.substr($qdata['etime'],3,2).$eflag;										 
							  }	
							   else
							   {
								 $strtime=$rstime.':'.substr($qdata['stime'],3,2).'am '; 
								 if($qdata['etime']!="00:00:00")
								 $strtime= $strtime.'to '.$retime.':'.substr($qdata['etime'],3,2).'am</p>';										 					   
							   }
							 echo $qdata['id'].','.$qdata['title'].','.$qdata['descrip'].','.$qdata['venue'].','.$qdata['evtdate'].','.$strtime.','.$qdata['price'];
						}	

?>