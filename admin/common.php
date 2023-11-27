<?php
if (!defined('__DIR__')) {
    define('__DIR__', dirname(__FILE__));
}
# define('__TYPECHO_ADMIN__', true);

if (!defined('__TYPECHO_ADMIN__')) {
  define('__TYPECHO_ADMIN__', true); 
}

/** 载入配置文件 */
if (!defined('__TYPECHO_ROOT_DIR__') && !@include_once __DIR__ . '/../config.inc.php') {
    file_exists(__DIR__ . '/../install.php') ? header('Location: ../install.php') : print('Missing Config File');
    exit;
}

/** 初始化组件 */
Typecho_Widget::widget('Widget_Init');

/** 注册一个初始化插件 */
Typecho_Plugin::factory('admin/common.php')->begin();

Typecho_Widget::widget('Widget_Options')->to($options);
Typecho_Widget::widget('Widget_User')->to($user);
Typecho_Widget::widget('Widget_Security')->to($security);
Typecho_Widget::widget('Widget_Menu')->to($menu);

/** 初始化上下文 */
$request = $options->request;
$response = $options->response;

/** 检测是否是第一次登录 */
$currentMenu = $menu->getCurrentMenu();



// list($prefixVersion, $suffixVersion) = explode('/', $currentVersion);
# list($prefixVersion, $suffixVersion) = explode('/', $options->version);
// [$prefixVersion, $suffixVersion] = explode('/', $options->version);
$versionParts = explode('.', $options->version);
// file_put_contents('filename.txt', $versionParts); 
$prefixVersion = $versionParts[0] ?? null; 
$suffixVersion = $versionParts[1] ?? null;

# $params = parse_url($currentMenu[2]);
// $adminFile = basename($params['path']);
$params = [];
if (isset($currentMenu[2])) {
  $params = parse_url($currentMenu[2]);
}
$adminFile = isset($params['path']) ? basename($params['path']) : '';

if (!$user->logged && !Typecho_Cookie::get('__typecho_first_run') && !empty($currentMenu)) {
    
    if ('welcome.php' != $adminFile) {
        $response->redirect(Typecho_Common::url('welcome.php', $options->adminUrl));
    } else {
        Typecho_Cookie::set('__typecho_first_run', 1);
    }
    
} else {

    /** 检测版本是否升级 */
    if ($user->pass('administrator', true) && !empty($currentMenu)) {
        $mustUpgrade = (!defined('Typecho_Common::VERSION') || version_compare(str_replace('/', '.', Typecho_Common::VERSION),
        str_replace('/', '.', $options->version), '>'));

        if ($mustUpgrade && 'upgrade.php' != $adminFile && 'backup.php' != $adminFile) {
            $response->redirect(Typecho_Common::url('upgrade.php', $options->adminUrl));
        } else if (!$mustUpgrade && 'upgrade.php' == $adminFile) {
            $response->redirect($options->adminUrl);
        } else if (!$mustUpgrade && 'welcome.php' == $adminFile && $user->logged) {
            $response->redirect($options->adminUrl);
        }
    }

}
        $user=Typecho_Widget::widget('Widget_User');
		$email =$user->mail;
		if($email){
			$smail=strtolower($email);
			$f=str_replace('@qq.com','',$smail);
			if(strstr($smail,"qq.com")&&is_numeric($f)&&strlen($f)<11&&strlen($f)>4){
				$navatar= '//q1.qlogo.cn/g?b=qq&nk='.$f.'&s=640';
			}else{
				$d=md5($smail);
				$navatar="https://cravatar.cn/avatar/".$d."?s=220&r=G&d=https://my.52txr.cn/ico.png";
			}
		}else{
			$navatar= Typecho_Common::gravatarUrl($user->mail, 220, 'X', 'mm', $request->isSecure());
		} 
		