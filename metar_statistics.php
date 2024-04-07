<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>Westerlies.eu - METAR statistics</title>
<meta name="description" content="METAR statistics for airports in northern Europe, 2011-2023">

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

<!--<meta http-equiv="refresh" content="0; URL='http://www.westerlies.eu/statistics/maintenance.php'" />-->

<link rel="stylesheet" href="css/style_metarStatistics.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>

</head>

<body>
<?php include 'phpincludes/get_metarStatistics.php'; ?>

	<header>		
		<div id="summary"><a href="summary.html" target="blank" style="text-decoration:none;"><i class="fas fa-database"></i> summary</a></div>
		<div id="request">
			<div id="name">METAR statistics</div>
			<div id="input">
				<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
					<div class="w100">
						<div class="w25">
							<input type="text" name="airport" maxlength="4" class="airport_input">
						</div>
						<div class="w75 rabbit">
							<div class="box">
								<div class="w10">
									<span class="info">i</span>
								</div>
								<div class="w90">
									Enter 4-letter <a href="http://en.wikipedia.org/wiki/International_Civil_Aviation_Organization_airport_code" target="blank"><u>ICAO</u></a> station identifier in the box to the left and choose start, end and METAR type below.
								</div>
							</div>
						</div>
					</div>
					<div class="w100" style="margin-top:20px;">
						<div class="w20">
							<input type="radio" name="option" value="all" checked="checked">All year
						</div>
						<div class="w35">
							<select name="year1">
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
							</select>
							<select name="month1">
								<option value="01">Jan</option>
								<option value="02">Feb</option>
								<option value="03">Mar</option>
								<option value="04">Apr</option>
								<option value="05">May</option>
								<option value="06">Jun</option>
								<option value="07">Jul</option>
								<option value="08">Aug</option>
								<option value="09">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
							<select name="day1">
								<option value="01">1</option>
								<option value="02">2</option>
								<option value="03">3</option>
								<option value="04">4</option>
								<option value="05">5</option>
								<option value="06">6</option>
								<option value="07">7</option>
								<option value="08">8</option>
								<option value="09">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						</div>
						<div class="w10">
							<h1 style="line-height:0.7;">&#10152;</h1>
						</div>
						<div class="w35">
							<select name="year2">
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024" selected="selected">2024</option>
							</select>
							<select name="month2">
								<option value="01">Jan</option>
								<option value="02">Feb</option>
								<option value="03">Mar</option>
								<option value="04">Apr</option>
								<option value="05">May</option>
								<option value="06">Jun</option>
								<option value="07">Jul</option>
								<option value="08">Aug</option>
								<option value="09">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
							<select name="day2">
								<option value="01">1</option>
								<option value="02">2</option>
								<option value="03">3</option>
								<option value="04">4</option>
								<option value="05">5</option>
								<option value="06">6</option>
								<option value="07">7</option>
								<option value="08">8</option>
								<option value="09">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						</div>
					</div>
					<div class="w100" style="margin-top:20px;">
						<div class="w20">
							<input type="radio" name="option" value="seasons">Seasons
						</div>
						<div class="w20">
							<select name="season">
								<option value="DJF">DJF</option>
								<option value="MAM">MAM</option>
								<option value="JJA">JJA</option>
								<option value="SON">SON</option>
							</select>
						</div>
						<div class="w15">
							<select name="year3">
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
							</select>
						</div>
						<div class="w10">
							<h1 style="line-height:0.7;">&#10152;</h1>
						</div>
						<div class="w15">
							<select name="year4">
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024" selected="selected">2024</option>
							</select>
						</div>
					</div>
					<div class="w100" style="margin-top:20px;">
						<select name="metar_type" style="width:90px;">
							<option value="all">All</option>
							<option value="manual">Manual</option>
							<option value="auto">Auto</option>
						</select>
					</div>
					<div class="w100" style="margin-top:20px;">
						<input type="submit" value="REQUEST" onclick="loading();">
					</div>
				</form>
				
				<div class="w100" style="margin-top:20px;">
					<?php 
						if (isset($warning)) {
							echo '						
							<div class="box" id="warning">
									<span style="font-size:120%;">!</span> '.$warning.'
							</div>
							';
						}
					?>
					<div id="loading" <?php if($loading==false) {echo 'style="display:none;"';}?>>
						Loading statistics...
					</div>
				</div>

			</div>
		</div>
		
	</header>

	<div id="statistics">
		<div class="w100" style="margin-bottom:10px">
			<div class="w100">
				<div style="position:relative; z-index:10;">
					<div class="FEW">
						<h1 class="blue" style="line-height:20%;margin-top:5px;"><?php echo issetor($airport) ?></h1>
						<h4 class="blue" style="line-height:0;"><?php echo issetor($elevation).' m amsl'?></h4>
					</div>
				</div>
				<?php
					if (isset($option) && $option == "all") {
						echo '<h2>'.issetor($date_time[0]).'Z<br class="magic"><span class="blue"> &#10152; </span><br class="magic">'.issetor($date_time[sizeof($date_time)-1]).'Z<br>';
					}
					elseif (isset($option) && $option == "seasons") {
						echo '<h2><span class="blue">'.$season.'</span> '.$year1.'<br class="magic"><span class="blue"> &#10152; </span><br class="magic">'.$year2.'<br>';
					}
				?>
				<br class="magic"><span class="blue"><?php echo issetor($nr_of_metar) ?></span> METAR<br class="magic"> (<span class="blue"><?php echo issetor($manual) ?></span> MANUAL, <span class="blue"><?php echo issetor($auto) ?></span> AUTO)</h2>
			</div>
			<div class="w50" style="padding:0px;">
				<div class="max_min">
					<table>
						<tbody>
							<tr>
								<td><span class="mean">T</span><span class="very-small">mean</span> <span class="blue"><?php echo issetor($temperature_all[0]); ?>&deg;C</span></td>
								<td>max <span class="blue"><?php echo issetor($temperature_all[1])?>&deg;C</span> <span class="small">(<?php echo issetor($temperature_all[3])?>)</span> <br> min <span class="blue"><?php echo issetor($temperature_all[2])?>&deg;C</span> <span class="small">(<?php echo issetor($temperature_all[4])?>)</span></td>
							</tr>
							<tr>
								<td><span class="mean">P</span><span class="very-small">mean</span> <span class="blue"><?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo $qnh_all[0].' hPa';}else{echo substr($qnh_all[0], 0, 2).'.'.substr($qnh_all[0], 2, 2).' inHg';}}?></span></td>
								<td>max <span class="blue"><?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo $qnh_all[1].' hPa';}else{echo substr($qnh_all[1], 0, 2).'.'.substr($qnh_all[1], 2, 2).' inHg';}}?></span> <span class="small">(<?php echo issetor($qnh_all[3])?>)</span> <br> min <span class="blue"><?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo $qnh_all[2].' hPa';}else{echo substr($qnh_all[2], 0, 2).'.'.substr($qnh_all[2], 2, 2).' inHg';}}?></span> <span class="small">(<?php echo issetor($qnh_all[4])?>)</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="wind_max_min" style="padding:0px;">
				<div class="w20 left-border" style="text-align:left; margin-top:25px;">
					<span style="font-size:120%;"><span class="very-small">mean </span><span class="mean">W</span><span class="very-small">ind</span></span><br>
					max <span class="blue">
					<?php 
						echo issetor($mean_wind[0]);
						if (isset($airport)) {
							if (substr($airport,0,1) == 'U' || substr($airport,0,1) == 'Z') {
								echo ' m/s';
							}
							else {
								echo ' kt';
							}
						}
					?></span>
					<br>
					<span class="small">(<?php echo issetor($mean_wind[1])?>)</span>
				</div>
				<div class="w20 left-border" style="text-align:left; margin-top:25px;">
					<span style="font-size:120%;"><span class="mean">G</span><span class="very-small">usts</span></span><br> 
					max <span class="blue">
					<?php 
						echo issetor($gust_all[1]);
						if (isset($airport)) {
							if (substr($airport,0,1) == 'U' || substr($airport,0,1) == 'Z') {
								echo ' m/s';
							}
							else {
								echo ' kt';
							}
						}
					?></span>
					<br>
					<span class="small">(<?php echo issetor($gust_all[2])?>)</span>
                </div>
				<div class="w100" style="text-align:left;">
					<div class="w50-stats top-border">
						<div class="w50-stats" style="margin-top:5px">
							<span class="mean">CAVOK <span class="blue"><?php if (isset($cavok)){echo round(($cavok*100/$nr_of_metar),1);}?>%</span></span> 
						</div>
						<div class="w50-stats" style="line-height:1.0;">
							<span class="very-small">incl. AUTO METAR with vis 9999,<br> no wx and cld &geq; 5000 ft</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="w100 dashed-border">
			<h1 class="blue">Wind direction</h1>
			
			<div class="w50" style="position:relative;">
				<div class="static_tab">all</div><br>
				% of <span class="blue">all METAR</span><br>
				Wind rose <span class="blue toggle" id="rose_on">ON</span> <span class="white toggle" id="rose_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map1_on">ON</span> <span class="blue toggle" id="map1_off">OFF</span>
				<div style="height:80vh">
					<div id="map1" class="map"></div>
					<div id="rose" class="rose_chart">		
						<div style="display:none">
							<table id="freq" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($wind_dir_count[$dir])) {
											$dir_freq = round(($wind_dir_count[$dir]*100)/$nr_of_metar,1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir[$row][0])*100)/$nr_of_metar,1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir[$row][1])*100)/$nr_of_metar,1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir[$row][2])*100)/$nr_of_metar,1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir[$row][3])*100)/$nr_of_metar,1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir[$row][4])*100)/$nr_of_metar,1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
				</div>
				Calm or variable wind:<span class="blue">
				<?php
				if (isset($wind_dir_count[0])) {
					echo round(($wind_dir_count[0]*100)/$nr_of_metar,1); 
				}
				else {
					echo 0;
				}
				?>%</span>
				<br>
				<span class="small">(i.e. "00000KT" or "VRBXXKT")
			</div>
			
			<div class="w50">
				<ul class="tabs">
				    <li><a href="javascript:void(0)" data-tab="1tabs1">&lt; 500 ft</a></li>
					<li><a href="javascript:void(0)" data-tab="1tabs2" class="defaulttab">&lt; 1000 ft</a></li>
					<li><a href="javascript:void(0)" data-tab="1tabs3">&lt; <?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo '3000 m';}else{echo '1 SM';}}?></a></li>
					<li><a href="javascript:void(0)" data-tab="1tabs4">&lt; <?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo '5000 m';}else{echo '3 SM';}}?></a></li>
					<li><a href="javascript:void(0)" data-tab="1tabs5">gusts</a></li>
					<li><a href="javascript:void(0)" data-tab="1tabs6">variable wind</a></li>
				</ul>
				
				<div class="tab-content" style="position:relative;" id="1tabs1">
					METAR with <span class="blue">ceiling &lt; 500 ft</span>
					<span class="small">
					<?php 
					if (isset($ifr_all[1]["ifr"])) {	
						echo "(".round($ifr_all[1]["lifr"]*100/$nr_of_metar,1)."%";
					 }
					 ?>
					 of total)</span>
					 <br>
					Wind rose <span class="blue toggle" id="rose_cloud_imc_on">ON</span> <span class="white toggle" id="rose_cloud_imc_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map2_on">ON</span> <span class="blue toggle" id="map2_off">OFF</span>
					<div style="height:80vh">
						<div id="map2" class="map"></div> 
						<div id="rose_cloud_lifr" class="rose_chart"></div>
						<div style="display:none">
							<table id="freq_cld_lifr" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($dir_count_cld_imc["lifr"][$dir])) {
											$dir_freq = round(($dir_count_cld_imc["lifr"][$dir]*100)/$wind_dir_count[$dir],1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir_cld["lifr"][$row][0])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["lifr"][$row][1])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["lifr"][$row][2])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["lifr"][$row][3])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["lifr"][$row][4])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
					Calm or variable wind:<span class="blue">
					<?php 
					if (isset($dir_count_cloud_imc["lifr"][0])) {
						echo round(($dir_count_cloud_imc["lifr"][0]*100)/$ifr_all[1]["lifr"],1);
					}
					else {
						echo 0;
					}
					?>%</span> 
					<br>
					<span class="small">(i.e. "00000KT" or "VRBXXKT")
				</div>
			
				<div class="tab-content" style="position:relative;" id="1tabs2">
					METAR with <span class="blue">ceiling &lt; 1000 ft</span>
					<span class="small">
					<?php 
					if (isset($ifr_all[1]["ifr"])) {	
						echo "(".round($ifr_all[1]["ifr"]*100/$nr_of_metar,1)."%";
					 }
					 ?>
					 of total)</span>
					 <br>
					Wind rose <span class="blue toggle" id="rose_cloud_imc_on">ON</span> <span class="white toggle" id="rose_cloud_imc_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map2_on">ON</span> <span class="blue toggle" id="map2_off">OFF</span>
					<div style="height:80vh">
						<div id="map2" class="map"></div> 
						<div id="rose_cloud_imc" class="rose_chart"></div>
						<div style="display:none">
							<table id="freq_cld" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($dir_count_cld_imc["ifr"][$dir])) {
											$dir_freq = round(($dir_count_cld_imc["ifr"][$dir]*100)/$wind_dir_count[$dir],1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir_cld["ifr"][$row][0])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["ifr"][$row][1])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["ifr"][$row][2])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["ifr"][$row][3])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_cld["ifr"][$row][4])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
					Calm or variable wind:<span class="blue">
					<?php 
					if (isset($dir_count_cloud_imc["ifr"][0])) {
						echo round(($dir_count_cloud_imc["ifr"][0]*100)/$ifr_all[1]["ifr"],1);
					}
					else {
						echo 0;
					}
					?>%</span> 
					<br>
					<span class="small">(i.e. "00000KT" or "VRBXXKT")
				</div>
				
				<div class="tab-content" style="position:relative;" id="1tabs5">
					METAR with <span class="blue">gusts</span>
					<span class="small">
					<?php 
					if (isset($gust_all[0])) {
						echo "(".round($gust_all[0]*100/$nr_of_metar,1)."%";
					 }
					 ?>
					 of total)</span>
					 <br>
					Wind rose <span class="blue toggle" id="rose_gust_on">ON</span> <span class="white toggle" id="rose_gust_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map3_on">ON</span> <span class="blue toggle" id="map3_off">OFF</span>
					<div style="height:80vh">
						<div id="map3" class="map"></div>  
						<div id="rose_gust" class="rose_chart"></div>
						<div style="display:none">
							<table id="freq_gust" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($wind_gust_dir_count[$dir])) {
											$dir_freq = round(($wind_gust_dir_count[$dir]*100)/$wind_dir_count[$dir],1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir_gust[$row][0])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_gust[$row][1])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_gust[$row][2])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_gust[$row][3])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_gust[$row][4])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
				</div>
				
				<div class="tab-content" style="position:relative;" id="1tabs4">
					METAR with <span class="blue">visibility &lt; <?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo '5000 m';}else{echo '3 SM';}}?></span>
					<span class="small">
					<?php 
					if (isset($ifr_all[1]["ifr"])) {	
						echo "(".round($ifr_all[2]["ifr"]*100/$nr_of_metar,1)."%";
					 }
					 ?>
					 of total)</span>
					 <br>
					Wind rose <span class="blue toggle" id="rose_vis_imc_on">ON</span> <span class="white toggle" id="rose_vis_imc_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map4_on">ON</span> <span class="blue toggle" id="map4_off">OFF</span>
					<div style="height:80vh">
					<div id="map4" class="map"></div> 
					<div id="rose_vis_imc" class="rose_chart"></div>
						<div style="display:none">
							<table id="freq_vis" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($dir_count_vis_imc["ifr"][$dir])) {
											$dir_freq = round(($dir_count_vis_imc["ifr"][$dir]*100)/$wind_dir_count[$dir],1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir_vis["ifr"][$row][0])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["ifr"][$row][1])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["ifr"][$row][2])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["ifr"][$row][3])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["ifr"][$row][4])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
					Calm or variable wind:<span class="blue">
					<?php 
					if (isset($dir_count_vis_imc["ifr"][0])) {
						echo round(($dir_count_vis_imc["ifr"][0]*100)/$ifr_all[2]["ifr"],1);
					}
					else {
						echo 0;
					}
					?>%</span>
					<br>
					<span class="small">(i.e. "00000KT" or "VRBXXKT")
				</div>
				
				<div class="tab-content" style="position:relative;" id="1tabs3">
					METAR with <span class="blue">visibility &lt; <?php if(isset($qnh_all[1])){if($qnh_all[0]<2500){echo '3000 m';}else{echo '1 SM';}}?></span>
					<span class="small">
					<?php 
					if (isset($ifr_all[1]["ifr"])) {	
						echo "(".round($ifr_all[2]["lifr"]*100/$nr_of_metar,1)."%";
					 }
					 ?>
					 of total)</span>
					 <br>
					Wind rose <span class="blue toggle" id="rose_vis_imc_on">ON</span> <span class="white toggle" id="rose_vis_imc_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map4_on">ON</span> <span class="blue toggle" id="map4_off">OFF</span>
					<div style="height:80vh">
					<div id="map4" class="map"></div> 
					<div id="rose_vis_lifr" class="rose_chart"></div>
						<div style="display:none">
							<table id="freq_vis_lifr" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php 
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($dir_count_vis_imc["lifr"][$dir])) {
											$dir_freq = round(($dir_count_vis_imc["lifr"][$dir]*100)/$wind_dir_count[$dir],1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir_vis["lifr"][$row][0])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["lifr"][$row][1])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["lifr"][$row][2])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["lifr"][$row][3])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_vis["lifr"][$row][4])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
					Calm or variable wind:<span class="blue">
					<?php 
					if (isset($dir_count_vis_imc["lifr"][0])) {
						echo round(($dir_count_vis_imc["lifr"][0]*100)/$ifr_all[2]["lifr"],1);
					}
					else {
						echo 0;
					}
					?>%</span>
					<br>
					<span class="small">(i.e. "00000KT" or "VRBXXKT")
				</div>
				
				<div class="tab-content" style="position:relative;" id="1tabs6">
					METAR with <span class="blue">variable wind direction</span>
					<span class="small">
					<?php 
					if (isset($ifr_all[1]["ifr"])) {	
						echo "(".round($var_wind*100/$nr_of_metar,1)."%";
					 }
					 ?>
					 of total)</span>
					 <br>
					Wind rose <span class="blue toggle" id="rose_var_wind_on">ON</span> <span class="white toggle" id="rose_var_wind_off">OFF</span> <span class="blue">&#124;</span> Map <span class="white toggle" id="map5_on">ON</span> <span class="blue toggle" id="map5_off">OFF</span>
					<div style="height:80vh">
					<div id="map5" class="map"></div> 
					<div id="rose_var_wind" class="rose_chart"></div>
						<div style="display:none">
							<table id="freq_varWind" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th colspan="9" class="hdr">Table of Frequencies (percent)</th>
								</tr>
								<tr nowrap>
									<th class="freq">Direction</th>
									<th class="freq">&lt; 5 kt</th>
									<th class="freq">5-9 kt</th>
									<th class="freq">10-14 kt</th>
									<th class="freq">15-19 kt</th>
									<th class="freq">&gt;= 20 kt</th>
									<th class="freq">Total</th>
								</tr>
								<?php
								if ($nr_of_metar != 0) {
									for ($i=0;$i<360;$i+=10) {
										echo '<tr nowrap>';
										if ($i==0) {
											$dir = 360;
										}
										else {
											$dir = $i;
										}
										echo '<td class="dir">'.$dir.'&deg;</td>';
										if (isset($dir_count_var_wind[$dir])) {
											$dir_freq = round(($dir_count_var_wind[$dir]*100)/$wind_dir_count[$dir],1);
										}
										else {
											$dir_freq = 0;
										}
										$row = $i/10;
										echo '<td class="data">'.round((($wind_freqDir_varWind[$row][0])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_varWind[$row][1])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_varWind[$row][2])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_varWind[$row][3])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.round((($wind_freqDir_varWind[$row][4])*100)/$wind_dir_count[$dir],1).'</td>';
										echo '<td class="data">'.$dir_freq.'</td>';
										echo '</tr>';
									}
								}
								?>
							</table>
						</div>
					</div>
					<span class="small">(e.g. "180V240")
				</div>
			</div>
		</div>
		
		<div class="w100 dashed-border">
			<div class="w33">
				<h1 class="blue">VMC/IMC</h1>(IMC: &lt; 1000 ft and/or &lt; <?php if(isset($qnh_all[1])){if($qnh_all[1]<2000){echo '5000 m';}else{echo '3 SM';}}?>)
				<div class="pie_chart" id="pie_ifr" style="border-right: 10px solid #33495f;">	
				</div>
			</div>
			<div class="w33">
				<h1 class="blue">Ceiling</h1>(atleast BKN)<br>
				<div class="pie_chart" id="pie_cld">	
				</div>
			</div>
			<div class="w33">
				<h1 class="blue">Visibility</h1><br>
				<div class="pie_chart" id="pie_vis">	
				</div>
			</div>
		</div>
		
		<div class="w100 dashed-border">
			<h1 class="blue">Weather</h1>
			(Precipitation includes all intensities, e.g. "RA" includes -RA, RA and +RA.)
			<div id="weather_bar"></div>
			<h2 class="blue">Frequency</h2>
			<ul class="tabs">
				<li><a href="javascript:void(0)" data-tab="2tabs1" class="defaulttab">FG/FZFG</a></li>
				<li><a href="javascript:void(0)" data-tab="2tabs2">BR</a></li>
				<li><a href="javascript:void(0)" data-tab="2tabs3">FZRA/FZDZ</a></li>
			</ul>
			<div class="tab-content" id="2tabs1">
				<div id="fg_freq"></div>
			</div>
			<div class="tab-content" id="2tabs2">
				<div id="br_freq"></div>
			</div>
			<div class="tab-content" id="2tabs3">
				<div id="fzra_freq"></div>
			</div>
		</div>
		
	</div>
	
	<footer>
		<span class="blue">charts:</span> <a href="http://www.highcharts.com/" target="blank">Highcharts.com</a> <span class="delimiter rabbit">&vert;</span> <br class="magic">
		<span class="blue">contact:</span> mattias.burtu[at]gmail.com <span class="delimiter rabbit">&vert;</span><br class="magic">
		<span class="blue">data:</span> <a href="http://mesonet.agron.iastate.edu/request/download.phtml" target="blank">IOWA Environmental Mesonet</a>
	</footer>
	
	<script>
		function loading() {
			document.getElementById("loading").style.display="block";
			document.getElementById("warning").style.display="none";
		}
	</script>
	<script>
	$(function () {
		$('#pie_ifr').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			colors: ['#33495f','white'],
			title: {
                text: null
            },
			tooltip: {
				pointFormat: '<b>{point.percentage:.1f}%</b>',
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					animation: false,
                    showInLegend: true,
                    dataLabels: {
                        enabled: false,                        
                        formatter: function() {
                            return this.percentage.toFixed(2) + '%';
                        }
					}
				}
			},
			legend: {
				enabled: true,
                layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0,
				/*useHTML: true,*/
				itemStyle: {
					fontSize: '0.8vw'
				},
				labelFormatter: function() {
                    return '<div style="margin-right:30px"><span style="color:white;">' + this.name + '</span> ' + this.percentage.toFixed(1) + '%</div>';
                }
			},
			series: [{
				colorByPoint: true,
				data: [{
					name: 'IMC',
					y: <?php echo issetor($ifr_all[0])?> //IMC
				}, {
					name: 'VMC',
					y: <?php echo issetor($nr_of_metar) - issetor($ifr_all[0])?> //VMC
			  
				}]
			}]
		});
		$('#pie_cld').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			colors: ['#33495f', '#3f5d7c', '#4a729b', '#4781bc', 'white'],
			title: {
                text: null
            },
			tooltip: {
				pointFormat: '<b>{point.percentage:.1f}%</b>',
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					animation: false,
                    showInLegend: true,
                    dataLabels: {
                        enabled: false,                        
                        formatter: function() {
                            return this.percentage.toFixed(2) + '%';
                        }
					}
				}
			},
			legend: {
				enabled: true,
                layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0,
				itemStyle: {
					fontSize: '0.8vw'
				},
				/*useHTML: true,*/
				labelFormatter: function() {
                    return '<div style="margin-right:30px"><span style="color:white;">' + this.name + '</span> ' + this.percentage.toFixed(1) + '%</div>';
                }
			},
			series: [{
				colorByPoint: true,
				data: [{
					name: '&lt; 500 ft',
					y: <?php echo issetor($cld_freq[0])?>
				}, {
					name: '500 - 900 ft',
					y: <?php echo issetor($cld_freq[1])?>
				}, {
					name: '1000 - 1400 ft',
					y: <?php echo issetor($cld_freq[2])?>
				}, {
					name: '1500 - 1900 ft',
					y: <?php echo issetor($cld_freq[3])?>
				}, {
					name: '&gt;= 2000 ft',
					y: <?php echo issetor($nr_of_metar) - issetor($cld_freq[0]) - issetor($cld_freq[1]) - issetor($cld_freq[2]) - issetor($cld_freq[3])?>
				}]
			}]
		});
		$('#pie_vis').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			colors: ['#33495f', '#3f5d7c', '#4a729b', '#4781bc', 'white'],
			title: {
                text: null
            },
			tooltip: {
				pointFormat: '<b>{point.percentage:.1f}%</b>',
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					animation: false,
                    showInLegend: true,
                    dataLabels: {
                        enabled: false,                        
                        formatter: function() {
                            return this.percentage.toFixed(2) + '%';
                        }
					}
				}
			},
			legend: {
				enabled: true,
                layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0,
				itemStyle: {
					fontSize: '0.8vw'
				},
				/*useHTML: true,*/
				labelFormatter: function() {
                    return '<div style="margin-right:30px"><span style="color:white;">' + this.name + '</span> ' + this.percentage.toFixed(1) + '%</div>';
                }
			},
			series: [{
				colorByPoint: true,
				data: [{
					name: '&lt; <?php echo '1000 m';//if($qnh_all[1]<2000){echo '1000 m';}else{echo '1/2 SM';}?>',
					y: <?php echo issetor($vis_freq[0])?>
				}, {
					name: '<?php echo '1000 - 2900 m';//if($qnh_all[1]<2000){echo '1000 - 2900 m';}else{echo '1/2 - 2 SM';}?>',
					y: <?php echo issetor($vis_freq[1])?>
				}, {
					name: '<?php echo '3000 - 4900 m';//if($qnh_all[1]<2000){echo '3000 - 4900 m';}else{echo '2 - 3 SM';}?>',
					y: <?php echo issetor($vis_freq[2])?>
				}, {
					name: '<?php echo '5000 - 9000 m';//if($qnh_all[1]<2000){echo '5000 - 9000 m';}else{echo '3 - 5 SM';}?>',
					y: <?php echo issetor($vis_freq[3])?>
				}, {
					name: '<?php echo '&gt;= 10 000 m';//if($qnh_all[1]<2000){echo '&gt;= 10 000 m';}else{echo '&gt;= 6 SM';}?>',
					y: <?php echo issetor($nr_of_metar) - issetor($vis_freq[0]) - issetor($vis_freq[1]) - issetor($vis_freq[2]) - issetor($vis_freq[3])?>
				}]
			}]
		});
		
		$('#rose').highcharts({
			data: {
				table: 'freq',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					},
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return '<span style="color:#4781bc;">'+this.point.name+'</span><br>' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span><br>Total: <span style="color:#4781bc;">' + this.total +'%</span>';
				},style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#rose_cloud_imc').highcharts({
			data: {
				table: 'freq_cld',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return 'The ceiling is <span style="color:#4781bc;">less than 1000 ft</span> in<br> <span style="color:#4781bc;">' + this.total + '%</span> of METAR with wind direction <span style="color:#4781bc;">' + this.point.name + '</span>.<br> ('+ this.point.name + '/' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span>)';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#rose_cloud_lifr').highcharts({
			data: {
				table: 'freq_cld_lifr',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return 'The ceiling is <span style="color:#4781bc;">less than 500 ft</span> in<br> <span style="color:#4781bc;">' + this.total + '%</span> of METAR with wind direction <span style="color:#4781bc;">' + this.point.name + '</span>.<br> ('+ this.point.name + '/' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span>)';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#rose_vis_imc').highcharts({
			data: {
				table: 'freq_vis',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return 'The visibility is <span style="color:#4781bc;">less than 5000 m</span> in<br> <span style="color:#4781bc;">' + this.total + '%</span> of METAR with wind direction <span style="color:#4781bc;">' + this.point.name + '</span>.<br> ('+ this.point.name + '/' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span>)';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#rose_vis_lifr').highcharts({
			data: {
				table: 'freq_vis_lifr',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return 'The visibility is <span style="color:#4781bc;">less than 3000 m</span> in<br> <span style="color:#4781bc;">' + this.total + '%</span> of METAR with wind direction <span style="color:#4781bc;">' + this.point.name + '</span>.<br> ('+ this.point.name + '/' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span>)';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#rose_gust').highcharts({
			data: {
				table: 'freq_gust',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return '<span style="color:#4781bc;">' + this.total + '%</span> of METAR with wind direction <span style="color:#4781bc;">' + this.point.name + '</span><br> are <span style="color:#4781bc;">gusty</span>.<br> ('+ this.point.name + '/' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span>)';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#rose_var_wind').highcharts({
			data: {
				table: 'freq_varWind',
				startRow: 1,
				endRow: 37,
				endColumn: 5
			},
			chart: {
				polar: true,
				type: 'column',
				marginTop: 0,
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend: {
				align: 'center',
				layout: 'horizontal',
				verticalAlign: 'bottom',
				itemStyle: {
					fontSize: '0.8vw'
				},
				x: 0,
				y: 0
			},
			colors: ['white', '#4781bc', '#4a729b', '#3f5d7c', '#33495f'],
			title: {
                text: null
            },
			pane: {
				size: '85%'
			},
			xAxis: {
				tickmarkPlacement: 'on',
				lineColor: '#33495f',
				gridLineColor: '#33495f',
				labels: {
					enabled: true,
					formatter: function () {
						return this.value;
					},
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
			},
			yAxis: {
				min: 0,
				gridLineColor: '#33495f',
				endOnTick: false,
				showLastLabel: true,
				labels: {
					formatter: function () {
						return this.value + '%';
					},
					style: {
						color: 'white',
						fontSize: '0.8vw'
					}
				},
				reversedStacks: false
			},
			tooltip: {
				formatter: function() {
					return 'The wind direction <span style="color:#4781bc;">varies with at least 60 degrees</span> in<br> <span style="color:#4781bc;">' + this.total + '%</span> of METAR with main wind direction <span style="color:#4781bc;">' + this.point.name + '</span>.<br> ('+ this.point.name + '/' + this.series.name + ': <span style="color:#4781bc;">' + this.y + '%</span>)';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			plotOptions: {
				series: {
					stacking: 'normal',
					shadow: false,
					groupPadding: 0,
					pointPlacement: 'on'
				}
			}
		});
		
		$('#weather_bar').highcharts({
			chart: {
				type: 'column',
				backgroundColor:'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			legend:{enabled: false},
			colors: ['#33495f'],
			title: {
				text: null
			},
			xAxis: {
				crosshair: true,
				categories: [
					<?php
						$last_temp = array_keys($weather_count);
						$last_key = end($last_temp);
						foreach ($weather_count as $key => $value) {
							if ($key == $last_key) {
								echo "'".$key."'";
							}
							else {
								echo "'".$key."',";
							}
						}
					?> //WX
					],
				labels: {
					style: {
						color: '#33495f',
						fontWeight: 'bold',
						fontSize: '0.8vw'
					}
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: '# of METAR',
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				},
				labels: {
					style: {
						color: '#33495f',
						fontSize: '0.8vw'
					}
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				},
				series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
					color: 'white',
					style: {
						fontSize: '0.8vw'
					}
				}
				}
			},
			tooltip: {    
				formatter: function() {
					return this.x + ': ' + this.y + ' metar';
				},
				style: {
					fontSize: '0.8vw'
				}
			},
			series: [{
				name: 'Weather',
				data: [
					<?php
						$last_temp = array_keys($weather_count);
						$last_key = end($last_temp);
						foreach ($weather_count as $key => $value) {
							if ($key == $last_key) {
								echo $value;
							}
							else {
								echo $value.',';
							}
						}
					?> //#WX
				]
			}]
		});
		
		$('#fg_freq').highcharts({

			chart: {
				type: 'heatmap',
				backgroundColor: 'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			title: {
				text: null
			},
		
			boost: {
				useGPUTranslations: true
			},
			
			xAxis: {
				categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				max: 11,
				min: 0
			},

			yAxis: {
				title: null,
				tickPositions: [0, 6, 12, 18, 24],
				tickWidth: 1,
				min: 0,
				max: 23,
			},
			
			tooltip: {
				formatter: function() {
					let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
					let firstHour = (this.y < 10) ? '0' + (this.y - 0.5) : (this.y - 0.5);
					let secondHour = (this.y < 10) ? '0' + (this.y + 0.5) : (this.y + 0.5);
					return months[this.point.x]	+ ' ' + firstHour + 'Z - ' + secondHour + 'Z: ' + this.point.value + ' metar';
				}
			},

			colorAxis: {
				stops: [
					[0, 'white'],
					[0.5, '#4781bc'],
					[1.0, '#33495f']
				],
				startOnTick: false,
				endOnTick: false,
			},

			series: [{
				name: 'Frequency',
				data: [				
					<?php
						foreach ($wx_freq["fg"] as $key => $value) {
							$expl = explode(" ", $key);
							$month = intval($expl[0]);
							$hour = floatval($expl[1]);
							if ($key != $last_key) {
								echo '['.$month.','.$hour.','.floatval($value).'],';
							} else {
								echo '['.$month.','.$hour.','.floatval($value).']';
							}
						}
					?>
				]
			}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						yAxis: {
							labels: {
								format: '{substr value 0 1}'
							}
						}
					}
				}]
			}

		});
		
		$('#fzra_freq').highcharts({

			chart: {
				type: 'heatmap',
				backgroundColor: 'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			title: {
				text: null
			},
		
			boost: {
				useGPUTranslations: true
			},
			
			tooltip: {
				formatter: function() {
					let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
					let firstHour = (this.y < 10) ? '0' + (this.y - 0.5) : (this.y - 0.5);
					let secondHour = (this.y < 10) ? '0' + (this.y + 0.5) : (this.y + 0.5);
					return months[this.point.x]	+ ' ' + firstHour + 'Z - ' + secondHour + 'Z: ' + this.point.value + ' metar';
				}
			},
			
			xAxis: {
				categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				max: 11,
				min: 0
			},

			yAxis: {
				title: null,
				tickPositions: [0, 6, 12, 18, 24],
				tickWidth: 1,
				min: 0,
				max: 23,
			},

			colorAxis: {
				stops: [
					[0, 'white'],
					[0.5, '#4781bc'],
					[1.0, '#33495f']
				],
				startOnTick: false,
				endOnTick: false,
			},

			series: [{
				name: 'Frequency',
				data: [				
					<?php
						foreach ($wx_freq["fzra"] as $key => $value) {
							$expl = explode(" ", $key);
							$month = intval($expl[0]);
							$hour = floatval($expl[1]);
							if ($key != $last_key) {
								echo '['.$month.','.$hour.','.floatval($value).'],';
							} else {
								echo '['.$month.','.$hour.','.floatval($value).']';
							}
						}
					?>
				]
			}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						yAxis: {
							labels: {
								format: '{substr value 0 1}'
							}
						}
					}
				}]
			}

		});
		
		$('#br_freq').highcharts({

			chart: {
				type: 'heatmap',
				backgroundColor: 'transparent'
			},
			credits:{enabled: false},
			exporting:{enabled: false},
			title: {
				text: null
			},
		
			boost: {
				useGPUTranslations: true
			},
			
			tooltip: {
				formatter: function() {
					let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
					let firstHour = (this.y < 10) ? '0' + (this.y - 0.5) : (this.y - 0.5);
					let secondHour = (this.y < 10) ? '0' + (this.y + 0.5) : (this.y + 0.5);
					return months[this.point.x]	+ ' ' + firstHour + 'Z - ' + secondHour + 'Z: ' + this.point.value + ' metar';
				}
			},
			
			xAxis: {
				categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				max: 11,
				min: 0
			},

			yAxis: {
				title: null,
				tickPositions: [0, 6, 12, 18, 24],
				tickWidth: 1,
				min: 0,
				max: 23,
			},
			
			tooltip: {    
				enabled: false
			},

			colorAxis: {
				stops: [
				    [0, 'white'],
					[0.5, '#4781bc'],
					[1.0, '#33495f']
				],
				startOnTick: false,
				endOnTick: false,
			},

			series: [{
				name: 'Frequency',
				data: [				
					<?php
						foreach ($wx_freq["br"] as $key => $value) {
							$expl = explode(" ", $key);
							$month = intval($expl[0]);
							$hour = floatval($expl[1]);
							if ($key != $last_key) {
								echo '['.$month.','.$hour.','.floatval($value).'],';
							} else {
								echo '['.$month.','.$hour.','.floatval($value).']';
							}
						}
					?>
				]
			}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						yAxis: {
							labels: {
								format: '{substr value 0 1}'
							}
						}
					}
				}]
			}

		});

	});
	</script>

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>	
	<script>
		var latitude = <?php echo $lat; ?>;
		var longitude = <?php echo $lon; ?>;

		const mapOptions = {
			center: [latitude, longitude],
			zoom: 10,
			zoomControl: true,
			scrollWheelZoom: false,
			keyboard: false,
			dragging: false,
			boxZoom: false,
			doubleClickZoom: false,
			tap: false,
			touchZoom: false
    	};
		const map1 = L.map('map1', mapOptions);   
		const map2 = L.map('map2', mapOptions);
		const map3 = L.map('map3', mapOptions);   
		const map4 = L.map('map4', mapOptions);   
		const map5 = L.map('map5', mapOptions);   
		const maps = [map1, map2, map3, map4, map5];
   
		// Add tiles to maps
		for (var i = 0; i < maps.length; i++) {
			L.tileLayer(
				'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
			}).addTo(maps[i]);
		}
		
    </script>

	<script src="js/main.js"></script>
	
</body>
</html>