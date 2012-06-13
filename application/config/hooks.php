<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
/*
| -------------------------------------------------------------------------
| checkLogin
| -------------------------------------------------------------------------
| 检测用户登录情况
|
|
*/
$hook['post_controller_constructor'] = array(
                                'class'    => 'OauthClass',
                                'function' => 'checkLogin',
                                'filename' => 'Oauthclass.php',
                                'filepath' => 'hooks',
                                );
                                
/*
| -------------------------------------------------------------------------
| rectify
| -------------------------------------------------------------------------
| 矫正路由将路由中的 &action=xxxx变成 /action/xxxx格式
|
|
                                
$hook['pre_system'] = array(
                                'class'    => 'CheckURI',
                                'function' => 'rectify',
                                'filename' => 'Checkuri.php',
                                'filepath' => 'hooks',
                                );
*/                                
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */