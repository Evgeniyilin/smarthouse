function UpdateInfo()
{
    $.get("sensor.ini", function(data)
    {
        var arInfo = $.parseJSON(data);

        $("#paramBlock1 span").text(arInfo.codeParams1);
        $("#paramBlock2 span").text(arInfo.codeParams2);
		$('#ch1').prop("checked", arInfo.codeParams3);
				
    });
}

$(function () {
    setInterval(UpdateInfo, 990);
});