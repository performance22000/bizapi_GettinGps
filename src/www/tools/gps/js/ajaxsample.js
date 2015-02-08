/**
 * test js
 */
$(document).ready(function() {
	//クリックイベント
	$("#btnsend").click(function() {
		execute("btn", "sample");
	});
});

/** click event */
function execute(command, csv) {
	var dsp = {
		 "command": command
		,"csv": csv
	};
	var params = {
		 "data": dsp
	};
	var r = $.ajax({
		url: "../api/index/zzSample/01/ajaxsample",
		data: params,
		async: false,
		type: 'POST',
		dataType: 'json',
		success: executeOK,
		error: executeNG
	});

	//result
	if (r.responseJSON == undefined) {
		$("#pos").html("ERR: " + r.responseText);
	}else{
		$("#pos").html(r.responseJSON["content"]);
	}
}
//処理結果コールバック関数
function executeOK(res)
{
	return true;
}
function executeNG(res)
{
	return false;
}
