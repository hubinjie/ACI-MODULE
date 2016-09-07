<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('auto_codeIgniter','article'));
		$this->load->model(array('Article_page_model','Article_menu_model'));
		$this->menus = getcache("cache_article_menu_all");
	}
	
	function cat($catdir='',$page_no=1)
	{
		$catdir = safe_replace(htmlentities(strtolower($catdir)));
		$cat_info = $this->Article_menu_model->get_one(array('menu_url'=>$catdir));
		if(!$cat_info)
		{
			show_404();
		}

		$template_view = trim($cat_info['template']);
		
		$page_no = max(intval($page_no),1);
		$menu_id = intval($cat_info['menu_id']);
		$parent_menu_info = isset($this->menus[$cat_info['menu_parent_id']])?$this->menus[$cat_info['menu_parent_id']]:NULL;
		
		$where = "menu_id in (select menu_id from t_sys_article_menu where menu_id = {$menu_id} or menu_parent_id = {$menu_id})";
		$data_list = $this->Article_page_model->listinfo($where,'*','page_id desc' , $page_no,12,'',12,page_list_url('/st/'.$catdir,true));
		
		foreach($data_list as $k=>$v)
		{
			$data_list[$k]['url'] = base_url('page/content/'.$v['page_id']);
		}
		
		$this->page_data['title'] = $cat_info['menu_name']."_".SITE_NAME ;
		$this->page_data['keywords']  =$cat_info['menu_name']  ;
		$this->page_data['decriptions'] = $cat_info['menu_name'];
		$this->load->vars($this->page_data);
		
		$parent_id = $cat_info['menu_parent_id']==0?$cat_info['menu_id']:$cat_info['menu_parent_id'];
		$sub_menus = $this->Article_menu_model->select(array('menu_parent_id'=>$parent_id),'*','','sort_order ASC,menu_id ASC');
		
		$this->view($template_view,array('parent_menu_info'=>$parent_menu_info,'cat_info'=>$cat_info,'sub_menus'=>$sub_menus,'require_js'=>true,'data_list'=>$data_list,'pages'=>$this->Article_page_model->pages));
	}
	
	
	function content($page_id=0)
	{
		$page_id= intval($page_id);

		$datainfo = $this->Article_page_model->get_one(array('page_id'=>$page_id));
		if(!$datainfo)$this->showmessage('内容不存在');
		$this->Article_page_model->update(array('hits'=>'+=1'),array('page_id'=>$page_id));

		$cat_info = $this->Article_menu_model->get_one(array('menu_id'=>$datainfo['menu_id']));
		if(!$cat_info)
		{
			show_404();
		}

		if($cat_info['menu_type']!="list")
		{
			show_404();
		}

		$this->page_data['title'] = $datainfo['title']."_".WEBSITE_BASE_NAME ;
		$this->page_data['keywords']  =$datainfo['keywords']  ;
		$this->page_data['decriptions'] = $datainfo['description'];
		$this->load->vars($this->page_data);
		$parent_menu_info = $this->menus[$cat_info['menu_parent_id']];
		$data_list=  NULL;


		$prev_info = $this->Article_page_model->get_one(array('page_id <'=>$page_id,'menu_id'=>$datainfo['menu_id']),'page_id','page_id desc');
		$next_info = $this->Article_page_model->get_one(array('page_id >'=>$page_id,'menu_id'=>$datainfo['menu_id']),'page_id','page_id asc');

		if($prev_info) $prev_info['url'] = base_url("page/content/".$prev_info['page_id']);
		if($next_info) $next_info['url'] = base_url("page/content/".$next_info['page_id']);

		$tags = $this->Article_page_tag_model->select(array('page_id'=>$page_id));

		$where = "menu_id = ".$datainfo['menu_id'];
		$where_or = NULL;
		foreach($tags as $k=>$v)
		{
			$where_or[]= " keywords like '%".$v['tag']."%'";
		}
		if($where_or!=NULL)
		{
			$where .= " and (".implode("or",$where_or).")";
		}

		$data_list = $this->Article_page_model->select( $where,'*',"4", "created desc" );
		if($data_list)
			foreach($data_list as $k=>$v)
			{
				$data_list[$k]['url'] = base_url("list/detail/".$v['page_id'].".html");
			}

		$current_menu_info = $cat_info;
		$cat_info['menu_url'] = base_url('page/cat/'.$cat_info['menu_url']);

		$this->view($cat_info['template'].'_content',array('data_list'=>$data_list,'prev_info'=>$prev_info,'next_info'=>$next_info,'parent_menu_info'=>$parent_menu_info,'data_info'=>$datainfo,'cat_info'=>$cat_info,'data_list'=>$data_list,'current_menu_info'=>$current_menu_info));

	}

}