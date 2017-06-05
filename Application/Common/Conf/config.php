<?php
session_start();
$marks = $_SESSION['lang']['mark'];
foreach($marks as $mark)
{
    $mymarks[] = $mark['mark'];
}
$langmarks = implode(',',$mymarks);
return array(
	//'配置项'=>'配置值'
	'LANG_SWITCH_ON'  => true,    //开启多语言支持开关
'DEFAULT_LANG'    => 'zh-cn',  // 默认语言
'LANG_LIST'    => $langmarks, // 允许切换的语言列表 用逗号分隔
'LANG_AUTO_DETECT'  => true,  // 自动侦测语言
'VAR_LANGUAGE'  => 'l',    //默认语言切换变量
);