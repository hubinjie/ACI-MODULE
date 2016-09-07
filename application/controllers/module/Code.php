<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
define('NOT_CONVERT', true);
$split_js_code_array = NULL;

class Code extends Member_Controller
{

    var $init_row_size = 11;

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template_cache', 'zip'));
        $this->load->helper(array('module', 'array', 'string'));
        $this->load->model(array('Module_model', 'Module_field_model', 'Module_trigger_model'));
    }

    function _get_config($id)
    {
        $code_config = getcache('module_project_' . $this->user_id . '_' . $id);
        $this->load->config('module');
        $module_settings = $this->config->item('module');

        $view_list_fields_data = NULL;
        for ($i = 0; $i < $this->init_row_size; $i++) {
            foreach ($code_config['view_list_fields'] as $k => $v) {
                if ($v['field_options'])
                    $view_list_fields_data[$i][$v['field_name']] = random_element($v['field_options']);
                else
                    $view_list_fields_data[$i][$v['field_name']] = isset($module_settings['field_init_data'][$v['field_type']][$i]) ? $module_settings['field_init_data'][$v['field_type']][$i] : 'N/A';

            }
        }

        $code_config['controller_path'] = strtolower(trim($code_config['controller_path'], '/'));
        $code_config['controller_name'] = strtolower($code_config['controller_name']);
        $code_config['view_list_fields_data'] = $view_list_fields_data;

        return $code_config;
    }

    //第一步先生成MODEL
    function _model($config, $return_code = true)
    {
        //创建表SQL
        $mysql_create_sql = $config['mysql_create_sql'];


        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'model';
        $html = $this->load->view($view_file, $config, true);

        $php_tags = "<?php \r\n";
        $php_tags .= $html;
        $php_tags .= "\r\n?>";

        if ($return_code) return $php_tags;

        if (write_file(APPPATH . 'models/' . ucfirst($config['controller_name'] . '_model.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }
    }

    function _controller($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'controller';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = "<?php \r\n";
        $php_tags .= $html;
        $php_tags .= "\r\n?>";

        if ($return_code) return $php_tags;

        if (write_file(strtolower(APPPATH . 'controllers/' . $config['controller_path'] . '/' . ucfirst(strtolower($config['controller_name'])) . '.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }

    }

    function _view($config, $return_code = true)
    {
        $method_func = trim($config['method_func']);
        $method_func_arr = explode(",", $method_func);

        foreach ($method_func_arr as $k => $v) {

            if (!method_exists($this, '_view_' . $v)) {

            } else

                call_user_func_array(array($this, '_view_' . $v), array($config, $return_code));
        }


    }

    /*function _view_add($config,$return_code = true)
    {
        $view_file= $this->page_data['folder_name'].DIRECTORY_SEPARATOR.$this->page_data['controller_name'].DIRECTORY_SEPARATOR.'view_add';
        $html = $this->load->view($view_file,$config,true);
        $php_tags = $this->template_cache->template_parse($html);

        if($return_code)return $php_tags;
        if(write_file(strtolower(APPPATH.'views/'.$config['controller_path'].'/'.$config['controller_name'].'/edit.php'), $php_tags))
        {
            return true;
        }
        else
        {
             return false;
        }
    }*/


    function _view_edit($config, $return_code = true)
    {

        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'view_edit';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html);

        define('_VIEW_EDIT', true);

        if ($return_code) return $php_tags;
        if (write_file(strtolower(APPPATH . 'views/' . $config['controller_path'] . '/' . $config['controller_name'] . '/edit.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }
    }

    function _view_readonly($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'view_readonly';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html);

        if ($return_code) return $php_tags;

        if (write_file(strtolower(APPPATH . 'views/' . $config['controller_path'] . '/' . $config['controller_name'] . '/readonly.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }
    }

    function _view_lists($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'view_lists';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html);

        if ($return_code) return $php_tags;

        if (write_file(strtolower(APPPATH . 'views/' . $config['controller_path'] . '/' . $config['controller_name'] . '/lists.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }

        //$status = $this->template_cache->template_parse($view_file,APPPATH.'views/test/'.strtolower($config['controller_name']).'/index.php');
    }

    function _view_choose($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'view_chooses';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html);

        if ($return_code) return $php_tags;
        if (write_file(strtolower(APPPATH . 'views/' . $config['controller_path'] . '/' . $config['controller_name'] . '/choose.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }
    }

    function _view_upload($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'view_upload';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html);

        if ($return_code) return $php_tags;

        if (write_file(strtolower(APPPATH . 'views/' . $config['controller_path'] . '/' . $config['controller_name'] . '/upload.php'), $php_tags)) {
            return true;
        } else {
            return false;
        }
    }

    function _js_edit($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'js_edit';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html, false);
        if ($return_code) return $php_tags;;

        if (write_file(strtolower(FCPATH . $config['js_path'] . $config['controller_name'] . '/edit.js'), $php_tags)) {
            return true;
        } else {
            return false;
        }

    }

    function _js_lists($config, $return_code = true)
    {
        $view_file = $this->page_data['folder_name'] . DIRECTORY_SEPARATOR . $this->page_data['controller_name'] . DIRECTORY_SEPARATOR . 'js_lists';
        $html = $this->load->view($view_file, $config, true);
        $php_tags = $this->template_cache->template_parse($html, false);

        if ($return_code) return $php_tags;

        if (write_file(strtolower(FCPATH . $config['js_path'] . $config['controller_name'] . '/lists.js'), $php_tags)) {
            return true;
        } else {
            return false;
        }
    }

    function _js($config, $return_code = true)
    {
        $this->_js_edit($config, $return_code);
        $this->_js_lists($config, $return_code);
    }

    /*
    function export($id = 0)
    {

        $id = intval($id);
        $data_info = $this->_get_config($id);
        if (!$data_info || count($data_info) == 0) $this->showmessage('模块信息不存在');
        $this->_controller($data_info, false);
        $this->_model($data_info, false);
        $this->_view($data_info, false);
        $this->_js($data_info, false);


        if ($data_info['view_upload_fields']) {
            $this->_view_upload($data_info, false);
        }

        if ($data_info['model_function'] || true) {
            $this->_view_choose($data_info, false);
        }

        $this->showmessage('跳转访问模块', base_url($data_info['controller_path'] . '/' . strtolower($data_info['controller_name'])), 1);
    }*/

    function _install_config($config, $id)
    {
        $uploadPathArr = NULL;
        if ($config['view_upload_fields']) {
            foreach ($config['view_upload_fields'] as $k => $v) {
                $uploadPathArr[] = $v['upload_path'];
            }
        }

        $NO = $id + 1000;

        $arr = array(
            'version' => $config['version'],
            'charset' => $config['charset'],
            'lastUpdate' => $config['modified'],
            'works' => true,
            'moduleName' => $config['controller_name'],
            'modulePath' => trim(strtolower($config['controller_path']), '/'),
            'moduleCaption' => $config['controller_caption'],
            'moduleUrl' => reduce_double_slashes($config['controller_path'] . "/" . strtolower($config['controller_name']), "/"),
            'description' => '由autoCodeigniter 自动生成的模块',
            'environment' => array('uploadPath' => $uploadPathArr,//模块所需功能的上传路径
                'environmentComponent' => '',//需要的支持组件功能环境
            ),
            'serialNumber' => 123,//序列号
            'system' => false,
            'coder' => '胡子锅',
            'website' => 'http://',
            'menu' => array(
                array(
                    'menu_name' => '管理' . $config['controller_caption'],
                    'parent_id' => 4,
                    'list_order' => 0,
                    'is_display' => 1,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'index',
                    'is_side_menu' => true,
                    'css_icon'=>$config['css_icon'],
                    'flag_id' => sprintf("%09da", $NO)),
                array(
                    'menu_name' => $config['controller_caption'] . '列表',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 1,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'index',
                    'is_side_menu' => true,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09db", $NO)),
                array(
                    'menu_name' => '新增',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 1,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'add',
                    'is_side_menu' => true,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09dc", $NO)),
                array(
                    'menu_name' => '修改',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 0,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'edit',
                    'is_side_menu' => false,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09dd", $NO)),
                array(
                    'menu_name' => '选择弹窗',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 0,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'choose',
                    'is_side_menu' => false,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09de", $NO)),
                array(
                    'menu_name' => '删除单个',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 0,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'delete_one',
                    'is_side_menu' => false,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09df", $NO)),
                array(
                    'menu_name' => '删除多个',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 0,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'delete_all',
                    'is_side_menu' => false,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09dg", $NO)),
                array(
                    'menu_name' => '查看',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 0,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'readonly',
                    'is_side_menu' => false,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09dh", $NO)),
                array(
                    'menu_name' => '上传',
                    'parent_id' => 1,
                    'list_order' => 0,
                    'is_display' => 0,
                    'controller' => strtolower($config['controller_name']),
                    'folder' => trim(strtolower($config['controller_path']), '/'),
                    'method' => 'upload',
                    'is_side_menu' => false,
                    'css_icon'=>'',
                    'flag_id' => sprintf("%09di", $NO)),
            ),
            'installSQL' => $config['mysql_create_sql'],//安装语句
            'upgradeSQL' => '',//更新语句,
            'fileList' => ''
        );
        $word_i = 65 + 9;
        if (isset($config['model_function'])) foreach ($config['model_function'] as $k => $v):
            $fields_arr = explode(",", $v['fields']);

            if (dropdownlist_datasource_type($v['datasource_typeid'])) continue;
            $s_format = "%09d" . chr($word_i + 1);
            $arr['menu'][] = array(
                'menu_name' => $v['datasource_name'] ,
                'parent_id' => 1,
                'list_order' => 0,
                'is_display' => 0,
                'controller' => strtolower($config['controller_name']),
                'folder' => trim(strtolower($config['controller_path']), '/'),
                'method' => $v['function_name']."_window",
                'is_side_menu' => false,
                'css_icon'=>'',
                'flag_id' => sprintf($s_format, $NO));
            $word_i++;
        endforeach;

        return $arr;
    }

    //下载
    function download($id = 0)
    {
        $id = intval($id);
        $data_info = $this->_get_config($id);
        if ($data_info['javascript_file'] == 2) {
            define("ONLY_GET_JS_PART_STRING", true);
        }
        if (!$data_info || count($data_info) == 0) $this->showmessage('模块信息不存在');
        $_code_controller = $this->_controller($data_info, true);

        $_code_model = $this->_model($data_info, true);

        $data_info['controller_name'] = strtolower($data_info['controller_name']);
        if ($data_info['controller_path'] != "") $data_info['controller_path'] .= "/";
        $_controller_path = 'application/controllers/' . $data_info['controller_path'];
        $_model_path = 'application/models/';
        $_view_path = 'application/views/' . $data_info['controller_path'] . ucfirst($data_info['controller_name']) . "/";
        $_js_path = strtolower(trim($data_info['js_path'], "/") . "/" . ucfirst($data_info['controller_name']) . "/");

        $file_ext = ".php";

        //////////////////////////// view /////////////////////////////////////////////
        $method_func = trim($data_info['method_func']);
        $method_func_arr = explode(",", $method_func);
        foreach ($method_func_arr as $k => $v) {
            if ($v == 'upload') {
                if (!$data_info['view_upload_fields']) continue;

            }
            if (method_exists($this, '_view_' . $v)) {
                $_code_view = call_user_func_array(array($this, '_view_' . $v), array($data_info, true)); //视图代码

                $arr[strtolower($_view_path . ucfirst($v) . $file_ext)] = $_code_view;
            }


            //如果是JS分离
            if ($data_info['javascript_file'] > 1):

                if (method_exists($this, '_js_' . $v)) {
                    $_code_js = call_user_func_array(array($this, '_js_' . $v), array($data_info, true)); //视图代码
                    $arr[strtolower($_js_path . strtolower($v) . ".js")] = $_code_js;
                }
            endif;
        }

        if ($data_info['model_function'] || true) {
            $arr[strtolower($_view_path . 'choose' . $file_ext)] = $this->_view_choose($data_info, true);
        }


        if ($data_info['view_upload_fields']):
            $_code_view = $this->_view_upload($data_info, true);//上传视图代码
            $arr[strtolower($_view_path . 'upload' . $file_ext)] = $_code_view;
        endif;
        $arr[trim($_controller_path . ucfirst($data_info['controller_name']) . $file_ext)] = $_code_controller;//控制器路径
        $arr[trim($_model_path . ucfirst($data_info['controller_name'] . "_model") . $file_ext)] = $_code_model;//MODEL

        $_aci_config = $this->_install_config($data_info, $id);

        $_aci_config['fileList'] = array_keys($arr);
        $arr[trim('aci' . $file_ext)] = array2string($_aci_config);




        $this->zip->add_data($arr);
        $this->zip->download('autoCodeigniter' . trim($data_info['controller_caption']) . '安装包.zip');
    }


}