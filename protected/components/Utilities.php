<?php
class Utilities{
	
    function secondsToTime($seconds)
	{
	    // extract hours
	    $hours = floor($seconds / (60 * 60));
	 
	    // extract minutes
	    $divisor_for_minutes = $seconds % (60 * 60);
	    $minutes = floor($divisor_for_minutes / 60);
	 
	    // extract the remaining seconds
	    $divisor_for_seconds = $divisor_for_minutes % 60;
	    $seconds = ceil($divisor_for_seconds);
	 
	    // return the final array
	    $obj = array(
	        "h" => (int) $hours,
	        "m" => (int) $minutes,
	        "s" => (int) $seconds,
	    );
	    return $obj;
	}
	public static function week_from_sunday($date) {
		// Assuming $date is in format DD-MM-YYYY
		list($day, $month, $year) = explode("-", $date);
	
		// Get the weekday of the given date
		$wkday = date('l',mktime('0','0','0', $month, $day, $year));
	
		switch($wkday) {
			case 'Sunday': $numDaysToMon = 0; break;
			case 'Monday': $numDaysToMon = 1; break;
			case 'Tuesday': $numDaysToMon = 2; break;
			case 'Wednesday': $numDaysToMon = 3; break;
			case 'Thursday': $numDaysToMon = 4; break;
			case 'Friday': $numDaysToMon = 5; break;
			case 'Saturday': $numDaysToMon = 6; break;
	
		}
	
		// Timestamp of the monday for that week
		$monday = mktime('0','0','0', $month, $day-$numDaysToMon, $year);
	
		$seconds_in_a_day = 86400;
	
		// Get date for 7 days from Monday (inclusive)
		for($i=0; $i<7; $i++)
		{
			$dates[$i] = date('Y-m-d',$monday+($seconds_in_a_day*$i));
		}
	
		return $dates;
	}
	public static function secsToHM($secs)
	{
            
		return intval($secs/60/60)."h ".intval(($secs/60)%60)."m ".intval(($secs)%3600%60)."s";
	}
	public static function secsToHMArray($secs)
	{
	
		return array(intval($secs/60/60),intval(($secs/60)%60),intval(($secs)%3600%60));
	}
	public static function getSecondsOfHMS($val){
		
		$temp = explode(" ",$val);
		
		$h = str_replace("h","",$temp[0]);
		$m = str_replace("m","",$temp[1]);
		$s =str_replace("s","",$temp[2]);
		return intval($h*60*60)+intval(($m*60))+intval($s);
	}
	public static function getHrsOfSecs($secs){
		return intval($secs/60/60);
	}
	public static function getMinsOfSecs($secs){
		return intval(($secs/60)%60);
	}
	public static function secsToH($secs)
	{
		return intval($secs/60/60);
	}
	
	public static function secsToM($secs)
	{
		
		return intval((intval($secs)/60)%60);
	}
	public static function secsToHRounded($secs)
	{
		return intval(($secs/60)/60);
	}
	public static function secsToMRounded($secs)
	{
	
		return intval(($secs/60)%60);
	}
	public static function secsToSRounded($secs)
	{
	
		return intval($secs%3600% 60);
	}
	public static function getHoursMinutesFromSeconds($seconds){
		$mins = $seconds/60;
		$hours = 0;
		if($mins >= 60){
			$hours = round($mins/60);
			$mins = $mins % 60;
		}
		return array($hours,$mins);
	}
	
	/* this function handles the date formation 
	*/
	public static function getFormattedDatetime($date){
		if($date!=null && trim($date)!="0000-00-00 00:00:00"){    
			$datetime = new DateTime($date);
			return $datetime->format('m/d/Y h:i:s A');
		}
		else{
			return null;
		}
	}
	
	
	public static function addTime($date,$secondsAdd=null){
		//$datetime = new DateTime($date);
		$datetime = DateTime::createFromFormat('m/d/Y h:i:s A', $date);
		if($secondsAdd!=null and $secondsAdd>0){
			$dateInterval = new DateInterval('PT'.$secondsAdd.'S');
			$datetime->add($dateInterval);
		}
		//$datetime->setTimezone($tz_object);
		return $datetime->format('m/d/Y h:i:s A');
	}
	public static function subtractTime($date,$secondsAdd=null){
		//$datetime = new DateTime($date);
		$datetime = DateTime::createFromFormat('m/d/Y h:i:s A', $date);
		if($secondsAdd!=null and $secondsAdd>0){
			$dateInterval = new DateInterval('PT'.$secondsAdd.'S');
			$datetime->sub($dateInterval);
		}
		//$datetime->setTimezone($tz_object);
		return $datetime->format('m/d/Y h:i:s A');
	}
        public static function changeDateFormat($dateOnly){
            $myDateTime = DateTime::createFromFormat('m/d/Y', $dateOnly);
            $newDateString = $myDateTime->format('Y-m-d');
            return $newDateString;
        }


