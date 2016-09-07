<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArticleMenu extends Admin_Controller {

	var $method_config,$categorys;	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Article_page_model','Article_menu_model'));
		$this->load->helper(array('auto_codeIgniter'));
		$this->load->library('tree');
		$this->config->load('article');
		$this->method_config = $this->config->item('article');
	}
	
	function load_template($menu_type='')
	{
		echo json_encode($this->method_config['menu_types'][$menu_type]["template"]);
	}
	
	function index()
	{
		$tree=$this->tree;
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		
		$result = $this->Article_menu_model->select('','`menu_url`,`menu_type`,`menu_name`,`menu_id` as id,`menu_parent_id` as parent_id','','sort_order ASC,menu_id ASC');
		$array = array();

		foreach($result as $r) {
			$r['menu_name'] = $r['menu_name'];
			$r['menu_id'] = $r['id'];
			if($r['parent_id']==0)
			{
				$r['str_manage'] =aci_ui_a($this->page_data['folder_name'],'articleMenu','add',$r['id'],' class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-plus"></span> 新增子分类',true);
				$r['str_manage'] .= " ". aci_ui_a($this->page_data['folder_name'],'articleMenu','edit',$r['id'],' class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-wrench"></span> 修改',true);
			}else{
				
				$r['str_manage'] =  aci_ui_a($this->page_data['folder_name'],'articleMenu','edit',$r['id'],' class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-wrench"></span> 修改',true);
			}
			
			$r['str_manage'] .= " ". aci_ui_a($this->page_data['folder_name'],'articleMenu','set_sort',"up/".$r['id'],' title="上移" class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-arrow-up"></span> ',true);
			$r['str_manage'] .= " ". aci_ui_a($this->page_data['folder_name'],'articleMenu','set_sort',"down/".$r['id'],' title="下移" class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-arrow-down"></span> ',true);
			
			if($r['parent_id']>0)
			{
				if($r['menu_type']=='list') {
					$r['str_manage'] .= " " . aci_ui_a($this->page_data['folder_name'], 'article', 'index/list', "?menu_id=" . $r['id'] . "&keyword=&dosubmit=搜索", ' title="下移" class="btn btn-default btn-xs"', '<span class="glyphicon glyphicon-list"></span> 管理动态新闻', true);
				}else
				{
					$page_info = $this->Article_page_model->get_one(array('menu_id'=>$r['id']));

					if($page_info)
						$r['str_manage'] .= " ". aci_ui_a($this->page_data['folder_name'],'article','edit',$page_info['page_id'],' title="下移" class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-pencil"></span> 管理单页',true);
					else
					{
						$r['str_manage'] .= " ". aci_ui_a($this->page_data['folder_name'],'article','add',"?menu_id=".$r['id']."&keyword=&dosubmit=搜索",' title="下移" class="btn btn-default btn-xs"','<span class="glyphicon glyphicon-pencil"></span> 管理单页',true);
					}
				}
				
			}
			$array[] = $r;
		}
	
		$str  = "<tr>
					<td><input type='checkbox' name='pid[]' value='\$menu_id' /></td>
					<td>\$spacer\$menu_name</td>
					<td>\$menu_type</td>
					<td>\$menu_url</td>
					<td>\$str_manage</td>
				</tr>";
				
		$tree->init($array);
		$table_html = $tree->get_tree(0, $str);
		
		$this->view('index',array('require_js'=>true,'table_html'=>$table_html));
	}
	
	
	function delete()
	{
		if(isset($_POST))
		{
			$pidarr = isset($_POST['pid']) ? $_POST['pid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->Article_menu_model->to_sqls($pidarr, '', 'menu_id');
			$status = $this->Article_menu_model->delete($where);
			if($status)
			{
				$this->showmessage('操作成功', HTTP_REFERER);
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
	}
	
	function edit($menu_id=0)
	{
		$datainfo = $this->Article_menu_model->get_one(array('menu_id'=>$menu_id));
		if(!$datainfo) $this->showmessage('分类信息不存在');
		
		if(isset($_POST['parent_id'])&& is_ajax()) {

			$parent_id = intval($this->input->post('parent_id'));
			$menu_name = trim($this->input->post('menu_name',true));
			$menu_url = strtolower(trim($this->input->post('menu_url',true)));
			$menu_type = trim($this->input->post('menu_type',true));
			$template = trim($this->input->post('template'));
			$menu_desc = trim($this->input->post('menu_desc'));
	
			if($menu_name=="")exit(json_encode(array('status'=>false,'tips'=>' 分类名称不能为空')));
			if($menu_url=="")exit(json_encode(array('status'=>false,'tips'=>' 目录英文名称不能为空')));
			if($menu_url!=$datainfo['menu_url']&&$this->Article_menu_model->count(array('menu_url'=>$menu_url)))exit(json_encode(array('status'=>false,'tips'=>' 目录英文名称已经存在，请更换一个')));

			
			$status = $this->Article_menu_model->update(
													array(
														'menu_type'=>$menu_type,
														'menu_name'=>$menu_name,
														'menu_url'=>$menu_url,
														'modified'=>date("Y-m-d H:i:s"),
														'sort_order'=>0,
														'menu_parent_id'=>$parent_id,
														'template'=>$template,
														'menu_desc'=>$menu_desc,
														),array('menu_id'=>$menu_id));
			
			if($status)
				echo json_encode(array('status'=>true,'tips'=>"ok"));
			else
				echo json_encode(array('status'=>false,'tips'=>"false"));
				
		} else {
			$show_validator = $array = $r = '';
			$this->view('edit',array('menu_types'=>$this->method_config['menu_types'],'require_js'=>true,'is_edit'=>true,'select_categorys'=>$this->_get_category_option($datainfo['menu_parent_id']),'data_info'=>$datainfo));
		}
	}

	
	function add($parent_id=0)
	{
		if(isset($_POST['parent_id'])&& is_ajax()) {

			$parent_id = intval($this->input->post('parent_id'));
			$menu_name = trim($this->input->post('menu_name',true));
			$menu_url = strtolower(trim($this->input->post('menu_url',true)));
			$menu_type = trim($this->input->post('menu_type',true));
			$template = trim($this->input->post('template'));
			$menu_desc = trim($this->input->post('menu_desc'));
	
			if($menu_name=="")exit(json_encode(array('status'=>false,'tips'=>' 分类名称不能为空')));
			if($menu_url=="")exit(json_encode(array('status'=>false,'tips'=>' 目录英文名称不能为空')));
			
			if($this->Article_menu_model->count(array('menu_url'=>$menu_url)))exit(json_encode(array('status'=>false,'tips'=>' 目录英文名称已经存在，请更换一个')));
			
			$status = $this->Article_menu_model->insert(
													array(
														'menu_type'=>$menu_type,
														'menu_name'=>$menu_name,
														'menu_url'=>$menu_url,
														'modified'=>date("Y-m-d H:i:s"),
														'sort_order'=>9999,
														'menu_parent_id'=>$parent_id,
														'template'=>$template,
														'menu_desc'=>$menu_desc,
														));
			
			if($status)
				echo json_encode(array('status'=>true,'tips'=>"ok"));
			else
				echo json_encode(array('status'=>false,'tips'=>"false"));
				
		} else {
			$show_validator = '';
			
			$data_info = $this->Article_menu_model->default_info();
			
			$this->view('edit',array('menu_types'=>$this->method_config['menu_types'],'require_js'=>true,'select_categorys'=>$this->_get_category_option($parent_id),'show_validator'=>true,'is_edit'=>false,'data_info'=>$data_info));
		}
	}
	
	function _get_category_option($parent_id=0,$is_list=false)
	{
		$parent_id =  intval($parent_id);
		$tree=$this->tree;
		$result = $this->Article_menu_model->select('','`menu_url`,`menu_type`,`menu_name`,`menu_id` as id,`menu_parent_id` as parent_id','','sort_order ASC,menu_id ASC');
		$array = array();
		foreach($result as $r) {
			//if($is_list&&!$r['menu_type']=="list")continue;
			$r['cname'] = $r['menu_name'];
			$r['menu_id'] = $r['id'];
			$r['selected'] = $r['menu_id'] == $parent_id ? 'selected' : '';
			$array[] = $r;
		}
		$str  = "<option value='\$id' \$selected>\$spacer \$cname</option>";
		$tree->init($array);
		$select_categorys = $tree->get_tree(0, $str);
		
		return $select_categorys;
	}
	
	function set_sort($dir,$menu_id=0)
	{
		$menu_id = intval($menu_id);
		$dir = trim(strtolower($dir))=="up"?"up":"down";
		
		$menu_info = $this->Article_menu_model->get_one(array('menu_id'=>$menu_id));
		if(!$menu_info)$this->showmessage('菜单不存在');
		
		$result = $this->Article_menu_model->select(array('menu_parent_id'=>$menu_info['menu_parent_id']),'`menu_url`,`menu_type`,`menu_name`,`menu_id` as id,`menu_parent_id` as parent_id','','sort_order ASC,menu_id ASC');
		
		$num = $index = 0;
		if($result)
		foreach($result as $k=>$v)
		{
			++$index;
			$num = $index*10;
			
			if($menu_id==$v['id'])
			{
				if($dir=="up")
				{
					$num = ($index-1)*10-5;
				}else
				{
					$num = ($index+1)*10+5;
				}
				
			}
			//echo $dir.":num:".$num."-id:".$v['id']."-index:".$index."<br/>";
			$this->Article_menu_model->update(array('sort_order'=>$num),array('menu_id'=>$v['id']));
		}
		
		redirect(base_url($this->page_data['folder_name'].'/'.$this->page_data['controller_name'].'/index'));
		
	}
	
	/**
	 * 更新缓存
	 */
	private function cache($parent_id=0,$menu_type ='list') {
		$tree=$this->tree;
		$where = 'menu_type = "'.$menu_type.'"';
		$result = $this->Article_menu_model->select($where,'`menu_desc`,`menu_url`,`menu_type`,`menu_name`,`menu_id`,`menu_parent_id` as parent_id','','sort_order ASC,menu_id ASC','','menu_id');
	
		if($result)
		{
			foreach($result as $k=>$v)
			{
				$result[$k]['menu_url'] = strtolower(base_url(mt_base_module_url($v['menu_type']).'/'.$v['menu_url']));
			}
		}
		
		$tree->init($result);
		$categorys = $tree->get_array(0);
		setcache('cache_category_'.$menu_type, $categorys);

		return true;
	}
	/**
	 * 更新缓存并修复栏目
	 */
	public function public_cache() {
		
		$result = $this->Article_menu_model->select('','`menu_desc`,`menu_url`,`menu_type`,`menu_name`,`menu_id`,`menu_parent_id` as parent_id','','sort_order ASC,menu_id ASC','','menu_id');
	
		if($result)
		{
			foreach($result as $k=>$v)
			{
				$result[$k]['menu_url'] = strtolower( base_url(mt_base_module_url($v['menu_type']).'/'.$v['menu_url']));
			}
		}
		setcache('cache_article_menu_all', $result);
		
		$this->cache(0,'list');
		$this->cache(0,'page');
		
		$this->showmessage('操作成功');
	}
	
	
	
}