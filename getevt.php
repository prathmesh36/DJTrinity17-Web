<?php
include 'admin/event/connect.php';

						$cdate=date('Y-m-d');
						$id=$_GET['id'];
                                                $query="SELECT * FROM event WHERE id=".$id.";";
						$query_run=$conn->query($query);
						while($qdata=$query_run->fetch_assoc())
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
							   $date=date_create($qdata['evtdate']);
							   $evtdate=date_format($date,"dS-M-Y");
							 echo $qdata['id'].'~'.$qdata['title'].'~'.$qdata['descrip'].'~'.$qdata['venue'].'~'.$evtdate.'~'.$strtime.'~'.$qdata['price'].'~'.$qdata['coord'].' : <a href="tel:.'.$qdata['coord_no'].'"><span class="glyphicon glyphicon-earphone"></span> &nbsp'.$qdata['coord_no'].'</a>~'.$qdata['regurl'];
						}	

?>