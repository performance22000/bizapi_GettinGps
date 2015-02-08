<?php
/**
 * GPSデータ
 */
class GpsDataGPRMC {

	/**
	 * constructor
	 */
	public function __construnt($csv) {
		try{
			//	csvformat GPRMC:時刻,A,緯度,N,経度,E,速度(not),移動方位,日付(ddmmyy),真北角度差,方角,A*チェックサム
			//	var gpsdatacsv = lat+","+lng+","+acc+","+alt+","+altacc+","+hed+","+spd+","+(new Date());

			$cols = explode(",", $csv);

			$gprmc = "{$cols[0]},{$cols[1]},{$cols[2]},{$cols[3]},{$cols[4]}";




		}catch(Exception $ex) {
			throw new Zend_Exception("unknown GPS Data csv={$csv}");
		}

	}

}
?>
