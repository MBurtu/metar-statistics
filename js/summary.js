$('.summary_btn').click(function(){
	var id = $(this).attr('id');
	var name = id;// + ' svg';
	
	// Set everything to default (not active)
	//$('.cavok svg, .imc svg, .wx svg, .manual svg, .fog svg').hide();
	$('.cavok_marker, .imc_marker, .wx_marker, .manual_marker, .fog_marker').hide();
	$('#cavok, #imc, #wx, #manual, #fog').removeClass('active');
	$('.cloud_tree, .rain_snow, .sun, .manual_auto, .fg').css('color', 'gray').css('background', '#F8F8F8');
	$('.cloud, .tree, .rain, .snow, .man').css('color', 'gray');
	
	// Activate clicked menu item
	$('.' + name + '_marker').show();
	$(this).addClass('active');
	if ($("#cavok").hasClass("active")) {
		$('.sun').css('color', '#FFFF00').css('background', 'lightblue');
	}
	if ($("#imc").hasClass("active")) {
		$('.cloud_tree').css('background', 'gainsboro');
		$('.cloud').css('color', 'gray').css('background', 'transparent');
		$('.tree').css('color', 'green').css('background', 'transparent');
	}
	if ($("#wx").hasClass("active")) {
		$('.rain_snow').css('background', 'lightblue');
		$('.rain').css('color', 'blue').css('background', 'transparent');
		$('.snow').css('color', 'white').css('background', 'transparent');
	}
	if ($("#manual").hasClass("active")) {
		$('.manual_auto').css('background', 'lightblue');
		$('.man').css('color', 'green').css('background', 'transparent');
		//$('.tree').css('color', 'green').css('background', 'transparent');
	}
	if ($("#fog").hasClass("active")) {
		$('.fg').css('color', 'yellow').css('background', 'gainsboro');
	}
});

// Map
const map = L.map('map', {
	center: [63.4851, 17.9162],
	zoom: 4
});

L.tileLayer(
		'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
	}).addTo(map);

//initialize svg to add to map
L.svg({clickable:true}).addTo(map) // we have to make the svg layer clickable
  

var color_cavok = d3.scaleSequential(d3.interpolateRdYlGn)
	.domain([0.0,0.6]);
var color_imc = d3.scaleSequential(d3.interpolateRdYlGn)
	.domain([0.6,1.0]);
var color_fog = d3.scaleSequential(d3.interpolateRdYlGn)
	.domain([0.94,1.00]);	
var color_manual = d3.scaleSequential(d3.interpolateRdYlGn)
	.domain([0.0,1.0]);	

var tooltip = d3.select("body")
	.append("div")
	.attr("class", "tooltip")
	.style("opacity", 0);

