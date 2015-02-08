<?php
/**
 * Zend FW application
 * (c)2015 a.ide
 * GettingGPS: regist data
 */
require_once ABSTRACTZEND_PATH . "/models/AbstractBizBase.php";
require_once "lib/Request.inc.php";

class Regist extends AbstractBizBase {

	public function __construct($controller = null) {
		parent::__construct($controller);
	}

	public function exec($request = array()) {
		extract($request);

		$req = new Request($request);

		//
		$filename = "gpsdata_{$data['user']}.nmea";
//		$this->writeTo($this->aplPath."/data/{$filename}", $data["gpsdatacsv"]);

		//表示するhtml返却
		$htmlrec = "GettinGPS AjaxRegist<br>\n";
		$htmlrec .= "request:<br>\n";
		$htmlrec .= print_r($request, true);
		$htmlrec .= "<br>\n";

		$htmlrec .= "request:<br>\n";
		$htmlrec .= print_r($req, true);

	//	$htmlrec .= "<br>\n";
	//	$htmlrec .= "<br>\n";
	//	$htmlrec .= "APPLICATION_ENVIRONMENT=".APPLICATION_ENVIRONMENT."<br>\n";
	//	$htmlrec .= "<br>\n";

		$res = array(
			"err" => 0,
			"projectname" => $this->projectName,
			"servicename" => $this->serviceName,
			"content" => $htmlrec
		);

		$htmlrec = json_encode($res);
		return $htmlrec;
	}

	private function writeTo($filename, $data) {
		try{
			//mode append
			$fp = fopen($filename, "a");
			if ($fp == null) {
				throw new Zend_Exception("Regist.writeTo: {$filename}");
			}
			fputs($fp, "{$data}\r\n");
			fclose($fp);

		}catch(Exception $ex) {
			throw $ex;
		}
	}

}
?>
