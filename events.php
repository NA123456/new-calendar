<?php

class events {
	
	private $db;
	
	public $user=null;
	public $title=null;
	public $datee=null;
	public $hour=null;
	public $minute=null;
	public $details=null;
	
	public function  __construct(){
		try {
			
		$this->db = new PDO("mysql:host=localhost; dbname=events_database","root","");
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $ex){
			echo $ex->getMessage();
			exit();
			}
	}
	
	public function add_event($user, $title, $date, $hour, $minute, $details){
		
		$addQuery = "INSERT INTO events (user, title, date, hour, minute, details) VALUES (:user, :title, :date, 			
		:hour, :minute, :details)";
		
		$pdoRes = $this->db->prepare($addQuery);
		
		$pdoRes->bindParam(":user",$user);
		$pdoRes->bindParam(":title",$title);
		$pdoRes->bindParam(":date",$date);
		$pdoRes->bindParam(":hour",$hour);
		$pdoRes->bindParam(":minute",$minute);
		$pdoRes->bindParam(":details",$details);
		
		$pdoExc = $pdoRes->execute();
		
		$this->db = null;
		}
	
	
	public function getUpComingEvents(){
	
		$event_div = '<div class="_event">';
	
	$currdate = date("Y-m-d");
		$getQuery ="SELECT * FROM events WHERE date >= CURDATE()";
		$pdoRes = $this->db->prepare($getQuery);
		$pdoRes->execute();
		 
		$events = $pdoRes->fetchAll();
		
		foreach( $events as $e){
		
		$title = $e['title'];
		$date = $e['date'];
		$event_div .= '<h5><b style="color:#00cc44">'.$title.'</b></h5><h5><i class="fa fa-clock-o" aria-hidden="true"></i> '.$date.'</h5> <hr/>';
		
			}

		
		$event_div .='</div>';
		
		echo $event_div;
		}
	
	function getAllEvents(){
		$getQuery ="SELECT * FROM events";
		$pdoRes = $this->db->prepare($getQuery);
		$pdoRes->execute();
		$events = $pdoRes->fetchAll();
		
		$allEvents ='';
		foreach( $events as $e){
			$this->user = $e['user'];	
			$this->title = $e['title'];
			$this->datee = $e['date'];
			$this->hour = $e['hour'];
			$this->minute = $e['minute'];
			$this->details = $e['details'];
			
			
			$allEvents .='<div class="getEvent">';
			$allEvents .= '<li onclick="javascript:retrivedata(\''.$e['user'].'\',\''.$e['title'].'\' ,\''.$e['date'].'\' ,'.$e['hour'].' ,'.$e['minute'].' ,\''.$e['details'].'\');" data-toggle="modal" data-target="#myModal2"><a class="title">'.$e['title'].'</a><a class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> '.$e['date'].'</a></li></div>';
		}
		
		return $allEvents;
		}
	
	function retriveEvent($user, $title, $date, $hour, $minute, $details){
		
	echo ' <form class="event" action="event_handler.php" method="post">
        	<div class="form-inline f">
 				<div class="form-group">
    				<label for="user">User</label><br />
   					<input type="text" class="form-control" id="user" name="user" value="'.$user.'" >
  				</div>
			</div>
 
			<div class="form-group f2">
    			<label for="title">Title</label>
    			<input type="text" class="form-control" id="title" name="title" value="'.$title.'" >
             </div>
  
  
 			<div class="form-inline f">
				<div class="form-group f3">
					<label for="date">Date</label><br />
    				<input type="date" class="form-control" id="date" placeholder="2016-10-20" required name="date" value="'.$date.'">
  				</div>
  
				<div class="form-group f3">
					<label for="hour">Hour</label><br />
    				<input type="number" class="form-control" id="hour" placeholder="00" name="hour" value="'.$hour.'">
  				</div>
  
 	 			<div class="form-group f3">
    				<label for="minute">Minute</label><br />
    				<input type="number" class="form-control" id="minute" placeholder="00" name="minute" value="'.$minute.'">
  				</div>
  			</div>
  
 			<div class="form-group f2">
				<label for="details">Details </label>
  				<textarea class="form-control" id="details" name="details">'.$details.'</textarea>
  			</div>
  
 		 	
        <div class="modal-footer">
 			<button type="submit" class="btn btn-danger btn-default"><span class="glyphicon glyphicon-remove"></span> Delete 
  			</button>
 			<button type="submit" class="btn btn-success btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Update 
  			</button>
        </div>
		</form>';
		
		}
	
	
	function edit_event($user, $title, $date, $hour, $minute, $details){
		
		$editQuery ="UPDATE events SET user=:user, title=:title, date=:date, hour=:hour, minute=:minute, details=:details";
		$pdoRes = $this->db->prepare($editQuery);
		
		$pdoRes->bindParam(":user", $user);
		$pdoRes->bindParam(":title", $title);
		$pdoRes->bindParam(":date", $date);
		$pdoRes->bindParam(":hour", $hour);
		$pdoRes->bindParam(":minute", $minute);
		$pdoRes->bindParam(":details", $details);
		
		$pdoRes->execute();
		echo $user;
		
		}
	
	
	function delete_event($user, $title, $date, $hour, $minute, $details){
		
		$deleteQuery = "DELETE FROM events where (((((user=:user AND title=:title) AND date=:date) AND hour=:hour) AND minute=:minute)AND details=:details)";
		
		$pdoRes = $this->db->prepare($deleteQuery);
		
		$pdoRes->bindParam(":user", $user);
		$pdoRes->bindParam(":title", $title);
		$pdoRes->bindParam(":date", $date);
		$pdoRes->bindParam(":hour", $hour);
		$pdoRes->bindParam(":minute", $minute);
		$pdoRes->bindParam(":details", $details);
		
		$pdoRes->execute();
		}
	
	
	
	function event_data($user, $title, $date, $hour, $minute, $details){
		
		$form = 
		     ' <form>

			<div class="form-inline f">
 				<div class="form-group">
    				<label for="user">User</label><br />
   					<input type="text" class="form-control" id="user" name="user" value="'.$user.'" >
  				</div>
			</div>
 
			<div class="form-group f2">
    			<label for="title">Title</label>
    			<input type="text" class="form-control" id="title" name="title" value="'.$title.'">
             </div>
  
  
 			<div class="form-inline f">
				<div class="form-group f3">
					<label for="date">Date</label><br />
    				<input type="text" class="form-control" id="date" placeholder="2016-10-20" required name="date" value="'.$date.'">
  				</div>
  
				<div class="form-group f3">
					<label for="hour">Hour</label><br />
    				<input type="number" class="form-control" id="hour" placeholder="00" name="hour" value="'.$hour.'">
  				</div>
  
 	 			<div class="form-group f3">
    				<label for="minute">Minute</label><br />
    				<input type="number" class="form-control" id="minute" placeholder="00" name="minute" value="'.$minute.'">
  				</div>
  			</div>
  
 			<div class="form-group f2">
				<label for="details">Details </label>
  				<textarea class="form-control" id="details" name="details"> '.$details.'</textarea>
  			</div>
  
 		 	<div class="form-check">
    			<label class="form-check-label">Private <input class="form-check-input" type="checkbox"></label>
  			</div>
  
  			<div class="form-check">
    			<label class="form-check-label"><input class="form-check-input" type="checkbox"> Delete</label>
  			</div>
 
		
        <div class="modal-footer">
 			<button type="submit" class="btn btn-danger btn-default"><span class="glyphicon glyphicon-remove"></span> Cancel 
  			</button>
 			<button type="submit"class="btn btn-success btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Save 
  			</button>
        </div>
        </form>';
		
		echo $form;
		}
	
	
	}
?>