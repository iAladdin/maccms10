<?php
/*
'软件名称：苹果CMS 源码库：https://github.com/magicblack
'--------------------------------------------------------
'Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
'遵循Apache2开源协议发布，并提供免费使用。
'--------------------------------------------------------
*/
header('Content-Type:text/html;charset=utf-8');
// 检测PHP环境
if (version_compare(PHP_VERSION, '5.5.0', '<'))  die('PHP版本需要>=5.5，请升级【PHP version requires > = 5.5，please upgrade】');
//超时时间
@ini_set('max_execution_time', '0');
//内存限制 取消内存限制
@ini_set("memory_limit", '-1');
// 定义应用目录
define('ROOT_PATH', __DIR__ . '/');
define('APP_PATH', __DIR__ . '/application/');
define('MAC_COMM', __DIR__ . '/application/common/common/');
define('MAC_HOME_COMM', __DIR__ . '/application/index/common/');
define('MAC_ADMIN_COMM', __DIR__ . '/application/admin/common/');
define('MAC_START_TIME', microtime(true));
define('BIND_MODULE', 'install');
define('ENTRANCE', 'install');
$in_file = rtrim($_SERVER['SCRIPT_NAME'], '/');
if (substr($in_file, strlen($in_file) - 4) !== '.php') {
	$in_file = substr($in_file, 0, strpos($in_file, '.php')) . '.php';
}
define('IN_FILE', $in_file);
if (is_file('./application/data/install/install.lock')) {
	echo '如需重新安装请删除【To re install, please remove】 >>> /application/data/install/install.lock';
	exit;
}

if (!is_writable('./runtime')) {
	echo '请开启[runtime]目录的读写权限【Please turn on the read and write permissions of the [runtime] folder】';
	exit;
}

$extraSrc = APP_PATH . '/install/origins/extra';
$extraDest = APP_PATH;

$dataSrc = APP_PATH . '/install/origins/data';
$dataDest = APP_PATH;

$runtimeSrc = APP_PATH . '/install/origins/runtime';
$runtimeDest = __DIR__;

$uploadSrc = APP_PATH . '/install/origins/upload';
$uploadDest = __DIR__;

$staticSrc = APP_PATH . '/install/origins/static';
$staticDest = __DIR__;

$templateSrc = APP_PATH . '/install/origins/template';
$templateDest = __DIR__;


shell_exec("tar -xvzf $extraSrc -C $extraDest");
shell_exec("tar -xvzf $dataSrc -C $dataDest");
shell_exec("tar -xvzf $runtimeSrc -C $runtimeDest");
shell_exec("tar -xvzf $uploadSrc -C $uploadDest");
shell_exec("tar -xvzf $staticSrc -C $staticDest");
shell_exec("tar -xvzf $templateSrc -C $templateDest");


// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';