// Load the station data. When the data comes back, create an overlay_imc.
d3.csv("data/airports.csv").then(function(data) {

	///////////////////////////
	//  CAVOK
	//////////////////////////
	
	const overlay = d3.select(map.getPanes().overlayPane).attr("class", "overlay");
    const svg = overlay.select("svg").attr("pointer-events", "auto")

	var cavok = svg.append("g")
		.attr("class", "cavok_marker");
	
	cavok.selectAll("cavok_markers")
        .data(data) 
        .enter().append("circle")
        .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
        .attr("r", "0.6em")
		.style("fill", function(d) { return color_cavok(d.cavok*0.01); })
		.on("mouseover", function(d) {
			tooltip.transition()
				.style("opacity", 1.0);
			tooltip.html(
				'<span style="font-size:120%;font-weight:bold;"><span style="color:blue;"><i class="fas fa-info-circle"></i></span> '+d.ICAO+'<i class="fas fa-plane" style="float:right;"></i></span><hr><span style="font-size:110%;text-align:center;"><b>'+
				d.start+'</b> <i class="fas fa-arrow-right"></i> <b>'+d.end+'</b></span><hr><b>'+
				d.metar+'</b> METAR (<b>'+d.manual+'%</b> manual)<hr>CAVOK: <b>'+
				d.cavok+'%</b>, IMC: <b>'+d.imc+'%</b>, FG: <b>'+d.fog+'%</b><hr>Most common weather: <b>'+
				d.wx + '</b>'
			)
			.style("left", (d3.event.pageX + 5) + "px")
			.style("top", (d3.event.pageY - 28) + "px")
		})
		.on("mouseout", function(d) {
			tooltip.transition()
				.style("opacity", 0);
		});
	
	// Add a label.
	cavok.selectAll("cavok_text")
        .data(data) 
        .enter().append("text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.text(function(d) { return Math.round(d.cavok); })
		.attr("class", "text")
		.attr("alignment-baseline", "middle")
		.style("text-anchor", "middle")
		.on("mouseover", function(d) {
			tooltip.transition()
				.style("opacity", 1.0);
			tooltip.html(
				'<span style="font-size:120%;font-weight:bold;"><span style="color:blue;"><i class="fas fa-info-circle"></i></span> '+d.ICAO+'<i class="fas fa-plane" style="float:right;"></i></span><hr><span style="font-size:110%;text-align:center;"><b>'+
				d.start+'</b> <i class="fas fa-arrow-right"></i> <b>'+d.end+'</b></span><hr><b>'+
				d.metar+'</b> METAR (<b>'+d.manual+'%</b> manual)<hr>CAVOK: <b>'+
				d.cavok+'%</b>, IMC: <b>'+d.imc+'%</b>, FG: <b>'+d.fog+'%</b><hr>Most common weather: <b>'+
				d.wx + '</b>'
			)
			.style("left", (d3.event.pageX + 5) + "px")
			.style("top", (d3.event.pageY - 28) + "px")
		})
		.on("mouseout", function(d) {
			tooltip.transition()
				.style("opacity", 0);
		});
        
    // Function that update circle position if something change
    const update_cavok = () => cavok.selectAll("circle,text")
        .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })

    // If the user change the map (zoom or drag), update circle position:
    map.on("moveend", update_cavok)
    map.on("zoomend", update_cavok)

	///////////////////////////
	//  IMC
	//////////////////////////
	
	var imc = svg.append("g")
		.attr("class", "imc_marker");

	imc.selectAll("imc_markers")
        .data(data) 
        .enter().append("circle")
        .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
        .attr("r", "0.6em")
		.style("fill", function(d) { return color_imc(1-d.imc*0.01); });

	// Add a label.
	imc.selectAll("imc_text")
        .data(data) 
        .enter().append("text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.text(function(d) { return Math.round(d.imc); })
		.attr("alignment-baseline", "middle")
		.style("text-anchor", "middle")
		.on("mouseover", function(d) {
			tooltip.transition()
				.style("opacity", 1.0);
			tooltip.html(
				'<span style="font-size:120%;font-weight:bold;"><span style="color:blue;"><i class="fas fa-info-circle"></i></span> '+d.ICAO+'<i class="fas fa-plane" style="float:right;"></i></span><hr><span style="font-size:110%;text-align:center;"><b>'+
				d.start+'</b> <i class="fas fa-arrow-right"></i> <b>'+d.end+'</b></span><hr><b>'+
				d.metar+'</b> METAR (<b>'+d.manual+'%</b> manual)<hr>CAVOK: <b>'+
				d.cavok+'%</b>, IMC: <b>'+d.imc+'%</b>, FG: <b>'+d.fog+'%</b><hr>Most common weather: <b>'+
				d.wx + '</b>'
			)
			.style("left", (d3.event.pageX + 5) + "px")
			.style("top", (d3.event.pageY - 28) + "px")
		})
		.on("mouseout", function(d) {
			tooltip.transition()
				.style("opacity", 0);
		})
		.attr("class", "text");
        
    // Function that update circle position if something change
    const update_imc = () => imc.selectAll("circle,text")
        .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })

    // If the user change the map (zoom or drag), update circle position:
    map.on("moveend", update_imc)
    map.on("zoomend", update_imc)
	
	///////////////////////////
	//  FG/FZFG
	//////////////////////////
	
	var fog = svg.append("g")
		.attr("class", "fog_marker");

	fog.selectAll("fog_markers")
        .data(data) 
        .enter().append("circle")
        .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
        .attr("r", "0.6em")
		.style("fill", function(d) { return  color_fog(1-d["fog"]*0.01); });

	// Add a label.
	fog.selectAll("fog_text")
        .data(data) 
        .enter().append("text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.attr("alignment-baseline", "middle")
		.style("text-anchor", "middle")
		.text(function(d) { return d.fog; })
		.on("mouseover", function(d) {
			tooltip.transition()
				.style("opacity", 1.0);
			tooltip.html(
				'<span style="font-size:120%;font-weight:bold;"><span style="color:blue;"><i class="fas fa-info-circle"></i></span> '+d.ICAO+'<i class="fas fa-plane" style="float:right;"></i></span><hr><span style="font-size:110%;text-align:center;"><b>'+
				d.start+'</b> <i class="fas fa-arrow-right"></i> <b>'+d.end+'</b></span><hr><b>'+
				d.metar+'</b> METAR (<b>'+d.manual+'%</b> manual)<hr>CAVOK: <b>'+
				d.cavok+'%</b>, IMC: <b>'+d.imc+'%</b>, FG: <b>'+d.fog+'%</b><hr>Most common weather: <b>'+
				d.wx + '</b>'
			)
			.style("left", (d3.event.pageX + 5) + "px")
			.style("top", (d3.event.pageY - 28) + "px")
		})
		.on("mouseout", function(d) {
			tooltip.transition()
				.style("opacity", 0);
		})
		.attr("class", "text");
        
    // Function that update circle position if something change
    const update_fog = () => fog.selectAll("circle,text")
		.attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })

    // If the user change the map (zoom or drag), update circle position:
    map.on("moveend", update_fog)
    map.on("zoomend", update_fog)
	

	///////////////////////////
	//  WX
	//////////////////////////

	var wx = svg.append("g")
			.attr("class", "wx_marker")

	wx.selectAll("wx_markers")
        .data(data)
		.enter().append("rect")
		.style("fill", function(d) {
				if (d.wx == 'BR'){
					return 'yellow'
				}else if (d.wx == 'RA' || d.wx == 'SHRA'){
					return 'green'
				}else if (d.wx == 'SN' || d.wx == 'SHSN'){
					return '#3333ff'
				}else if (d.wx == 'DRSN' || d.wx == 'BLSN'){
					return 'lightblue'
				}
			}
		)
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.attr("width", function(d) {
				if (d.wx.length == 2){
					return "0.9em"  
				}else{
					return "1.8em"
				}
			}
		)
		.attr("height", "0.8em");

	// Add labels
	wx.selectAll("wx_text")
        .data(data) 
        .enter().append("text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.text(function(d) { return d.wx; })
		.attr("alignment-baseline", "hanging")
		.attr("class", "text")
		.style("fill", function(d) {
				if (d.wx == 'BR'){
					return '#333'
				}else {
					return 'white'
				}
			}
		)
		.on("mouseover", function(d) {
			tooltip.transition()
				.style("opacity", 1.0);
			tooltip.html(
				'<span style="font-size:120%;font-weight:bold;"><span style="color:blue;"><i class="fas fa-info-circle"></i></span> '+d.ICAO+'<i class="fas fa-plane" style="float:right;"></i></span><hr><span style="font-size:110%;text-align:center;"><b>'+
				d.start+'</b> <i class="fas fa-arrow-right"></i> <b>'+d.end+'</b></span><hr><b>'+
				d.metar+'</b> METAR (<b>'+d.manual+'%</b> manual)<hr>CAVOK: <b>'+
				d.cavok+'%</b>, IMC: <b>'+d.imc+'%</b>, FG: <b>'+d.fog+'%</b><hr>Most common weather: <b>'+
				d.wx + '</b>'
			)
			.style("left", (d3.event.pageX + 5) + "px")
			.style("top", (d3.event.pageY - 28) + "px")
		})
		.on("mouseout", function(d) {
			tooltip.transition()
				.style("opacity", 0);
		});
        
    // Function that update circle position if something change
    const update_wx= () => wx.selectAll("rect,text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })

    // If the user change the map (zoom or drag), update circle position:
    map.on("moveend", update_wx)
    map.on("zoomend", update_wx)
	
	///////////////////////////
	//  Manual METAR
	//////////////////////////

	var manual = svg.append("g")
			.attr("class", "manual_marker")

	manual.selectAll("manual_markers")
        .data(data)
		.enter().append("rect")
		.style("fill", function(d) { return color_manual(d.manual*0.01); })
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.attr("width", function(d) {
				var roundManual = Math.round(d.manual);
				console.log(roundManual.length);
				if (roundManual.toString().length == 1){
					return "0.5em"  	
				} else if (roundManual.toString().length == 2){
					return "0.8em"  
				} else {
					return "1.3em"
				}
			}
		)
		.attr("height", "0.8em")

	// Add labels
	manual.selectAll("wx_text")
        .data(data) 
        .enter().append("text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
		.text(function(d) { return Math.round(d.manual); })
		.attr("alignment-baseline", "hanging")
		.attr("class", "text")
		.style("fill", function(d) {
				if (d.manual < 30 || d.manual > 90){
					return 'white'
				}
			}
		)
		.on("mouseover", function(d) {
			tooltip.transition()
				.style("opacity", 1.0);
			tooltip.html(
				'<span style="font-size:120%;font-weight:bold;"><span style="color:blue;"><i class="fas fa-info-circle"></i></span> '+d.ICAO+'<i class="fas fa-plane" style="float:right;"></i></span><hr><span style="font-size:110%;text-align:center;"><b>'+
				d.start+'</b> <i class="fas fa-arrow-right"></i> <b>'+d.end+'</b></span><hr><b>'+
				d.metar+'</b> METAR (<b>'+d.manual+'%</b> manual)<hr>CAVOK: <b>'+
				d.cavok+'%</b>, IMC: <b>'+d.imc+'%</b>, FG: <b>'+d.fog+'%</b><hr>Most common weather: <b>'+
				d.wx + '</b>'
			)
			.style("left", (d3.event.pageX + 5) + "px")
			.style("top", (d3.event.pageY - 28) + "px")
		})
		.on("mouseout", function(d) {
			tooltip.transition()
				.style("opacity", 0);
		});
        
    // Function that update circle position if something change
    const update_manual= () => manual.selectAll("rect,text")
        .attr("x", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("y", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })

    // If the user change the map (zoom or drag), update circle position:
    map.on("moveend", update_manual)
    map.on("zoomend", update_manual)
});