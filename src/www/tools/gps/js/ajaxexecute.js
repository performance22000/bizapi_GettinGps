/**
 * ajax execution
 * (c)2015 a.ide
 */
/**
 * call ajax type json
 */
function executeAjaxTypeJson(request) {
	var params = {
		 "data": request
	};
	var r = $.ajax({
		url: "../api/index/GettinGps/ajax/regist",
		data: params,
		async: false,
		type: 'POST',
		dataType: 'json',
		success: executeOK,
		error: executeNG
	});

	//result
	if (r.responseJSON == undefined) {
		var err = {
			"err": 1,
			"text": r.responseText
		};
		return err;
	}else{
		return r.responseJSON;
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
