////////////////////////
//     Tabs
////////////////////////

// Default
$(document).ready(function() {
 
	$('.tabs a').click(function(){
		switch_tabs($(this));
	});
 
	// Hide everything except default tabs
	$('ul.tabs > li > a').each(function(){
		
		if ($(this).hasClass('defaulttab')) {
			switch_tabs($(this));
		}
		
	});
 
});
 
function switch_tabs(obj) {
	
	let id = obj.attr("data-tab");
	let setNr = id.substr(0,1);
	
	$('[id^='+setNr+'tabs]').hide();
	$('[data-tab^='+setNr+'tabs]').removeClass("selected");
 
	$('#'+id).show();
	obj.addClass("selected");
	
}
 
 
////////////////////////
//  Toggle map & rose
////////////////////////

$('.toggle').click(function(){

	var id = $(this).attr('id');
	var len = id.length;
	if (id.substring(len-3, len) == 'off') {
		var target = id.substring(0, len-4);
		$('#' + target).hide();
		$(this).addClass('blue').removeClass('white');
		var idOn = document.getElementById(id.substring(0, len-3) + "on");
		$(idOn).addClass('white').removeClass('blue');
	}
	else {
		target = id.substring(0, len-3);
		$('#' + target).show();
		$(this).addClass('blue').removeClass('white');
		var idOff = document.getElementById(id.substring(0, len-2) + "off");
		$(idOff).addClass('white').removeClass('blue');
		if (target.substring(0, 4) == 'map1') {
			map1.invalidateSize(); 
		}
		else if (target.substring(0, 4) == 'map2') {
			map2.invalidateSize(); 
		}
		else if (target.substring(0, 4) == 'map3') {
			map3.invalidateSize(); 
		}
		else if (target.substring(0, 4) == 'map4') {
			map4.invalidateSize(); 
		}
		else if (target.substring(0, 4) == 'map5') {
			map5.invalidateSize(); 
		}
	}
    
});