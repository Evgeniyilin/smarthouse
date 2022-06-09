setInterval(function UpdateInfo() {    
	$.get("sensor.ini", function(data) {
		var arInfo = $.parseJSON(data);
		$("#paramBlock1 span").text(arInfo.codeParams1);
		$("#paramBlock2 span").text(arInfo.codeParams2);
		//$('#ch1p').prop("checked", arInfo.codeParams3);
		//if($('#ch1p').attr("checked") == "checked") {
		if(arInfo.codeParams3 == true) {
			if($('#ch1p').attr("cp1") == "true") {
				$('#ch1p').prop("checked", arInfo.codeParams3);
				$("#ch1p").attr("cp1","wait");
				$("#ch1p").attr("checked","checked");
			} else {
				$("#ch1p").attr("cp1","true");
			}
		};
		if(arInfo.codeParams3 == false) {
			if($('#ch1p').attr("cp1") == "false") {
				$('#ch1p').prop("checked", arInfo.codeParams3);
				$("#ch1p").attr("cp1","wait");
				$("#ch1p").removeAttr("checked");
			} else {
				$("#ch1p").attr("cp1","false");
			}
		};			
	});
}, 2000);

/*ch1 = sensor.ini
if ch1 != ch1p
	wait 2sec
	ch1 = sensor.ini
	ch1p = ch1
*/	

//$(function(){setInterval(UpdateInfo, 1000);});
//setInterval(UpdateInfo, 1000);