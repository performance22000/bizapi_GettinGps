<?php
/**
 * Zend FW application
 * (c)2015 a.ide
 * GettinGPS: Index
 */
require_once ABSTRACTZEND_PATH . "/models/AbstractBizBase.php";

class Index extends AbstractBizBase {

	public function __construct($controller = null) {
		parent::__construct($controller);
	}

	public function exec($request = array()) {
		extract($request);

		$view = new View();
		$view->setScriptPath($this->viewPath);
		$view->addColumnItems("baseurl", $this->aplConfig->application->baseurl);
		$view->addColumnItems("templateurl", $this->aplConfig->application->templateurl);
		$htmlrec = $view->render("index.phtml");
		return $htmlrec;
	}

}
?>
