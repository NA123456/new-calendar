// JavaScript Document


function setCalendar(year, month){
	$.ajax({
		url:'handler.php',
	
		data:{y:year, m:month, action:'set'},
		success: function(result){
				
			}
		});
	}
	
function showCalendar(year,month){
	$.ajax({
		type: 'POST',
		url:'handler.php',
		data:"action=show&y="+year+"&m="+month,
		success: function(res){
			$(".calendar-content").html(res);
			}
		});
	}
	
function retrivedata (e){
	$.ajax({
		type:'POST',
		url:'retrive.php',
		data:"e="+e,
		success: function(res){
			$(".event").html(res);
			}
		});
	}
	
function Event(user, title, date, hour, minute, details){
	$.ajax({
		type:'POST',
		url:'event_handler.php',
		data:"user="+user+"&title="+title+"&date="+date+"&hour="+hour+"&minute="+minute+"&details="+details,
		success: function(res){
			$(".calendar-content").html("");
			$(".calendar-content").html(res);
			}
		})
	}

tinymce.init({
  selector: 'textarea',
  height: 200,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});

 $(document).ready(function(){
    $('#selector').popover({
		 title:"Date Selector" ,
		 content:'<div id="popover-content"><form action="handler.php" method="post"><div class="form-inline"><select name="monthSelector"  style="width:90px; height:26px;"><option value="jan">January</option><option value="feb">February</option><option value="Mar">March</option><option value="Apr">April</option><option value="jun">June</option><option value="july">July</option></option><option value="aug">August</option></option><option value="Seb">September</option><option value="act">October</option><option value="nov">November</option><option value="dec">December</option></select><input type="text" name="year" style="width:60px;"/><button class="glyphicon glyphicon-chevron-right btn btn-warning" name="go"></button></div></form> </div>',
		 html:true,
		 placement:"bottom",
		
		});
});

$(document).ready(function() {
$(".cell").on('click',function(){
	$(".calendar-content").css("opacity","0.3"),
	$(".calendar-content").html();
	});
    
});
	
	