<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['aci_status'] = array (
    'systemVersion' => '1.0.0',
    'installED' => true,
);
$config['aci_module'] = array (
    'welcome' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'welcome',
            'modulePath' => '',
            'moduleCaption' => '首页',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => '',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => '',
                            'controller' => 'welcome',
                            'method' => '',
                            'caption' => '欢迎界面',
                        ),
                ),
        ),
    'page' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'page',
            'modulePath' => '',
            'moduleCaption' => '前端',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => '',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    array (
                        'folder' => '',
                        'controller' => 'page',
                        'method' => 'content',
                        'caption' => '欢迎界面',
                    ),
                    array (
                        'folder' => '',
                        'controller' => 'page',
                        'method' => 'cat',
                        'caption' => '欢迎界面',
                    ),
                ),
        ),
    'adminpanel' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'user',
            'modulePath' => 'adminpanel',
            'moduleCaption' => '后台管理中心',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/user',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'manage',
                            'method' => 'index',
                            'caption' => '管理中心-首页',
                        ),
                    1 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'manage',
                            'method' => 'login',
                            'caption' => '管理中心-登录',
                        ),
                    2 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'manage',
                            'method' => 'logout',
                            'caption' => '管理中心-注销',
                        ),
                    3 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'profile',
                            'method' => 'change_pwd',
                            'caption' => '管理中心-修改密码',
                        ),
                    4 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'manage',
                            'method' => 'login',
                            'caption' => '管理中心-登录',
                        ),
                    5 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'manage',
                            'method' => 'go',
                            'caption' => '管理中心-URL转向',
                        ),
                    6 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'manage',
                            'method' => 'cache',
                            'caption' => '管理中心-全局缓存',
                        ),
                ),
        ),
    'user' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'user',
            'modulePath' => 'adminpanel',
            'moduleCaption' => '用户 / 用户组管理',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/user',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'index',
                            'caption' => '用户管理-列表',
                        ),
                    1 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'check_username',
                            'caption' => '用户管理-检测用户名',
                        ),
                    2 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'delete',
                            'caption' => '用户管理-删除',
                        ),
                    3 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'lock',
                            'caption' => '用户管理-锁定',
                        ),
                    4 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'edit',
                            'caption' => '用户管理-编辑',
                        ),
                    5 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'add',
                            'caption' => '用户管理-新增',
                        ),
                    6 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'user',
                            'method' => 'upload',
                            'caption' => '用户管理-上传图像',
                        ),
                    7 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'role',
                            'method' => 'index',
                            'caption' => '用户组管理-列表',
                        ),
                    8 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'role',
                            'method' => 'setting',
                            'caption' => '用户组管理-权限设置',
                        ),
                    9 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'role',
                            'method' => 'add',
                            'caption' => '用户组管理-新增',
                        ),
                    10 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'role',
                            'method' => 'edit',
                            'caption' => '用户组管理-编辑',
                        ),
                    11 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'role',
                            'method' => 'delete_one',
                            'caption' => '用户组管理-删除',
                        ),
                ),
        ),

    'moduleMenu' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'moduleMenu',
            'modulePath' => 'adminpanel',
            'moduleCaption' => '菜单管理',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/moduleMenu',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleMenu',
                            'method' => 'index',
                            'caption' => '菜单管理-列表',
                        ),
                    1 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleMenu',
                            'method' => 'add',
                            'caption' => '菜单管理-新增',
                        ),
                    2 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleMenu',
                            'method' => 'edit',
                            'caption' => '菜单管理-编辑',
                        ),
                    3 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleMenu',
                            'method' => 'delete',
                            'caption' => '菜单管理-删除',
                        ),
                    4 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleMenu',
                            'method' => 'set_menu',
                            'caption' => '菜单管理-设置菜单',
                        ),
                ),
        ),
    'moduleManage' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'module',
            'modulePath' => 'adminpanel',
            'moduleCaption' => '模块安装管理',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/moduleManage',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleManage',
                            'method' => 'index',
                            'caption' => '模块管理',
                        ),
                    1 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleInstall',
                            'method' => 'index',
                            'caption' => '模块管理-开始',
                        ),
                    2 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleInstall',
                            'method' => 'check',
                            'caption' => '模块管理-检查',
                        ),
                    3 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleInstall',
                            'method' => 'setup',
                            'caption' => '模块管理-安装',
                        ),
                    4 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleInstall',
                            'method' => 'uninstall',
                            'caption' => '模块管理-卸载',
                        ),
                    5 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleInstall',
                            'method' => 'reinstall',
                            'caption' => '模块管理-重新安装',
                        ),
                    6 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'moduleInstall',
                            'method' => 'delete',
                            'caption' => '模块管理-删除',
                        ),
                ),
        ),
    'helloWorld' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'helloWorld',
            'modulePath' => 'adminpanel',
            'moduleCaption' => 'Hello World',
            'description' => '这里一个演示模块，来自于吸心大法第三章',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/helloWorld',
            'system' => false,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'helloWorld',
                            'method' => 'index',
                            'menu_name' => NULL,
                            'caption' => NULL,
                        ),
                ),
        ),
    'article' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-01-15 17:47:10',
            'moduleName' => 'article',
            'modulePath' => 'adminpanel',
            'moduleCaption' => '文章内容管理',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/article',
            'system' => false,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'index',
                            'caption' => '文章单页-列表',
                        ),
                    1 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'add',
                            'caption' => '文章单页-新增',
                        ),
                    2 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'edit',
                            'caption' => '文章单页-编辑',
                        ),
                    3 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'delete',
                            'caption' => '文章单页-删除',
                        ),
                    4 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'readonly',
                            'caption' => '文章单页-查看',
                        ),
                    5 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'position',
                            'caption' => '文章单页-推荐位',
                        ),
                    6 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'article',
                            'method' => 'upload',
                            'caption' => '文章单页-上传图片',
                        ),
                    7 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'index',
                            'caption' => '文章分类-列表',
                        ),
                    8 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'load_template',
                            'caption' => '文章分类-加载模板',
                        ),
                    9 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'delete',
                            'caption' => '文章分类-删除',
                        ),
                    10 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'edit',
                            'caption' => '文章分类-编辑',
                        ),
                    11 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'add',
                            'caption' => '文章分类-新增',
                        ),
                    12 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'set_sort',
                            'caption' => '文章分类-排序',
                        ),
                    13 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'articleMenu',
                            'method' => 'public_cache',
                            'caption' => '文章分类-缓存',
                        ),
                ),
        ),
    'admanage' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-01-15 17:47:10',
            'moduleName' => 'admanage',
            'modulePath' => 'adminpanel',
            'moduleCaption' => '广告管理',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'adminpanel/admanage',
            'system' => false,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    14 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'adManage',
                            'method' => 'index',
                            'caption' => '广告-列表',
                        ),
                    15 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'adManage',
                            'method' => 'add',
                            'caption' => '广告-编辑',
                        ),
                    16 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'adManage',
                            'method' => 'edit',
                            'caption' => '广告-编辑',
                        ),
                    17 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'adManage',
                            'method' => 'upload',
                            'caption' => '广告-上传',
                        ),
                    18 =>
                        array (
                            'folder' => 'adminpanel',
                            'controller' => 'adManage',
                            'method' => 'delete',
                            'caption' => '广告-删除',
                        ),
                ),
        ),
    'member' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-10-09 20:10:10',
            'moduleName' => 'user',
            'modulePath' => 'member',
            'moduleCaption' => '用户中心',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'member/manage',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'member',
                            'controller' => 'manage',
                            'method' => 'index',
                            'caption' => '用户中心-首页',
                        ),
                    1 =>
                        array (
                            'folder' => 'member',
                            'controller' => 'manage',
                            'method' => 'login',
                            'caption' => '用户中心-登录',
                        ),
                    2 =>
                        array (
                            'folder' => 'member',
                            'controller' => 'manage',
                            'method' => 'logout',
                            'caption' => '用户中心-注销',
                        ),
                    3 =>
                        array (
                            'folder' => 'member',
                            'controller' => 'profile',
                            'method' => 'change_pwd',
                            'caption' => '用户中心-修改密码',
                        ),
                    4 =>
                        array (
                            'folder' => 'member',
                            'controller' => 'manage',
                            'method' => 'go',
                            'caption' => '管理中心-URL转向',
                        ),
                    5 =>
                    array (
                        'folder' => 'member',
                        'controller' => 'register',
                        'method' => 'index',
                        'caption' => '用户中心-注册',
                    ),
                ),
        ),
    'module' =>
        array (
            'version' => '1',
            'charset' => 'utf-8',
            'lastUpdate' => '2015-01-15 17:47:10',
            'moduleName' => 'project',
            'modulePath' => 'module',
            'moduleCaption' => '模块管理',
            'description' => '由autoCodeigniter 系统的模块',
            'fileList' => NULL,
            'works' => true,
            'moduleUrl' => 'module/project',
            'system' => true,
            'coder' => '胡子锅',
            'website' => 'http://',
            'moduleDetails' =>
                array (
                    0 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'install',
                            'method' => 'index',
                        ),
                    1 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'install',
                            'method' => 'check',
                        ),
                    2 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'install',
                            'method' => 'setup',
                        ),
                    3 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'index',
                            'caption' => '模块-列表',
                        ),
                    4 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'add',
                            'caption' => '模块-新增基本信息',
                        ),
                    5 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'edit',
                            'caption' => '模块-编辑基本信息',
                        ),
                    6 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'edit_field',
                            'caption' => '模块-编辑字段信息',
                        ),
                    7 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'edit_field_ext',
                            'caption' => '模块-编辑扩展信息',
                        ),
                    8 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'edit_trigger',
                            'caption' => '模块-编辑触发信息',
                        ),
                    9 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'edit_template',
                            'caption' => '模块-编辑模板信息',
                        ),
                    10 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'export',
                            'caption' => '模块-直接编译并安装',
                        ),
                    11 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'demo',
                            'method' => 'index',
                            'caption' => '模块-功能演示',
                        ),
                    12 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'sql',
                            'caption' => '模块-下载SQL',
                        ),
                    13 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'delete',
                            'caption' => '模块-删除',
                        ),
                    14 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'project',
                            'method' => 'download',
                            'caption' => '模块-下载',
                        ),
                    15 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'code',
                            'method' => 'download',
                            'caption' => '模块-下载',
                        ),
                    16 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'datasource',
                            'method' => 'index',
                            'caption' => '模块-数据源',
                        ),
                    17 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'datasource',
                            'method' => 'edit',
                            'caption' => '模块-数据源-编辑',
                        ),
                    18 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'datasource',
                            'method' => 'add_choose_type',
                            'caption' => '模块-数据源-选择',
                        ),
                    19 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'datasource',
                            'method' => 'add_by_type',
                            'caption' => '模块-数据源-添加',
                        ),
                    20 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'datasource',
                            'method' => 'delete',
                            'caption' => '模块-数据源-删除',
                        ),
                    21 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'demo',
                            'method' => 'readonly',
                            'caption' => '模块-演示只读',
                        ),
                    22 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'demo',
                            'method' => 'edit',
                            'caption' => '模块-演示编辑',
                        ),
                    23 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'demo',
                            'method' => 'delete',
                            'caption' => '模块-演示删除',
                        ),
                    24 =>
                        array (
                            'folder' => 'module',
                            'controller' => 'demo',
                            'method' => 'add',
                            'caption' => '模块-演示新增',
                        ),

                ),
        ),
);

/* End of file aci.php */
/* Location: ./application/config/aci.php */
