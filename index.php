<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/index_style.css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/index_js.js"></script>

<title>Calendar</title>
</head>

<body>

 <?php
		include "events.php";
		$_event = new events();
		?>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Event</h4>
        </div>
        <div class="modal-body">
        
        <!-- Form content -->
         <form class="event" action="event_handler.php" method="post">

			<div class="form-inline f">
 				<div class="form-group">
    				<label for="user">User</label><br />
   					<input type="text" class="form-control" id="user" name="user" >
  				</div>
			</div>
 
			<div class="form-group f2">
    			<label for="title">Title</label>
    			<input type="text" class="form-control" id="title" name="title" required>
             </div>
  
  
 			<div class="form-inline f">
				<div class="form-group f3">
					<label for="idate">Date</label><br />
					<input type="date" class="form-control" id="idate" placeholder="2016-10-20" required name="date">
              	</div>
  
				<div class="form-group f3">
					<label for="hour">Hour</label><br />
    				<input type="number" class="form-control" id="hour" placeholder="00" name="hour" min="1" max="24">
  				</div>
  
 	 			<div class="form-group f3">
    				<label for="minute">Minute</label><br />
    				<input type="number" class="form-control" id="minute" placeholder="00" name="minute" min="00" max="60">
  				</div> 
  			</div>
  
 			<div class="form-group f2">
				<label for="details">Details </label>
  				<textarea class="form-control" id="details" name="details"></textarea>
  			</div>
  
 		 	
        <div class="modal-footer">
 			<button type="submit" class="btn btn-danger btn-default"><span class="glyphicon glyphicon-remove"></span> Cancel 
  			</button>
 			<button type="submit" name="save" class="btn btn-success btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Save 
  			</button>
        </div>
        </form>
        <!-- end form -->
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->


<!-- Modal -->
  <div class="modal fade" id="EventsModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">All Events</h4>
        </div>
        <div class="modal-body">    
        <!-- Form content -->
         <form>
			    <?php echo $_event->getAllEvents();?>
        </form>
        <!-- end form -->
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->




 
<nav class="navbar navbar-inverse nav-color">
	 <div class="container-fluid">
    
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
        	<a href="#"><i class="fa fa-dashboard"></i> Dashboard </a>
         </li>
        <li data-toggle="modal" data-target="#myModal"><a href="#"><span class="glyphicon glyphicon-plus"></span> New Event</a>
        </li>
      <!--  <li><a href="#" id="events">Events</a></li>-->
        
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#EventsModal" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-random"></span> Events <span class="caret"></span></a>
          <ul class="dropdown-menu">
       
          </ul>
        </li>
       
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="body-container container-fluid">
	    <div class="row">
        <div class="upcoming-event col-sm-3">
        <div class="">
            <h3>Upcoming Events</h3>
            <hr />
           <?php
            $_event->getUpComingEvents();
            ?>
        </div>
	</div>

        <div class="calendar-content col-sm-9" >
            
            
        <?php 
        include 'Ncalendar.php';
        $calendar = new calendar();
        $calendar->draw_calendar($year = date("Y",time()),$month = date("M",time()));
        ?>
        
        </div>
      
    </div>
</div>



<!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Event</h4>
        </div>
        <div class="modal-body nEvent">
        
        <!-- Form content -->
      
        <!-- end form -->
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->

</body>
</html>
