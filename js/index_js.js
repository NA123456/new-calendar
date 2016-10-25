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
	
function getDataForm(){
	var y = document.getElementById('yy').value;
	var m = document.getElementById('monthSelector').value;
	showCalendar(y,m);
	}
	
function retrivedata (u, id, t, d, h, m, de){
	$.ajax({
		type:'POST',
		url:'handler.php',
		data:"action=retrive&u="+u+"&id="+id+"&t="+t+"&d="+d+"&h="+h+"&m="+m+"&de="+de,
		success: function(res){
			$(".nEvent").html(res);
			}
		});
	}
	
function edit(u, id, t, d, h, m, de){
	$.ajax({
		type:'POST',
		url:'handler.php',
		data:"action=edit&u="+u+"&id="+id+"&t="+t+"&d="+d+"&h="+h+"&m="+m+"&de="+de,
		success: function(res){
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
		 content:'<div id="popover-content"><form ><select id="monthSelector" class="col-sm-5" style=" height:30px;"><option value="Jan">January</option><option value="Feb">February</option><option value="Mar">March</option><option value="Apr">April</option><option value="May">May</option><option value="Jun">June</option><option value="Jul">July</option><option value="Aug">August</option><option value="Sep">September</option><option value="Oct">October</option><option value="Nov">November</option><option value="Dec">December</option></select><text>&nbsp;</text><input type="text" id="yy" class="col-sm-4"/><button type="submit" onclick="getDataForm();" class="glyphicon glyphicon-chevron-right btn btn-warning" name="go"></button></form> </div>',
		 html:true,
		 placement:"left",
		
		});
});

//$(document).ready(function() {
//$(".cell").on('click',function(){
//	$(".calendar-content").css("opacity","0.3"),
//	$(".calendar-content").html();
//	});
    
//});
	
	