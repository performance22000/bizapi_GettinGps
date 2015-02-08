<?php
/**
 * Request
 */
class Request {

	public $items = array();

	/**
	 * constructor
	 */
	public function __construct($request = array()) {

		foreach ($request as $key => $value) {
			$this->items[$key] = $value;
		}

	}

}
?>
