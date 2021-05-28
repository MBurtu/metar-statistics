<?php
$loading = true;
//////////////
// return variable if it exists
function issetor(&$var, $default = false) {
	return isset($var) ? $var : $default;
}
function average($array) {
	return array_sum($array) / count($array);
}
function testCloudIfr($metar) {
	$cloud_ifr = false;
	for ($i=0; $i<sizeof($metar); $i++) {
		if (substr($metar[$i], 0, 3) == 'BKN' || substr($metar[$i], 0, 3) == 'OVC') {
			if (substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) == 0) {
				$cloud_ifr = true;
			}
		}
		elseif (substr($metar[$i], 0, 2) == 'VV') {
			if (substr($metar[$i], 2, 1) == 0 && substr($metar[$i], 3, 1) == 0) {
				$cloud_ifr = true;
			}
		}
	}
	return $cloud_ifr;
}
function testVisIfr($visibility) {
	$vis_ifr = false;
	if (substr($visibility, -2, 2) == 'SM') {
		$visbility = substr($visibility, 0, strlen($visibility) - 2); 
		if ($visibility < 3) {
			$vis_ifr = true;
		}
	}
	elseif ($visibility < 5000) {
		$vis_ifr = true;
	}
	return $vis_ifr;
}
function findWeather($metar, $date_time) {
	$weather_type = [];
	$fog_date = "";
	$weather_array = ['SHRA','RA','SHSN','SN','SHSNRA','SNRA','SHRASN','RASN','DZ','RADZ','DZRA','PL','SG','IC','DRSN','BLSN','FZDZ','FZRA','FZFG','FG','BCFG','MIFG','BR','GR','SHGR','GS','SHGS','SHRAGS','TS','TSRA','SQ','DU','BLDU','DRDU','SA','BLSA','DRSA','SS','DS','HZ','FU','PO','PY','FC','VA'];
	for ($i=0; $i<sizeof($metar); $i++) {
		if (substr($metar[$i], 0, 1) == '-' || substr($metar[$i], 0, 1) == '+') {
			$metar[$i] = substr($metar[$i], 1, strlen($metar[$i])-1);
		}
		if (in_array($metar[$i], $weather_array)) {
			array_push($weather_type, $metar[$i]);
		}
		if ($metar[$i] == 'FG' || $metar[$i] == 'FZFG') {
			
			if (substr($date_time,8,2) < 10) {
				if (substr($date_time,11,2) <= 4) {
					$fog_date = '2016-'.substr($date_time,5,2).'-05 02';
				}
				if (substr($date_time,11,2) <= 8 && substr($date_time,11,2) > 4) {
					$fog_date = '2016-'.substr($date_time,5,2).'-05 06';
				}
				if (substr($date_time,11,2) <= 12 && substr($date_time,11,2) > 8) {
					$fog_date = '2016-'.substr($date_time,5,2).'-05 10';
				}
				if (substr($date_time,11,2) <= 16 && substr($date_time,11,2) > 12) {
					$fog_date = '2016-'.substr($date_time,5,2).'-05 14';
				}
				if (substr($date_time,11,2) <= 20 && substr($date_time,11,2) > 16) {
					$fog_date = '2016-'.substr($date_time,5,2).'-05 18';
				}
				if (substr($date_time,11,2) <= 24 && substr($date_time,11,2) > 20) {
					$fog_date = '2016-'.substr($date_time,5,2).'-05 22';
				}
			}
			if (substr($date_time,8,2) < 20 && substr($date_time,8,2) >= 10) {
				if (substr($date_time,11,2) <= 4) {
					$fog_date = '2016-'.substr($date_time,5,2).'-15 02';
				}
				if (substr($date_time,11,2) <= 8 && substr($date_time,11,2) > 4) {
					$fog_date = '2016-'.substr($date_time,5,2).'-15 06';
				}
				if (substr($date_time,11,2) <= 12 && substr($date_time,11,2) > 8) {
					$fog_date = '2016-'.substr($date_time,5,2).'-15 10';
				}
				if (substr($date_time,11,2) <= 16 && substr($date_time,11,2) > 12) {
					$fog_date = '2016-'.substr($date_time,5,2).'-15 14';
				}
				if (substr($date_time,11,2) <= 20 && substr($date_time,11,2) > 16) {
					$fog_date = '2016-'.substr($date_time,5,2).'-15 18';
				}
				if (substr($date_time,11,2) <= 24 && substr($date_time,11,2) > 20) {
					$fog_date = '2016-'.substr($date_time,5,2).'-15 22';
				}
			}
			if (substr($date_time,8,2) >= 20) {
				if (substr($date_time,11,2) <= 4) {
					$fog_date = '2016-'.substr($date_time,5,2).'-25 02';
				}
				if (substr($date_time,11,2) <= 8 && substr($date_time,11,2) > 4) {
					$fog_date = '2016-'.substr($date_time,5,2).'-25 06';
				}
				if (substr($date_time,11,2) <= 12 && substr($date_time,11,2) > 8) {
					$fog_date = '2016-'.substr($date_time,5,2).'-25 10';
				}
				if (substr($date_time,11,2) <= 16 && substr($date_time,11,2) > 12) {
					$fog_date = '2016-'.substr($date_time,5,2).'-25 14';
				}
				if (substr($date_time,11,2) <= 20 && substr($date_time,11,2) > 16) {
					$fog_date = '2016-'.substr($date_time,5,2).'-25 18';
				}
				if (substr($date_time,11,2) <= 24 && substr($date_time,11,2) > 20) {
					$fog_date = '2016-'.substr($date_time,5,2).'-25 22';
				}
			}
		}
	}
	return array($weather_type, $fog_date);
}

