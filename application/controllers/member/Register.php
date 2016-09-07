<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends Front_Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

        if(isset($_POST)&& is_ajax()) {

            $inputUserName = trim($this->input->post("inputUserName",true));
            $inputPassword = trim($this->input->post("inputPassword",true));
            $confirmPassword = trim($this->input->post("confirmPassword",true));

            $inputAgree = intval($this->input->post("inputAgree",true));

            $inputUserName = safe_replace($inputUserName);

            if(strlen($inputUserName)<5||strlen($inputUserName)>20)exit(json_encode(array('status'=>false,'tips'=>' 用户名长度请控制为为5到20个字符之间')));
            if(strlen($inputPassword)<6||strlen($inputPassword)>20)exit(json_encode(array('status'=>false,'tips'=>' 密码长度请控制为6到20个字符之间')));

            if($confirmPassword!=$inputPassword)exit(json_encode(array('status'=>false,'tips'=>' 两次密码输入不一样')));
            if($inputUserName==$inputPassword)exit(json_encode(array('status'=>false,'tips'=>' 密码不能和用户名一样')));

            if($inputAgree==0)exit(json_encode(array('status'=>false,'tips'=>' 需要先接受协议才能进行注册')));

            $c = $this->Member_model->check_username_exists($inputUserName);
            if($c>0) exit(json_encode(array('status'=>false,'tips'=>' 你的用户名已经存在请更换其他用户名1')));

            $status = $this->Member_model->quick_register($inputUserName,$inputPassword,random_string('alnum',5));
           
            if(!$status)exit(json_encode(array('status'=>false,'tips'=>' 用户名已经存在请更换其他用户名2')));
            else
            {
                exit(json_encode(array('status'=>true,'tips'=>' 注册成功','next_url'=>site_url('member/login'))));
            }
        }else
        {

            $this->page_data['title'] = "注册成为ACI用户 - 开源PHP在线代码模块生成器，PHP万能代码生成器" ;
            $this->page_data['keywords']  = "注册 ACI PHP 开源模块 生成器"  ;
            $this->page_data['decriptions'] = "注册成为ACI用户"  ;
            $this->load->vars($this->page_data);
            $this->tpl('member','register',array('require_js'=>true));
        }
    }
}