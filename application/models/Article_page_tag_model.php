<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_page_tag_model extends Base_Model {
	public function __construct() {
		$this->table_name = 'article_page_tag';
		parent::__construct();
	}
	
	public function add($page_id,$keywords)
	{
		$split=',';
		$keywords = str_replace("，",",",$keywords);
		$this->delete(array('page_id'=>$page_id));
		
		$split = true;
		$keywords = isset($split) ? array_unique(array_filter(explode($split, $keywords))) : array($keywords);
		
		
		foreach($keywords as $tag)
		{
        	$tag = trim($tag);
			$tag = addslashes($tag);
			$this->insert(array("tag"=>$tag,"page_id"=>$page_id));
			
		}
	}
	
	
	
}
