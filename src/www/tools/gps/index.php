<?php
/**
 * ZendFW
 */
$bizservicepath = dirname(__FILE__)."/../../../_bizserviceapi";

/** shared path */
define("ABSTRACTZEND_PATH", "{$bizservicepath}/Abstract/application");
define("APPLICATION_PATH", ABSTRACTZEND_PATH);

// AUTOLOADER（オートロード）
// オートロードのセットアップです。
// Zend Frameworkのクラスが自動的に呼び出されるようになる仕掛けです。
// いちいちincludeやrequireなど書かなくてよくなります。
////require_once "Zend/Loader.php";
////Zend_Loader::registerAutoload();

// REQUIRE APPLICATION BOOTSTRAP（ブートストラップ）
// アプリケーション固有のセットアップを行います。
// MVC環境の利用のためのセットアップだったり、
// テスト環境用のセットアップ、開発環境用のセットアップなどができます。
require APPLICATION_PATH . '/../bootstrap.php';

// DISPATCH（ディスパッチ）
// Dispatch the request using the front controller.
// The front controller is a singleton, and should be setup by now. We
// will grab an instance and dispatch it, which dispatches your
// application.
$front = Zend_Controller_Front::getInstance();
$front->setParam('noViewRenderer', true);
$front->dispatch();
?>
