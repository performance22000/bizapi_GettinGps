/**
 * get GPS
 * (c)2015 a.ide
 */
$(document).ready(function() {
	//クリックイベント
	$("#btnexec").click(function() {
		if ($(this).val() == 1) {
			setGpsOff($(this));
		}else{
			setGpsOn($(this));
		}
		return false;
	});
});


function windowOnLoad() {
	window.onload = function(){
//	    navigator.geolocation.watchPosition(update);
	}
}

function setGpsOn(btn) {
	var id = navigator.geolocation.watchPosition(updateGps);
//	setTimeout('updateGps()', 3000);	//3秒ごと
	$("#isexecmsg").html("ON");
	$("#watchid").val(id);
	$("#watchid").html("ID="+id);
	btn.val(1);
}

function setGpsOff(btn) {
	navigator.geolocation.clearWatch($("#watchid").val());
//	clearTimeout();
	$("#isexecmsg").html("OFF");
	$("#watchid").val("");
	$("#watchid").html("");
	btn.val(0);
}

// 位置が検出されたら緯度、経度、誤差と時間を表示
function updateGps(position){

	//動作確認用
/*
	var request = {
		 "command": "getgps"
		,"user": $("input[name='users']:checked").val()
		,"gpsdatacsv": "aa,bb,cc,dd,"+(new Date())
	};
	//ajax実行
	var r = executeAjaxTypeJson(request);
	if ((r["err"] != undefined) && (r["err"] == 1)) {
		setGpsOff($("#btnexec"));
		$("#pos").html("ERR: " + r["text"]);
		return;
	}
	$("#pos").html(r["content"]);
	setTimeout('updateGps()', 3000);	//3秒ごと
	return;
 */

	var lat = position.coords.latitude;	//緯度
	var lng = position.coords.longitude;//経度
	var acc = position.coords.accuracy;	//緯度経度の誤差
	var alt = position.coords.accuracy;	//高度
	var altacc = position.coords.accuracy;	//高度の誤差
	var hed = position.coords.accuracy;	//方角
	var spd = position.coords.accuracy;	//速度(m/sec)
//	document.getElementById("pos").innerHTML = lat+","+lng+","+acc+"<br>"+(new Date())+"<br>r="+r;

	//send server
	//csvformat GPRMC:時刻,A,緯度,N,経度,E,速度(not),移動方位,日付(ddmmyy),真北角度差,方角,A*チェックサム
	var gpsdatacsv = lat+","+lng+","+acc+","+alt+","+altacc+","+hed+","+spd+","+(Date.now());
	var request = {
		 "command": "getgps"
		,"user": $("input[name='users']:checked").val()
		,"watchid": $("#watchid").val()
		,"gpsdatacsv": gpsdatacsv
	};
	//ajax実行
	var r = executeAjaxTypeJson(request);
	if ((r["err"] != undefined) && (r["err"] == 1)) {
		setGpsOff($("#btnexec"));
		$("#pos").html("ERR: " + r["text"]);
		return;
	}
	$("#pos").html(r["content"]);
	return;
}
