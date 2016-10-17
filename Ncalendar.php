<?PHP
class calendar{
	
	private $dayLabels = array("MON","TUE","WED","THU","FRI","SAT","SUN"); 
    private $CurrYear;
	private $CurrMonth;
	private $daysInMonth;
	private $headerHref;
	
	
	public function __construct(){
		
		//date_default_timezone_set("Africa/Cairo");
//		$this->headerHref = htmlentities($_SERVER['PHP_SELF']);
//    
		}
	
	public function set($year,$month){
		$this->CurrYear = $year;
		$this->CurrMonth = $month;
		}
	
	public function draw_calendar($year, $month){
			
		$this->CurrMonth=$month;
		$this->CurrYear= $year;
		$this->daysInMonth= date('t',strtotime($year.'-'.$month.'-01'));
		
		$calendar = $this->create_header().
					'<div class="calendar-display">
					<table class="calendar-table">
						<tr>';
							foreach($this->dayLabels as $day){
								$calendar .= '<th class="calendar-header">' .$day .'</th>';
								}
		$calendar	.=  '</tr>';
					
		$first_day = $this->get_StartDayOfMonth($year,$month);
			
		if(($first_day > 5 && $this->daysInMonth == 31) || ($first_day > 6 && $this->daysInMonth == 30)){
			$weeksInMonth = 6;
			}
		else{
			$weeksInMonth = 5;
			}
			
		$dayCounter =1;
			
		for($rows = 1; $rows <= $weeksInMonth; $rows++){
			$calendar .= '<tr>';
			if ($rows == 1){
				for($cols = 1; $cols < $first_day; $cols++){
					$calendar .= '<td></td>';
					}
				for($cols = $first_day; $cols <= 7; $cols++){
					$calendar .= '<td class="cell">'.$dayCounter."</td>";
					$dayCounter ++;
					}
				}
			else{
				for($cols = 1; $cols <= 7; $cols++){
					if($dayCounter <= $this->daysInMonth){
						$calendar .= '<td class="cell">'.$dayCounter.'</td>';
						}
					else{
						$calendar .= '<td></td>';
						}
						$dayCounter ++;
					}
				}
			$calendar .= '</tr>';
			}
		$calendar .='</table> 
					</div> </div></div>';
					
					echo $calendar;
		}	
	
	
	public function create_header(){
	
		$month = date("n",strtotime($this->CurrYear.'-'.$this->CurrMonth.'-01'));
	
		$nextMonth=null; $yearOFNextMonth=null;
		if(intval($month) === 12){
			$nextMonth=1;
			$yearOFNextMonth = intval($this->CurrYear)+1;
			$NMonth =date("M", strtotime($yearOFNextMonth.'-'.$nextMonth.'-01'));
		}
		else{
			$nextMonth = intval($month)+1;
			$yearOFNextMonth = $this->CurrYear;
			$NMonth =date("M", strtotime($yearOFNextMonth.'-'.$nextMonth.'-01'));
		}
		
		$preMonth =null; $yearOfPreMonth=null;
		if(intval($month) ==1){
			$preMonth =12;
			$yearOfPreMonth =intval($this->CurrYear)-1;
			$pMonth= date("M", strtotime($yearOfPreMonth.'-'.$preMonth.'-01'));
			}
		else{
			$preMonth = intval($month) -1;
			$yearOfPreMonth = $this->CurrYear;
			$pMonth= date("M", strtotime($yearOfPreMonth.'-'.$preMonth.'-01'));	
				}
	
		return 
				'<div class="header">
					<table class="calendar-header">
        				<tr>
							<td class="left">
								<a onClick="javascript:showCalendar('.$yearOfPreMonth.',\''.$pMonth.'\');"><i class=" glyphicon glyphicon-chevron-left"></i></a>
                				<a onClick="javascript:showCalendar('.$yearOFNextMonth.',\''.$NMonth.'\');"><i class=" glyphicon glyphicon-chevron-right"></i></a>
							</td>

							<td class="middle">
								<h5 class="month"> '.date('M',strtotime($this->CurrYear.'-'.$this->CurrMonth.'-1')).'</h5>
								<h5 class="year"> '.date('Y',strtotime($this->CurrYear.'-'.$this->CurrMonth.'-1')).'</h5>
							</td>

							<td class="right">
                				<i class="fa fa-calendar icon" data-toggle="popover" data-trigger="click" id="selector"></i>
							</td>
						</tr>
					</table>
				</div>';
		
		}
		
		
	
	public function get_StartDayOfMonth($year,$month){
	
		$month = date("F",strtotime($year.'-'.$month.'-01'));	
		return date("N", strtotime($year.'-'.$month.'-01'));
	
		}
		
	public function get_daysInMonth(){
		
		
		}
	
	}
?>
