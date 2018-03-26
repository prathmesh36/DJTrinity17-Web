        <div id="fh5co-project">
            <div class="container">
                <div class="row">
                    <h2 class="text-center">Upcoming Events</h2>
                </div>				
					 	<?php
						include 'admin/quiz/connect.php';
						$cdate=date('Y-m-d');
						$query="SELECT * FROM event WHERE evtdate>='".$cdate."' ORDER BY evtdate,stime Limit 0,3";
						$query_run=mysql_query($query);
						while($qdata=mysql_fetch_assoc($query_run))
						{
						?>					  
							<div class="card col-md-4 col-sm-6 fh5co-project text-center" style="width: 35rem;margin-left:2%;">
							  <a href="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" data-lightbox="gallery" data-title="<?php echo $qdata['descrip'];?>"><img class="card-img-top img-responsive" src="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" alt="Card image cap"></a>
							  <div class="card-block">
								<h3 class="card-title" style="margin-top:20px;"><?php echo $qdata['title'];;?></h3>
								<img src="">
								<p class="card-text"><?php echo $qdata['descrip'];?></p>
								<button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $qdata['id']?>">Details</button>
							  </div>
							</div>							
						<?php
						}
						?>
			</div>
        </div>