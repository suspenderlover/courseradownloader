<?php

class TimeZoneHandler{
	

	 
	/* format expected 'm-d-Y H:i:s*/
	 public static function convertDateTimeStrToDb($dateTime){
// 	 	$dateTime = new DateTime($dateTime);
// 	 	$la_time = new DateTimeZone(Yii::app()->params->timeZoneDB);
// 	 	$dateTime->setTimezone($la_time);
// 	 	return $dateTime->format('Y-m-d H:i:s');
		return $dateTime;
	 }
	 
	 
	 /* format expected 'm-d-Y H:i:s*/
	 public static function convertDateTimeToClient($dateTime){
// 	 	$dateTime = new DateTime($dateTime,new DateTimeZone(Yii::app()->params->timeZoneDB));
// 	 	$la_time = new DateTimeZone(date_default_timezone_get());
// 	 	$dateTime->setTimezone($la_time);
// 	 	return $dateTime->format('Y-m-d H:i:s');
		return $dateTime;
	 	
	 }
	 /*This function sets mysql timestamp to timestamp set in config*/
	 public static function setMysqlTimeZoneToClient(){
	 	$timezone = date_default_timezone_get();
	 	if($timezone==""){
	 		$timezone = TKSConstants::DEFAULT_TIMEZONE;
	 	}
	 	Yii::app()->db->createCommand("SET time_zone ='".$timezone."' ")->execute();
	 }
	 public static function setMysqlTimeZoneToGMT(){
	 	Yii::app()->db->createCommand("SET time_zone ='".Yii::app()->params->timeZoneDB."' ")->execute();
	 }
	 
	 
	 public static function windowszone2olson($winzone) {
	 	$winzone = trim($winzone);
	 	static $zi = array (
	 			'Dateline Standard Time' => 'Etc/GMT+12',
	 			'UTC-11' => 'Etc/GMT+11',
	 			'Hawaiian Standard Time' => 'Etc/GMT+10',
	 			'Alaskan Standard Time' => 'America/Anchorage',// America/Juneau America/Nome America/Sitka America/Yakutat',
	 			'Pacific Standard Time (Mexico)' => 'America/Santa_Isabel',
	 			'Pacific Standard Time' => 'PST8PDT',
	 			'US Mountain Standard Time' => 'Etc/GMT+7',
	 			'Mountain Standard Time (Mexico)' => 'America/Chihuahua',// America/Mazatlan',
	 			'Mountain Standard Time' => 'MST7MDT',
	 			'Central America Standard Time' => 'Etc/GMT+6',
	 			'Central Standard Time' => 'CST6CDT',
	 			'Central Standard Time (Mexico)' => 'America/Mexico_City',// America/Bahia_Banderas America/Cancun America/Merida America/Monterrey',
	 			'Canada Central Standard Time' => 'America/Regina',// America/Swift_Current',
	 			'SA Pacific Standard Time' => 'Etc/GMT+5',
	 			'Eastern Standard Time' => 'EST5EDT',
	 			'US Eastern Standard Time' => 'America/Indianapolis',// America/Indiana/Marengo America/Indiana/Vevay',
	 			'Venezuela Standard Time' => 'America/Caracas',
	 			'Paraguay Standard Time' => 'America/Asuncion',
	 			'Atlantic Standard Time' => 'America/Thule',
	 			'Central Brazilian Standard Time' => 'America/Cuiaba',// America/Campo_Grande',
	 			'SA Western Standard Time' => 'Etc/GMT+4',
	 			'Pacific SA Standard Time' => 'America/Santiago',
	 			'Newfoundland Standard Time' => 'America/St_Johns',
	 			'E. South America Standard Time' => 'America/Sao_Paulo',
	 			'Argentina Standard Time' => 'America/Buenos_Aires',// America/Argentina/La_Rioja America/Argentina/Rio_Gallegos America/Argentina/Salta America/Argentina/San_Juan America/Argentina/San_Luis America/Argentina/Tucuman America/Argentina/Ushuaia America/Catamarca America/Cordoba America/Jujuy America/Mendoza',
	 			'SA Eastern Standard Time' => 'Etc/GMT+3',
	 			'Greenland Standard Time' => 'America/Godthab',
	 			'Montevideo Standard Time' => 'America/Montevideo',
	 			'Bahia Standard Time' => 'America/Bahia',
	 			'UTC-02' => 'Etc/GMT+2',
	 			'Azores Standard Time' => 'Atlantic/Azores',
	 			'Cape Verde Standard Time' => 'Etc/GMT+1',
	 			'Morocco Standard Time' => 'Africa/Casablanca',
	 			'UTC' => 'Etc/GMT',
	 			'GMT Standard Time' => 'Europe/Lisbon',// Atlantic/Madeira',
	 			'Greenwich Standard Time' => 'Africa/Lome',
	 			'W. Europe Standard Time' => 'Europe/Vatican',
	 			'Central Europe Standard Time' => 'Europe/Bratislava',
	 			'Romance Standard Time' => 'Europe/Paris',
	 			'Central European Standard Time' => 'Europe/Warsaw',
	 			'W. Central Africa Standard Time' => 'Etc/GMT-1',
	 			'Namibia Standard Time' => 'Africa/Windhoek',
	 			'GTB Standard Time' => 'Europe/Bucharest',
	 			'Middle East Standard Time' => 'Asia/Beirut',
	 			'Egypt Standard Time' => 'Africa/Cairo',
	 			'Syria Standard Time' => 'Asia/Damascus',
	 			'South Africa Standard Time' => 'Etc/GMT-2',
	 			'FLE Standard Time' => 'Europe/Kiev',// Europe/Simferopol Europe/Uzhgorod Europe/Zaporozhye',
	 			'Turkey Standard Time' => 'Europe/Istanbul',
	 			'Israel Standard Time' => 'Asia/Jerusalem',
	 			'Libya Standard Time' => 'Africa/Tripoli',
	 			'Jordan Standard Time' => 'Asia/Amman',
	 			'Arabic Standard Time' => 'Asia/Baghdad',
	 			'Kaliningrad Standard Time' => 'Europe/Kaliningrad',
	 			'Arab Standard Time' => 'Asia/Aden',
	 			'E. Africa Standard Time' => 'Etc/GMT-3',
	 			'Iran Standard Time' => 'Asia/Tehran',
	 			'Arabian Standard Time' => 'Etc/GMT-4',
	 			'Azerbaijan Standard Time' => 'Asia/Baku',
	 			'Russian Standard Time' => 'Europe/Moscow',// Europe/Samara Europe/Volgograd',
	 			'Mauritius Standard Time' => 'Indian/Mahe',
	 			'Georgian Standard Time' => 'Asia/Tbilisi',
	 			'Caucasus Standard Time' => 'Asia/Yerevan',
	 			'Afghanistan Standard Time' => 'Asia/Kabul',
	 			'West Asia Standard Time' => 'Etc/GMT-5',
	 			'Pakistan Standard Time' => 'Asia/Karachi',
	 			'India Standard Time' => 'Asia/Calcutta',
	 			'Sri Lanka Standard Time' => 'Asia/Colombo',
	 			'Nepal Standard Time' => 'Asia/Katmandu',
	 			'Central Asia Standard Time' => 'Etc/GMT-6',
	 			'Bangladesh Standard Time' => 'Asia/Thimphu',
	 			'Ekaterinburg Standard Time' => 'Asia/Yekaterinburg',
	 			'Myanmar Standard Time' => 'Asia/Rangoon',
	 			'SE Asia Standard Time' => 'Etc/GMT-7',
	 			'N. Central Asia Standard Time' => 'Asia/Novosibirsk',// Asia/Novokuznetsk Asia/Omsk',
	 			'China Standard Time' => 'Asia/Macau',
	 			'North Asia Standard Time' => 'Asia/Krasnoyarsk',
	 			'Singapore Standard Time' => 'Etc/GMT-8',
	 			'W. Australia Standard Time' => 'Australia/Perth',
	 			'Taipei Standard Time' => 'Asia/Taipei',
	 			'Ulaanbaatar Standard Time' => 'Asia/Ulaanbaatar',// Asia/Choibalsan',
	 			'North Asia East Standard Time' => 'Asia/Irkutsk',
	 			'Tokyo Standard Time' => 'Etc/GMT-9',
	 			'Korea Standard Time' => 'Asia/Seoul',
	 			'Cen. Australia Standard Time' => 'Australia/Adelaide',// Australia/Broken_Hill',
	 			'AUS Central Standard Time' => 'Australia/Darwin',
	 			'E. Australia Standard Time' => 'Australia/Brisbane',// Australia/Lindeman',
	 			'AUS Eastern Standard Time' => 'Australia/Sydney',// Australia/Melbourne',
	 			'West Pacific Standard Time' => 'Etc/GMT-10',
	 			'Tasmania Standard Time' => 'Australia/Hobart',// Australia/Currie',
	 			'Yakutsk Standard Time' => 'Asia/Yakutsk',// Asia/Khandyga',
	 			'Central Pacific Standard Time' => 'Etc/GMT-11',
	 			'Vladivostok Standard Time' => 'Asia/Vladivostok',// Asia/Sakhalin Asia/Ust-Nera',
	 			'New Zealand Standard Time' => 'Pacific/Auckland',// Antarctica/South_Pole',
	 			'UTC+12' => 'Etc/GMT-12',
	 			'Fiji Standard Time' => 'Pacific/Fiji',
	 			'Magadan Standard Time' => 'Asia/Magadan',// Asia/Anadyr Asia/Kamchatka',
	 			'Tonga Standard Time' => 'Etc/GMT-13',
	 			'Samoa Standard Time' => 'Pacific/Apia',
	 	);
	 	$zi_lcase = array_change_key_case($zi);
	 	$zi_ucase = array_change_key_case($zi,CASE_UPPER);
	 	if(isset($zi[$winzone])){
	 		return $zi[$winzone];
	 	}elseif(isset($zi_lcase[$winzone]))
	 	{
	 		return $zi_lcase[$winzone];
	 	}elseif(isset($zi_ucase["$winzone"])){
	 		return $zi_ucase[$winzone];
	 	}
	 	return false;
	 	
	 	
	 }
	 public static function olson2windows($olson) {
	 	$olson = trim($olson);
	 	static $zi = array (
	 			'Dateline Standard Time' => 'Etc/GMT+12',
	 			'UTC-11' => 'Etc/GMT+11',
	 			'Hawaiian Standard Time' => 'Etc/GMT+10',
	 			'Alaskan Standard Time' => 'America/Anchorage',// America/Juneau America/Nome America/Sitka America/Yakutat',
	 			'Pacific Standard Time (Mexico)' => 'America/Santa_Isabel',
	 			'Pacific Standard Time' => 'PST8PDT',
	 			'US Mountain Standard Time' => 'Etc/GMT+7',
	 			'Mountain Standard Time (Mexico)' => 'America/Chihuahua',// America/Mazatlan',
	 			'Mountain Standard Time' => 'MST7MDT',
	 			'Central America Standard Time' => 'Etc/GMT+6',
	 			'Central Standard Time' => 'CST6CDT',
	 			'Central Standard Time (Mexico)' => 'America/Mexico_City',// America/Bahia_Banderas America/Cancun America/Merida America/Monterrey',
	 			'Canada Central Standard Time' => 'America/Regina',// America/Swift_Current',
	 			'SA Pacific Standard Time' => 'Etc/GMT+5',
	 			'Eastern Standard Time' => 'EST5EDT',
	 			'US Eastern Standard Time' => 'America/Indianapolis',// America/Indiana/Marengo America/Indiana/Vevay',
	 			'Venezuela Standard Time' => 'America/Caracas',
	 			'Paraguay Standard Time' => 'America/Asuncion',
	 			'Atlantic Standard Time' => 'America/Thule',
	 			'Central Brazilian Standard Time' => 'America/Cuiaba',// America/Campo_Grande',
	 			'SA Western Standard Time' => 'Etc/GMT+4',
	 			'Pacific SA Standard Time' => 'America/Santiago',
	 			'Newfoundland Standard Time' => 'America/St_Johns',
	 			'E. South America Standard Time' => 'America/Sao_Paulo',
	 			'Argentina Standard Time' => 'America/Buenos_Aires',// America/Argentina/La_Rioja America/Argentina/Rio_Gallegos America/Argentina/Salta America/Argentina/San_Juan America/Argentina/San_Luis America/Argentina/Tucuman America/Argentina/Ushuaia America/Catamarca America/Cordoba America/Jujuy America/Mendoza',
	 			'SA Eastern Standard Time' => 'Etc/GMT+3',
	 			'Greenland Standard Time' => 'America/Godthab',
	 			'Montevideo Standard Time' => 'America/Montevideo',
	 			'Bahia Standard Time' => 'America/Bahia',
	 			'UTC-02' => 'Etc/GMT+2',
	 			'Azores Standard Time' => 'Atlantic/Azores',
	 			'Cape Verde Standard Time' => 'Etc/GMT+1',
	 			'Morocco Standard Time' => 'Africa/Casablanca',
	 			'UTC' => 'Etc/GMT',
	 			'GMT Standard Time' => 'Europe/Lisbon',// Atlantic/Madeira',
	 			'Greenwich Standard Time' => 'Africa/Lome',
	 			'W. Europe Standard Time' => 'Europe/Vatican',
	 			'Central Europe Standard Time' => 'Europe/Bratislava',
	 			'Romance Standard Time' => 'Europe/Paris',
	 			'Central European Standard Time' => 'Europe/Warsaw',
	 			'W. Central Africa Standard Time' => 'Etc/GMT-1',
	 			'Namibia Standard Time' => 'Africa/Windhoek',
	 			'GTB Standard Time' => 'Europe/Bucharest',
	 			'Middle East Standard Time' => 'Asia/Beirut',
	 			'Egypt Standard Time' => 'Africa/Cairo',
	 			'Syria Standard Time' => 'Asia/Damascus',
	 			'South Africa Standard Time' => 'Etc/GMT-2',
	 			'FLE Standard Time' => 'Europe/Kiev',// Europe/Simferopol Europe/Uzhgorod Europe/Zaporozhye',
	 			'Turkey Standard Time' => 'Europe/Istanbul',
	 			'Israel Standard Time' => 'Asia/Jerusalem',
	 			'Libya Standard Time' => 'Africa/Tripoli',
	 			'Jordan Standard Time' => 'Asia/Amman',
	 			'Arabic Standard Time' => 'Asia/Baghdad',
	 			'Kaliningrad Standard Time' => 'Europe/Kaliningrad',
	 			'Arab Standard Time' => 'Asia/Aden',
	 			'E. Africa Standard Time' => 'Etc/GMT-3',
	 			'Iran Standard Time' => 'Asia/Tehran',
	 			'Arabian Standard Time' => 'Etc/GMT-4',
	 			'Azerbaijan Standard Time' => 'Asia/Baku',
	 			'Russian Standard Time' => 'Europe/Moscow',// Europe/Samara Europe/Volgograd',
	 			'Mauritius Standard Time' => 'Indian/Mahe',
	 			'Georgian Standard Time' => 'Asia/Tbilisi',
	 			'Caucasus Standard Time' => 'Asia/Yerevan',
	 			'Afghanistan Standard Time' => 'Asia/Kabul',
	 			'West Asia Standard Time' => 'Etc/GMT-5',
	 			'Pakistan Standard Time' => 'Asia/Karachi',
	 			'India Standard Time' => 'Asia/Calcutta',
	 			'Sri Lanka Standard Time' => 'Asia/Colombo',
	 			'Nepal Standard Time' => 'Asia/Katmandu',
	 			'Central Asia Standard Time' => 'Etc/GMT-6',
	 			'Bangladesh Standard Time' => 'Asia/Thimphu',
	 			'Ekaterinburg Standard Time' => 'Asia/Yekaterinburg',
	 			'Myanmar Standard Time' => 'Asia/Rangoon',
	 			'SE Asia Standard Time' => 'Etc/GMT-7',
	 			'N. Central Asia Standard Time' => 'Asia/Novosibirsk',// Asia/Novokuznetsk Asia/Omsk',
	 			'China Standard Time' => 'Asia/Macau',
	 			'North Asia Standard Time' => 'Asia/Krasnoyarsk',
	 			'Singapore Standard Time' => 'Etc/GMT-8',
	 			'W. Australia Standard Time' => 'Australia/Perth',
	 			'Taipei Standard Time' => 'Asia/Taipei',
	 			'Ulaanbaatar Standard Time' => 'Asia/Ulaanbaatar',// Asia/Choibalsan',
	 			'North Asia East Standard Time' => 'Asia/Irkutsk',
	 			'Tokyo Standard Time' => 'Etc/GMT-9',
	 			'Korea Standard Time' => 'Asia/Seoul',
	 			'Cen. Australia Standard Time' => 'Australia/Adelaide',// Australia/Broken_Hill',
	 			'AUS Central Standard Time' => 'Australia/Darwin',
	 			'E. Australia Standard Time' => 'Australia/Brisbane',// Australia/Lindeman',
	 			'AUS Eastern Standard Time' => 'Australia/Sydney',// Australia/Melbourne',
	 			'West Pacific Standard Time' => 'Etc/GMT-10',
	 			'Tasmania Standard Time' => 'Australia/Hobart',// Australia/Currie',
	 			'Yakutsk Standard Time' => 'Asia/Yakutsk',// Asia/Khandyga',
	 			'Central Pacific Standard Time' => 'Etc/GMT-11',
	 			'Vladivostok Standard Time' => 'Asia/Vladivostok',// Asia/Sakhalin Asia/Ust-Nera',
	 			'New Zealand Standard Time' => 'Pacific/Auckland',// Antarctica/South_Pole',
	 			'UTC+12' => 'Etc/GMT-12',
	 			'Fiji Standard Time' => 'Pacific/Fiji',
	 			'Magadan Standard Time' => 'Asia/Magadan',// Asia/Anadyr Asia/Kamchatka',
	 			'Tonga Standard Time' => 'Etc/GMT-13',
	 			'Samoa Standard Time' => 'Pacific/Apia',
	 	);

	 	foreach($zi as $z=>$v){
	 		if(strtolower($olson)==strtolower($v)){
	 			return $z;
	 		}
	 	}

	 	return "";
	 	 
	 	 
	 }
}
?>