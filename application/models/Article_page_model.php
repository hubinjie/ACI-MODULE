<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_page_model extends Base_Model {
	
	var $page_size = 10;
	public function __construct() {
		$this->table_name = 'article_page';
		parent::__construct();
		$this->load->model('Article_page_tag_model');
		$this->load->helper('article');
	}
	
	public function publish($arr)
	{
		$new_id = $this->insert($arr);
		
		//新增tag
		if($new_id && trim($arr['keywords'])!="")
		{
			$this->Article_page_tag_model->add($new_id,$arr['keywords']);
		}
		
		return $new_id;
	}
	
	public function rePublish($arr)
	{
		$id = $arr['page_id'];
		$user_id = $arr['user_id'];
		unset($arr['page_id']);
		unset($arr['user_id']);
		$status = $this->update($arr,array('page_id'=>$id));
		
		//新增tag
		if($status && trim($arr['keywords'])!="")
		{
			$this->Article_page_tag_model->add($id,$arr['keywords']);
		}
		
		return $status;
	}
	
	function default_info()
	{
		return array(
					  'page_id'=>0,
					  'title'=>'',
					  'content'=>'',
					  'keywords'=>'',
					  'description'=>'',
					  'author'=>'',
					  'thumb'=>'',
					  'source'=>'',
					  'template_id'=>'',
					  'created'=>date("Y-m-d H:i:s"),
					  'updated'=>date("Y-m-d H:i:s")
					  );
	}
}