        /* this function handles the date formation as well 
	 */
	public static function changeToDbFormat($date){
		if($date!=null && trim($date)!="0000-00-00 00:00:00"){
			$date = DateTime::createFromFormat('m/d/Y h:i:s A', $date);		
			$formatted_date=date_format($date, 'Y-m-d H:i:s');
			return $formatted_date;
		}else{
			return null;;
		}
	}
	public static function changeToDbFormatForMSsql($date){
// 		$date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
// 		$formatted_date=date_format($date, 'Y-m-d H:i:s');
// 		return $formatted_date;
		$datetime = new DateTime($date);
		return $datetime->format('Y-m-d H:i:s');
	}
    public static function changeToDbFormat2($date){
		$date = DateTime::createFromFormat('m/d/Y', $date);		
		$formatted_date=date_format($date, 'Y-m-d');
		return $formatted_date;
	}
	public static function changeDateFromDbFormat($date){
		$date = DateTime::createFromFormat('Y-m-d', $date);
		$formatted_date=date_format($date, 'm/d/Y');
		return $formatted_date;
	}
	public static function changeWeeklyProductivityDateFromDbFormat($date){
		$date = DateTime::createFromFormat('d-m-Y', $date);
		$formatted_date=date_format($date, 'Y-m-d');
		return $formatted_date;
	}
	public static function date_diff($date1,$date2){
		$timeFirst  = strtotime($date1);
		$timeSecond = strtotime($date2);
		$differenceInSeconds = $timeSecond - $timeFirst;
		return $differenceInSeconds;
	}
	public static function getCurrentDateTime(){
		$date = date('m/d/Y h:i:s A', time());
	
		return $date;
	}
	
	public static function getCurrentDate(){
		$date = date('m/d/Y', time());
	
		return $date;
	}
        public static function findDate_Between_two_Dates($dbsDate,$dbeDate,$stDate,$endDate){
            
            $matchedDate='';

            if ($stDate >= $dbsDate && $stDate <= $dbeDate || $endDate >= $dbsDate && $endDate <= $dbeDate)
                {
                    $matchedDate=$stDate;

                    return $matchedDate;

        }
        
                }
                
                static function validateDate($date, $format = 'Y-m-d H:i:s')
                {
                	$d = DateTime::createFromFormat($format, $date);
                	return $d && $d->format($format) == $date;
                }

	
	public function getPreviousDate($date,$days){
		$date = date('Y-m-d H:i:s', strtotime('-'.$days.' day', strtotime($date)));
		return $date;
	}
 public static function date_difference_from_current($date1){
		$datetime1 = new DateTime($date1);		
		$datetime2 =  new DateTime("now");
		$interval = $datetime2->diff($datetime1);
		$hours = $interval->h;
		$hours = $hours + ($interval->days*24)+($interval->i/60);	
		
		return $hours;
	}
	public static function changeDatetimeToDate($date){
		
			$date = DateTime::createFromFormat('m/d/Y h:i:s A', $date);
			$formatted_date=date_format($date, 'm/d/Y');
			return $formatted_date;
		
	}
	public static function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}
	public static function contains($haystack,$needle) {
		if (strpos($haystack,$needle) !== false) {
			return true;
		}
		return false;
	}
	public static function endsWith($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}
	
		return (substr($haystack, -$length) === $needle);
	}
	
	public static function replaceStrings($string,$words_to_replace){
		foreach($words_to_replace as $key=>$word){
			$string = str_replace($key, $word, $string);
		}
		return $string;
	}
}