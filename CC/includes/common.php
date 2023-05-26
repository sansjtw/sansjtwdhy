<?php
error_reporting(0);
define("CACHE_FILE", 0);
define("IN_CRONLITE", true);
define("SYSTEM_ROOT", dirname(__FILE__) . "/");
define("ROOT", dirname(SYSTEM_ROOT) . "/");
define("SYS_KEY", "lanhz_key2222222254448787852245552");
define("CC_Defender", 1);
date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");
session_start();
$scriptpath = str_replace("\\", "/", $_SERVER["SCRIPT_NAME"]);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, "/"));
$siteurl = ($_SERVER["SERVER_PORT"] == "443" ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $sitepath . "/";
require ROOT . "config.php";
require SYSTEM_ROOT . "version.php";
if (!defined("SQLITE") && (!$dbconfig["user"] || !$dbconfig["pwd"] || !$dbconfig["dbname"])) {
	header("Content-type:text/html;charset=utf-8");
	echo "你还没安装！<a href=\"/install/\">点此安装</a>";
	exit(0);
}
include_once SYSTEM_ROOT . "db.class.php";
$DB = new DB($dbconfig["host"], $dbconfig["user"], $dbconfig["pwd"], $dbconfig["dbname"], $dbconfig["port"]);
if ($DB->query("select * from lan_config where 1") == false) {
	header("Content-type:text/html;charset=utf-8");
	echo "你还没安装！<a href=\"/install/\">点此安装</a>";
	exit(0);
}
include SYSTEM_ROOT . "cache.class.php";
$CACHE = new CACHE();
$conf = unserialize($CACHE->read());
if (empty($conf['version'])) {
	$conf = $CACHE->update();
}
if ($conf["version"] < DB_VERSION) {
	if (!$install) {
		header("Content-type:text/html;charset=utf-8");
		echo "请先完成网站升级！<a href=\"/install/update.php\"><font color=red>点此升级</font></a>";
		exit(0);
	}
}
$cdnpublic='//lib.baomitu.com/';
$logo1="/assets/gn/images/logo.png";
$password_hash = "!@#%!s!0";
include_once SYSTEM_ROOT . "authcode.php";
define("authcode", $authcode);
include_once SYSTEM_ROOT . "function.php";
include_once SYSTEM_ROOT . "core.func.php";
include_once SYSTEM_ROOT . "member.php";

if (!file_exists(ROOT . "install/install.lock") && file_exists(ROOT . "install/index.php")) {
	sysmsg("<h2>检测到无 install.lock 文件</h2><ul><li><font size=\"4\">如果您尚未安装本程序，请<a href=\"./install/\">前往安装</a></font></li><li><font size=\"4\">如果您已经安装本程序，请手动放置一个空的 install.lock 文件到 /install 文件夹下，<b>为了您站点安全，在您完成它之前我们不会工作。</b></font></li></ul><br/><h4>为什么必须建立 install.lock 文件？</h4>它是莫名cc测压系统的保护文件，如果检测不到它，就会认为站点还没安装，此时任何人都可以安装/重装莫名cc测压系统洪压力。<br/><br/>", true);
}
$cookiesid = $_COOKIE["mysid"];
if (!$cookiesid || !preg_match("/^[0-9a-z]{32}\$/i", $cookiesid)) {
	$cookiesid = md5(uniqid(mt_rand(), 1) . time());
	setcookie("mysid", $cookiesid, time() + 604800, "/");
}

if (!defined("authcode")) {
	exit("授权码不可为空");
}