function findRVR($metar, $date_time) {
	
	$rvr_value = $rvr_date = 0;
	
	for ($i=0; $i<sizeof($metar); $i++) {
		if (substr($metar[$i], 0, 1) == 'R' && in_array(substr($metar[$i], -1), ['D','U','N'], true) && strlen($metar[$i]) > 6) {
			// e.g. R19R/0900D
			$rvr_temp = explode("/", $metar[$i]);
			if (substr($rvr_temp[1], 0, 4) < 1500 && substr($rvr_temp[1], 0, 1) != 'P') { // sparar endast rvr < 1500 m
				$rvr_value = substr($rvr_temp[1], 0, 4);
				$rvr_date = $date_time;
				break; //end loop when a value <1500 is found, i.e. 1 runway width rvr<1500 is enough
			}
		}
	}
	
	return array($rvr_value, $rvr_date);
}

function windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $dir, $airport, $choise) {
	$wind05 = $wind510 = $wind1015 = $wind1520 = $wind20 = 0;
	if ($dir != "VRB" && $dir != "000") {
		if (substr($airport,0,1) == 'U' || substr($airport,0,1) == 'Z') {   //Ryssar och kineser använder m/s
			if ($wind_speed < 3) {
				$wind05 = 1;
			}
			elseif ($wind_speed < 5 && $wind_speed >= 3) {
				$wind510 = 1;
			}	
			elseif ($wind_speed < 8 && $wind_speed >= 5) {
				$wind1015 = 1;
			}
			elseif ($wind_speed < 10 && $wind_speed >= 8) {
				$wind1520 = 1;
			}
			elseif ($wind_speed >= 10) {
				$wind20 = 1;
			}
		}
		else {
			if ($wind_speed < 5) {
				$wind05 = 1;
			}
			elseif ($wind_speed < 10 && $wind_speed >= 5) {
				$wind510 = 1;
			}	
			elseif ($wind_speed < 15 && $wind_speed >= 10) {
				$wind1015 = 1;
			}
			elseif ($wind_speed < 20 && $wind_speed >= 15) {
				$wind1520 = 1;
			}
			elseif ($wind_speed >= 20) {
				$wind20 = 1;
			}
		}
	}
	
	if ($dir == 360) {
		$row = 0;
	}
	else {
		$row = $dir/10;
	}
	
	if ($choise == 'all') {
		$wind_freqDir[$row][0] += $wind05; $wind_freqDir[$row][1] += $wind510; $wind_freqDir[$row][2] += $wind1015; $wind_freqDir[$row][3] += $wind1520; $wind_freqDir[$row][4] += $wind20;
		return $wind_freqDir;
	}
	elseif ($choise == 'varWind') {
		$wind_freqDir_varWind[$row][0] += $wind05; $wind_freqDir_varWind[$row][1] += $wind510; $wind_freqDir_varWind[$row][2] += $wind1015; $wind_freqDir_varWind[$row][3] += $wind1520; $wind_freqDir_varWind[$row][4] += $wind20;
		return $wind_freqDir_varWind;
	}
	elseif ($choise == 'gust') {
		$wind_freqDir_gust[$row][0] += $wind05; $wind_freqDir_gust[$row][1] += $wind510; $wind_freqDir_gust[$row][2] += $wind1015; $wind_freqDir_gust[$row][3] += $wind1520; $wind_freqDir_gust[$row][4] += $wind20;
		return $wind_freqDir_gust;
	}
	elseif ($choise == 'cld') {
		$wind_freqDir_cld[$row][0] += $wind05; $wind_freqDir_cld[$row][1] += $wind510; $wind_freqDir_cld[$row][2] += $wind1015; $wind_freqDir_cld[$row][3] += $wind1520; $wind_freqDir_cld[$row][4] += $wind20;
		return $wind_freqDir_cld;
	}
	elseif ($choise == 'vis') {
		$wind_freqDir_vis[$row][0] += $wind05; $wind_freqDir_vis[$row][1] += $wind510; $wind_freqDir_vis[$row][2] += $wind1015; $wind_freqDir_vis[$row][3] += $wind1520; $wind_freqDir_vis[$row][4] += $wind20;
		return $wind_freqDir_vis;
	}
}
function cldFreq($metar, $cld_freq) {
	$cld05 = $cld510 = $cld1015 = $cld1520 = 0;
	for ($i=0; $i<sizeof($metar); $i++) {
		if (substr($metar[$i], 0, 3) == 'BKN' || substr($metar[$i], 0, 3) == 'OVC') {
			if (substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) == 0 && substr($metar[$i], 5, 1) < 5) {
				$cld05 = 1; break;
			}
			elseif (substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) == 0 && substr($metar[$i], 5, 1) >= 5) {
				$cld510 = 1; break;
			}
			elseif (substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) == 1 && substr($metar[$i], 5, 1) < 5) {
				$cld1015 = 1; break;
			}
			elseif (substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) == 1 && substr($metar[$i], 5, 1) >= 5) {
				$cld1520 = 1; break;
			}
		}
		elseif (substr($metar[$i], 0, 2) == 'VV') {
			if (substr($metar[$i], 2, 1) == 0 && substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) < 5) {
				$cld05 = 1; break;
			}
			elseif (substr($metar[$i], 2, 1) == 0 && substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) >= 5) {
				$cld510 = 1; break;
			}
			elseif (substr($metar[$i], 2, 1) == 0 && substr($metar[$i], 3, 1) == 1 && substr($metar[$i], 4, 1) < 5) {
				$cld1015 = 1; break;
			}
			elseif (substr($metar[$i], 2, 1) == 0 && substr($metar[$i], 3, 1) == 1 && substr($metar[$i], 4, 1) >= 5) {
				$cld1520 = 1; break;
			}
		}
	}
	$cld_freq[0] += $cld05; $cld_freq[1] += $cld510; $cld_freq[2] += $cld1015; $cld_freq[3] += $cld1520;
	
	return $cld_freq;
}
function visFreq($visibility, $vis_freq) {
	$vis10 = $vis1030 = $vis3050 = $vis5080 = 0;
	if ($visibility != "CAVOK") {
		if (substr($visibility, -2, 2) == 'SM') {
			$visbility = substr($visibility, 0, strlen($visibility) - 2);
			if ($visibility < 1/2) {
				$vis10 = 1;
			}
			elseif ($visibility >= 1/2 && $visibility < 2) {
				$vis1030 = 1;
			}
			elseif ($visibility >= 2 && $visibility < 3) {
				$vis3050 = 1;
			}
			elseif ($visibility >= 3 && $visibility < 6) {
				$vis5080 = 1;
			}
		}
		else { //meters
			if ($visibility < 1000) {
				$vis10 = 1;
			}
			elseif ($visibility >= 1000 && $visibility < 3000) {
				$vis1030 = 1;
			}
			elseif ($visibility >= 3000 && $visibility < 5000) {
				$vis3050 = 1;
			}
			elseif ($visibility >= 5000 && $visibility < 9999) {
				$vis5080 = 1;
			}
		}
	}
	$vis_freq[0] += $vis10; $vis_freq[1] += $vis1030; $vis_freq[2] += $vis3050; $vis_freq[3] += $vis5080;
	
	return $vis_freq;
}
function cavok($visibility, $metar) {
	$weather_array = ['SHRA','RA','SHSN','SN','SHSNRA','SNRA','SHRASN','RASN','DZ','RADZ','DZRA','PL','SG','IC','DRSN','BLSN','FZDZ','FZRA','FZFG','FG','BCFG','MIFG','BR','GR','SHGR','GS','SHGS','SHRAGS','TS','TSRA','SQ','DU','BLDU','DRDU','SA','BLSA','DRSA','SS','DS','HZ','FU','PO','PY','FC','VA'];
	if ($visibility == 'CAVOK') {
		return true;
	}
	elseif ($visibility != '9999' && $visibility != '9999NDV') {
		return false;
	}
	elseif ($visibility == '9999' || $visibility == '9999NDV') {
		for ($i=0; $i<sizeof($metar); $i++) {
			if (substr($metar[$i], 0, 1) == '-' || substr($metar[$i], 0, 1) == '+') {
				$metar[$i] = substr($metar[$i], 1, strlen($metar[$i])-1);
			}
			if (in_array($metar[$i], $weather_array)) {
				return false;
			}
			elseif (substr($metar[$i], 0, 3) == 'FEW' || substr($metar[$i], 0, 3) == 'SCT' || substr($metar[$i], 0, 3) == 'BKN' || substr($metar[$i], 0, 3) == 'OVC') {
				if (substr($metar[$i], 3, 1) == 0 && substr($metar[$i], 4, 1) < 5) {
					return false;
				}
			}
			elseif (substr($metar[$i], 0, 2) == 'VV') {
				if (substr($metar[$i], 2, 1) == 0 && substr($metar[$i], 3, 1) < 5) {
					return false;
				}
			}
		} 
	}
	return true;
}
function curl_file_get_contents($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//if(!curl_exec($ch)){
	   //die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
	//}
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

///////////////
if(isset($_POST["airport"]) && isset($_POST["year1"]) && isset($_POST["month1"]) && isset($_POST["year2"]) && isset($_POST["month2"]) && isset($_POST["metar_type"])){
	$airport = strtoupper($_POST["airport"]);
	$year1 = $_POST["year1"];
	$month1 = $_POST["month1"];
	$day1 = $_POST["day1"];
	$year2 = $_POST["year2"];
	$month2 = $_POST["month2"];
	$day2 = $_POST["day2"];
	//Seasons
	$year3 = $_POST["year3"];
	$year4 = $_POST["year4"];
	$season = $_POST["season"];
	$metar_type = $_POST["metar_type"];
	
	$option = $_POST["option"];
	if ($option == "seasons") {
		$year1 = $year3;
		$year2 = $year4;
	}
	
	// Check airport and dates
	$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	$days_in_month1 = cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
	$days_in_month2 = cal_days_in_month(CAL_GREGORIAN, $month2, $year2);
	$today = getdate();
	if (empty($airport) || strlen($airport) != 4) {
		$warning = 'Please enter a <u>4-letter</u> ICAO station identifier in the box above';
	}
	elseif ($year2 == $today['year'] && $month2 > $today['mon']) {
		$warning = 'The statistics of the future has not yet been written...';
	}
	elseif ($year2 == $today['year'] && $month2 == $today['mon'] && $day2 > $today['mday']) {
		$warning = 'The statistics of the future has not yet been written...';
	}
	elseif ($year1 > $year2) {
		$warning = $year2.' does not come after '.$year1;;
	}
	elseif ($year1 == $year2 && $month1 > $month2) {
		$warning = $months[$month2-1].' '.$year2.' does not come after '.$months[$month1-1].' '.$year1;
	}
	elseif ($year1 == $year2 && $month1 == $month2 && $day1 > $day2) {
		$warning = $months[$month2-1].' '.$day2.' does not come after '.$months[$month1-1].' '.$day1;
	}
	elseif ($day1 > $days_in_month1) {
		$warning = 'There are '.$days_in_month1.' days in '.$months[$month1-1].', not '.$day1;
	}
	elseif ($day2 > $days_in_month2) {
		$warning = 'There are '.$days_in_month2.' days in '.$months[$month2-1].', not '.$day2;
	}
	else {
		$result = statistics($airport, $year1, $month1, $day1, $year2, $month2, $day2, $year3, $year4, $season, $option, $metar_type);
		$loading = false;
		
		if (sizeof($result) != 1) {
			$nr_of_metar = $result[0];
			$auto = $result[1];
			$manual = $result[2];
			$date_time = $result[3];
			$wind_dir_count = $result[4];
			$temperature_all = $result[5];
			$ifr_all = $result[6];
			$cavok = $result[7];
			$dir_count_cloud_imc = $result[8];
			$dir_count_vis_imc = $result[9];
			$qnh_all = $result[10];
			$weather_count = $result[11];
			$wind_gust_dir_count = $result[12];
			$gust_all = $result[13];
			$wind_freqDir = $result[14];
			$cld_freq = $result[15];
			$vis_freq = $result[16];
			$dir_count_var_wind = $result[17];
			$var_wind = $result[18];
			$mean_wind = $result[19];
			$wind_freqDir_varWind = $result[20];
			$wind_freqDir_gust = $result[21];
			$wind_freqDir_cld = $result[22];
			$wind_freqDir_vis = $result[23];
			$rvr_all = $result[24];
			$fog_dates_freq = $result[25];
			$lon = $result[26];
			$lat = $result[27];
			$elevation = $result[28];
		}
		else {
			$warning = $result;
		}
	}
}
elseif (isset($_GET["airport"])) {
	$airport = strtoupper($_GET["airport"]);
	$year1 = $_GET["year1"];
	$month1 = $_GET["month1"];
	$day1 = $_GET["day1"];
	$year2 = $_GET["year2"];
	$month2 = $_GET["month2"];
	$day2 = $_GET["day2"];
	$metar_type = $_GET["metar_type"];
	$option = $_GET["option"];
	$year3 = $_GET["year3"];
	$year4 = $_GET["year4"];
	$season = $_GET["season"];
	
	$result = statistics($airport, $year1, $month1, $day1, $year2, $month2, $day2, $year3, $year4, $season, $option, $metar_type);
	$loading = false;
	
	if (sizeof($result) != 1) {
		$nr_of_metar = $result[0];
		$auto = $result[1];
		$manual = $result[2];
		$date_time = $result[3];
		$wind_dir_count = $result[4];
		$temperature_all = $result[5];
		$ifr_all = $result[6];
		$cavok = $result[7];
		$dir_count_cloud_imc = $result[8];
		$dir_count_vis_imc = $result[9];
		$qnh_all = $result[10];
		$weather_count = $result[11];
		$wind_gust_dir_count = $result[12];
		$gust_all = $result[13];
		$wind_freqDir = $result[14];
		$cld_freq = $result[15];
		$vis_freq = $result[16];
		$dir_count_var_wind = $result[17];
		$var_wind = $result[18];
		$mean_wind = $result[19];
		$wind_freqDir_varWind = $result[20];
		$wind_freqDir_gust = $result[21];
		$wind_freqDir_cld = $result[22];
		$wind_freqDir_vis = $result[23];
		$rvr_all = $result[24];
		$fog_dates_freq = $result[25];
		$lon = $result[26];
		$lat = $result[27];
		$elevation = $result[28];
	}
}

///////////////

function statistics($airport, $year1, $month1, $day1, $year2, $month2, $day2, $year3, $year4, $season, $option, $metar_type) {
	
	echo "<script type='text/javascript'>document.getElementById('loading').style.display='block';</script>";
	
	$date_start = $year1.'-'.$month1.'-'.$day1;
	$date_end = $year2.'-'.$month2.'-'.$day2;
	
	
	if (substr($airport, 0, 1) == 'K') {
		$airport = substr($airport, 1, 3);
	}
	if ($option == "seasons") {
		$day1 = 1;
		$month1 = 1;
		if ($season == "DJF") {
			$month2 = 12;
			$day2 = 31;
			$season_months = [1, 2, 12];
		}
		elseif ($season == "MAM") {
			$month2 = 5;
			$day2 = 31;
			$season_months = [3, 4, 5];
		}
		elseif ($season == "JJA") {
			$month2 = 8;
			$day2 = 31;
			$season_months = [6, 7, 8];
		}
		elseif ($season == "SON") {
			$month2 = 11;
			$day2 = 30;
			$season_months = [9, 10, 11];
		}
	}
	
	// Get airport elevation m amsl
	$elevations = file_get_contents("data/elevation.txt");
	$expl_elevations = explode("\n", $elevations);
	$elevation = '';
	for ($i=1;$i<sizeof($expl_elevations)-1;$i++) {
		$airport_elevation = explode(",", $expl_elevations[$i]); 
		if ($airport_elevation[0] == $airport) {
			$elevation = $airport_elevation[1];
			break;
		}
	}

	// Get METAR
	if (file_exists("data/metar/".$airport.".txt")) {
		$temp = file_get_contents("data/metar/".$airport.".txt");
	}
	else {
		$warning = 'No METAR found for '.$airport;
		return $warning;
		exit;
	}
	
	$expl = explode("\n", $temp);
	
	$j = $k = $auto = $nr_of_metar = $manual = $ifr = $ifr_cloud = $ifr_vis = $cavok = $temp_sum = $qnh_sum = $gust = $var_wind = 0;
	$temp_max = -100; $temp_min = 100; $qnh_max = 0; $qnh_min = 3500; $max_gust = $max_gust_time = $max_wind = $max_wind_time = 0;
	$wind_dir = $weather = $dir_cloud_imc = $dir_vis_imc = $wind_gust_dir = $dir_var_wind = $fog_dates = $rvr_values = $rvr_dates = [];
	$vis_freq = $cld_freq = [0, 0, 0, 0]; $wind_freqDir = $wind_freqDir_varWind = $wind_freqDir_gust = $wind_freqDir_cld = $wind_freqDir_vis = array_fill(0, 36, array_fill(0, 5, 0));
	
	for ($i=1;$i<sizeof($expl)-1;$i++) {
		
		$data = explode(",", $expl[$i]);
		$metar_temp = explode(" ", $data[5]);
		
		// Klipp METAR efter QNH, i.e. ignorera gammalt väder, trend etc
		$m = 0;
		$nr = 0;
		for ($m; $m<sizeof($metar_temp); $m++) {
			//hPa
			if (substr($metar_temp[$m], 0, 1) == "Q" && strlen($metar_temp[$m]) == 5) {
				$nr = $m;
			}
			//inHg
			if (substr($airport, 0, 2) != 'RJ') {										// Japanska METAR använder hPa men ger även inHg i slutet
				if (substr($metar_temp[$m], 0, 1) == "A" && strlen($metar_temp[$m]) == 5) {
					$nr = $m;
				}
			}
		}
		$metar_temp = array_slice($metar_temp, 0, $nr+1);
		
		// Om METAR längre eller lika lång som "CAVOK-metar", d.v.s. inget saknas
		if (sizeof($metar_temp) > 5) {
			
			$year = substr($data[1], 0, 4);
			$date = substr($data[1], 0, 10); 
			$date_time[$j] = $data[1]; // Datum och tid
			$minutes = substr($data[1], 14, 2);
			
			if ($option == "seasons" && $year < $year1) {
				continue;
			}
			if ($option == "seasons" && $year > $year2) {
				break;
			}
			if ($option == "seasons" && in_array(substr($date_time[$j], 5, 2), $season_months) == false) {
				continue; // Hoppa till nästa METAR om fel årstid
			}
			if ($option == "all" && $date < $date_start ) {
				continue; // Hoppa till nästa METAR om före startdatum
			}
			
			if (substr($airport, 0, 2) == 'EH') {
				if ($minutes != '55' && $minutes != '25') {
					continue; // Hoppa till nästa METAR om den inte utfärdats xx:25 eller xx:55
				}	
			}
			else {
				if ($minutes != '50' && $minutes != '20' && $minutes != '30' && $minutes != '00') {
					continue; // Hoppa till nästa METAR om den inte utfärdats xx:20, xx:50, xx:30, xx:00
				}
			}
			
			if ($option == "all" && $date > $date_end ) {
				break; // Sluta om slutdatum har passerats
			}
			
			// Latitud och longitud
			$lon = $data[2];
			$lat = $data[3];

			// Höjd över havet
			//$elevation = (int) $data[4];

			//Plocka ut parametrar
			if ($metar_type == 'auto' || $metar_type == 'all') {
				if ($metar_temp[2] == "AUTO") {
					$wind_dir[$j] = (int) substr($metar_temp[3], 0, 3);
					$wind_speed = (int) substr($metar_temp[3], 3, 2);	
					$wind_freqDir = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'all');
					if ($wind_speed > $max_wind && $wind_speed < 80) {
						$max_wind = $wind_speed;
						$max_wind_time = $date_time[$j];
					}
					
					if (substr($metar_temp[3], 5, 1) == 'G') {
						$wind_gust = (int) substr($metar_temp[3], 6, 2);
						array_push($wind_gust_dir, $wind_dir[$j]);
						$wind_freqDir_gust = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'gust');
						if ($wind_gust > $max_gust && $wind_gust < 90) {
							$max_gust = $wind_gust;
							$max_gust_time = $date_time[$j];
						}
						$gust += 1;
					}
					
					//Om variabel vindriktning
					if (substr($metar_temp[4], 3, 1) == "V") {
						$visibility = $metar_temp[5];
						array_push($dir_var_wind, $wind_dir[$j]);
						$wind_freqDir_varWind = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'varWind');
						$var_wind += 1;
						if (cavok($visibility, $metar_temp)) {
							$cavok += 1;
						}
						elseif (testCloudIfr($metar_temp) || testVisIfr($visibility)) {
							$ifr += 1;
							if (testCloudIfr($metar_temp)) {
								array_push($dir_cloud_imc, $wind_dir[$j]);
								$wind_freqDir_cld = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'cld');
								$ifr_cloud += 1;
							}
							if (testVisIfr($visibility)) {
								array_push($dir_vis_imc, $wind_dir[$j]);
								$wind_freqDir_vis = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'vis');
								$ifr_vis += 1;
							}
						}
					}
					else {
						$visibility = $metar_temp[4];
						if (cavok($visibility, $metar_temp)) {
							$cavok += 1;
						}
						elseif (testCloudIfr($metar_temp) || testVisIfr($visibility)) {
							$ifr += 1;
							if (testCloudIfr($metar_temp)) {
								array_push($dir_cloud_imc, $wind_dir[$j]);
								$wind_freqDir_cld = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'cld');
								$ifr_cloud += 1;
							}
							if (testVisIfr($visibility)) {
								array_push($dir_vis_imc, $wind_dir[$j]);
								$wind_freqDir_vis = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'vis');
								$ifr_vis += 1;
							}
						}
					}
					
					$vis_freq = visFreq($visibility, $vis_freq);
					$cld_freq = cldFreq($metar_temp, $cld_freq);
					
					// RVR
					$rvr = findRVR($metar_temp, $date_time[$j]);
					if ($rvr[0] != 0) {
						array_push($rvr_values, $rvr[0]);
						array_push($rvr_dates, $rvr[1]);
					}
					
					// Weather
					$find_weather = findWeather($metar_temp, $date_time[$j]);
					$weather_type = $find_weather[0];
					for ($n=0;$n<sizeof($weather_type);$n++) {
						array_push($weather, $weather_type[$n]);
					}
					// Fog frequency over the year
					$fog_date = $find_weather[1];
					if ($fog_date != "") {
						array_push($fog_dates, $fog_date);
					}
					
					// Temperatur
					$t_temp = substr($metar_temp[sizeof($metar_temp)-2], 0, 3);
					
					if (substr($t_temp, 0, 1) == "M") {
						if (substr($t_temp, 1, 1) == 0) {
							$temperature = (int) substr($t_temp, 2, 1)*(-1);
							$temp_sum += $temperature;
						}
						else {
							$temperature = (int) substr($t_temp, 1, 2)*(-1);
							$temp_sum += $temperature;
						}
					}
					else {
						if (substr($t_temp, 0, 1) == 0) {
							$temperature = (int) substr($t_temp, 1, 1);
							$temp_sum += $temperature;
						}
						else {
							$temperature = (int) substr($t_temp, 0, 2);
							$temp_sum += $temperature;
						}
					}
					
					if ($temperature > $temp_max && $temperature < 50) {
						$temp_max = $temperature;
						$temp_max_time = $date_time[$j];
					}
					if ($temperature < $temp_min && $temperature > -70) {
						$temp_min = $temperature;
						$temp_min_time = $date_time[$j];
					}
					
					// QNH
					$qnh = (int) substr($metar_temp[sizeof($metar_temp)-1], 1, 4);
					if ($qnh > 900 && $qnh < 1100) {
						$qnh_sum += $qnh;
						
						if ($qnh > $qnh_max) {
							$qnh_max = $qnh;
							$qnh_max_time = $date_time[$j];
						}
						if ($qnh < $qnh_min) {
							$qnh_min = $qnh;
							$qnh_min_time = $date_time[$j];
						}
					}
					
					$auto += 1;
					$nr_of_metar += 1;
				}
			}
			if ($metar_type == 'manual' || $metar_type == 'all') {
				if ($metar_temp[2] != "AUTO" && $metar_temp[0] != 'COR') {
					$wind_dir[$j] = (int) substr($metar_temp[2], 0, 3);
					$wind_speed = (int) substr($metar_temp[2], 3, 2);
					$wind_freqDir = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'all');
					if ($wind_speed > $max_wind && $wind_speed < 80) {
						$max_wind = $wind_speed;
						$max_wind_time = $date_time[$j];
					}
					
					if (substr($metar_temp[2], 5, 1) == 'G') {
						$wind_gust = (int) substr($metar_temp[2], 6, 2);
						array_push($wind_gust_dir, $wind_dir[$j]);
						$wind_freqDir_gust = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'gust');
						if ($wind_gust > $max_gust && $wind_gust < 90) {
							$max_gust = $wind_gust;
							$max_gust_time = $date_time[$j];
						}
						$gust += 1;
					}
					
					//Om variabel vindriktning
					if (substr($metar_temp[3], 3, 1) == "V") {
						$visibility = $metar_temp[4];
						array_push($dir_var_wind, $wind_dir[$j]);
						$wind_freqDir_varWind = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'varWind');
						$var_wind += 1;
						if ($visibility == 'CAVOK') {
							$cavok += 1;
						}
						elseif (testCloudIfr($metar_temp) || testVisIfr($visibility)) {
							$ifr += 1;
							if (testCloudIfr($metar_temp)) {
								array_push($dir_cloud_imc, $wind_dir[$j]);
								$wind_freqDir_cld = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'cld');
								$ifr_cloud += 1;
							}
							if (testVisIfr($visibility)) {
								array_push($dir_vis_imc, $wind_dir[$j]);
								$wind_freqDir_vis = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'vis');
								$ifr_vis += 1;
							}
						}
					}
					else {
						$visibility = $metar_temp[3];
						if ($visibility == 'CAVOK') {
							$cavok += 1;
						}
						elseif (testCloudIfr($metar_temp) || testVisIfr($visibility)) {
							$ifr += 1;
							if (testCloudIfr($metar_temp)) {
								array_push($dir_cloud_imc, $wind_dir[$j]);
								$wind_freqDir_cld = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'cld');
								$ifr_cloud += 1;
							}
							if (testVisIfr($visibility)) {
								array_push($dir_vis_imc, $wind_dir[$j]);
								$wind_freqDir_vis = windFreq($wind_speed, $wind_freqDir, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $wind_dir[$j], $airport, 'vis');
								$ifr_vis += 1;
							}
						}
					}
					
					$vis_freq = visFreq($visibility, $vis_freq);
					$cld_freq = cldFreq($metar_temp, $cld_freq);
					
					// RVR
					$rvr = findRVR($metar_temp, $date_time[$j]);
					if ($rvr[0] != 0) {
						array_push($rvr_values, $rvr[0]);
						array_push($rvr_dates, $rvr[1]);
					}
					
					// Weather
					$find_weather = findWeather($metar_temp, $date_time[$j]);
					$weather_type = $find_weather[0];
					for ($n=0;$n<sizeof($weather_type);$n++) {
						array_push($weather, $weather_type[$n]);
					}
					// Fog frequency over the year
					$fog_date = $find_weather[1];
					if ($fog_date != "") {
						array_push($fog_dates, $fog_date);
					}
					
					// Temperatur
					$t_temp = substr($metar_temp[sizeof($metar_temp)-2], 0, 3);
					
					if (substr($t_temp, 0, 1) == "M") {
						if (substr($t_temp, 1, 1) == 0) {
							$temperature = (int) substr($t_temp, 2, 1)*(-1);
							$temp_sum += $temperature;
						}
						else {
							$temperature = (int) substr($t_temp, 1, 2)*(-1);
							$temp_sum += $temperature;
						}
					}
					else {
						if (substr($t_temp, 0, 1) == 0) {
							$temperature = (int) substr($t_temp, 1, 1);
							$temp_sum += $temperature;
						}
						else {
							$temperature = (int) substr($t_temp, 0, 2);
							$temp_sum += $temperature;
						}
					}
					
					if ($temperature > $temp_max && $temperature < 50) {
						$temp_max = $temperature;
						$temp_max_time = $date_time[$j];
					}
					if ($temperature < $temp_min && $temperature > -70) {
						$temp_min = $temperature;
						$temp_min_time = $date_time[$j];
					}
					
					// QNH
					$qnh = (int) substr($metar_temp[sizeof($metar_temp)-1], 1, 4);
					if ($qnh > 900 && $qnh < 1100) {
						$qnh_sum += $qnh;
						
						if ($qnh > $qnh_max) {
							$qnh_max = $qnh;
							$qnh_max_time = $date_time[$j];
						}
						if ($qnh < $qnh_min) {
							$qnh_min = $qnh;
							$qnh_min_time = $date_time[$j];
						}
					}
						
					$manual += 1;
					$nr_of_metar += 1;
				}
			}
			$j += 1;
		}
	}
	
	if ($nr_of_metar != 0) {
		$temp_avg = round($temp_sum / $nr_of_metar);
		$temperature_all = [$temp_avg, $temp_max, $temp_min, $temp_max_time, $temp_min_time];
		
		$qnh_avg = round($qnh_sum / $nr_of_metar);
		$qnh_all = [$qnh_avg, $qnh_max, $qnh_min, $qnh_max_time, $qnh_min_time];
		
		$wind_dir_count = array_count_values($wind_dir);
		$dir_count_cloud_imc = array_count_values($dir_cloud_imc);
		$dir_count_vis_imc = array_count_values($dir_vis_imc);
		$dir_count_var_wind = array_count_values($dir_var_wind);
		
		$ifr_all = [$ifr, $ifr_cloud, $ifr_vis];
		
		$weather_count = array_count_values($weather);
		arsort($weather_count); // Sort from high to low

		$wind_gust_dir_count = array_count_values($wind_gust_dir);
		$gust_all = [$gust, $max_gust, $max_gust_time];
		
		$mean_wind = [$max_wind, $max_wind_time];
		
		$fog_dates_freq = array_count_values($fog_dates);
		
		$rvr_all = [$rvr_values, $rvr_dates];
		
		echo "<script type='text/javascript'>document.getElementById('loading').style.display = 'none';</script>";
		
		echo "<script type='text/javascript'>	
			$(document).ready(function(){
				$('html, body').animate({
					scrollTop: $('#statistics').offset().top
				}, 1000);
			});
			</script>";
		
		return array($nr_of_metar, $auto, $manual, $date_time, $wind_dir_count, $temperature_all, $ifr_all, $cavok, $dir_count_cloud_imc, $dir_count_vis_imc, $qnh_all, $weather_count, $wind_gust_dir_count, $gust_all, $wind_freqDir, $cld_freq, $vis_freq, $dir_count_var_wind, $var_wind, $mean_wind, $wind_freqDir_varWind, $wind_freqDir_gust, $wind_freqDir_cld, $wind_freqDir_vis, $rvr_all, $fog_dates_freq, $lon, $lat, $elevation);
	}
	else {
		$warning = 'No '.$metar_type.' METAR found for '.$airport;
		return $warning;
	}
}
?>
