<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article extends Admin_Controller {

	var $method_config;
	var $menus;
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Article_page_model','Article_menu_model'));
		$this->load->helper(array('auto_codeIgniter','article'));
		$this->load->library('tree');
		$this->config->load('article');
		$this->method_config = $this->config->item('article');
		$this->menus = getcache("cache_article_menu_all");

		define('ATTACHEMENTS_URL',true);
	}

	function index($menu_type='list',$page_no=1)
	{
		$page_no = max(intval($page_no),1);
		$menu_id = intval($this->input->get("menu_id"));
		$menu_type =  $menu_type=="list"?"list":"page";
        
		$where =  $keyword= "";
		
		$where_arr[] = "menu_id in (".$this->Article_menu_model->sql_part_with($menu_type).")";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
			$keyword =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';

			if($keyword!="") $where_arr[] = "concat(keywords,description,title) like '%{$keyword}%'";
			if($menu_id>0)
			{
				$where_arr[] = "menu_id in (".$this->Article_menu_model->sql_part_with($menu_type,"(menu_id = {$menu_id} or menu_parent_id = {$menu_id}) ").")";
			}
        }

        if($where_arr)$where = implode(" and ",$where_arr);
		
		$orderby ="page_id desc";

        $data_list = $this->Article_page_model->listinfo($where,'*',$orderby , $page_no, $this->Article_page_model->page_size,'',$this->Article_page_model->page_size,page_list_url($this->page_data['folder_name'].'/article/news/',true));
		
		foreach($data_list as $k=>$v)
		{
			$datainfo = $this->Article_menu_model->get_one(array('menu_id'=>$v['menu_id']));
			$data_list[$k]['category'] = $datainfo?$datainfo['menu_name']:'-';
			
			if($datainfo)
			{
					$data_list[$k]['url'] = base_url(mt_base_module_url($datainfo['menu_type']).'/detail/'.$v['page_id'].".html");
			}
			
		}
		
		$this->view('index',array('menu_id'=>$menu_id,'menu_type'=>$menu_type,'pages'=>$this->Article_page_model->pages,'require_js'=>true,'data_list'=>$data_list,'keyword'=>$keyword,'select_categorys'=>$this->_get_category_option($menu_id,$menu_type)));
	}
	
	function delete()
	{
		if(isset($_POST))
		{
			$pidarr = isset($_POST['pid']) ? $_POST['pid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->Article_page_model->to_sqls($pidarr, '', 'page_id');
			$status = $this->Article_page_model->delete($where);
			if($status)
			{
				$this->showmessage('操作成功', HTTP_REFERER);
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
	}

	
	function _check_title($title='')
	{
		if(trim($title)=="")return false;
		if($this->Article_page_model->count(array('title'=>trim($title))))
		{
			if(trim($title)=="")return false;
		}
		
		return true;
	}
	
	function add($menu_type='list',$parent_id=0)
	{
		if(isset($_POST['template_id'])&& is_ajax()) {

			$template_id = intval($this->input->post('template_id'));
			$title = trim($this->input->post('title',true));
			$content = trim($this->input->post('content'));
			
			$keywords = trim($this->input->post('keywords',true));
			$desciption = trim($this->input->post('desciption',true));
			$author = trim($this->input->post('author',true));
			$thumb = trim($this->input->post('thumb',true));
			
			$source = trim($this->input->post('source',true));
			$more_url = trim($this->input->post('more_url',true));
			$menu_id = intval($this->input->post('menu_id',true));
		
			if($title=="")exit(json_encode(array('status'=>false,'tips'=>' 标题名称不能为空')));
			if(strlen($content)<10)exit(json_encode(array('status'=>false,'tips'=>' 页面内容不能少于10个字符')));
			if(!$this->_check_title($title))exit(json_encode(array('status'=>false,'tips'=>' 标题已经存在，请确定是否有重复内容')));
			$status = $this->Article_page_model->publish(
													array(
														'title'=>$title,
														'content'=>$content,
														'keywords'=>$keywords,
														'description'=>$desciption,
														'author'=>$author,
														'thumb'=>$thumb,
														'source'=>$source,
														'more_url'=>$more_url,
														'created'=>date("Y-m-d H:i:s"),
														'updated'=>date("Y-m-d H:i:s"),
														'user_id'=>$this->user_id,
														'menu_id'=>$menu_id,
														'template_id'=>$template_id
														));
			
			if($status)
				echo json_encode(array('status'=>true,'tips'=>"ok"));
			else
				echo json_encode(array('status'=>false,'tips'=>"false"));
				
		} else {
			$this->view('edit',array('menu_type'=>$menu_type,'require_js'=>true,'is_edit'=>false,'show_validator'=>true,'select_categorys'=>$this->_get_category_option(0,$menu_type),'data_info'=>$this->Article_page_model->default_info()));
		}
	}
	
	
	function edit($page_id=0)
	{
		$page_id = intval($page_id);
		$datainfo = $this->Article_page_model->get_one(array('page_id'=>$page_id));

		if(!$datainfo) $this->showmessage('信息不存在');
		
		if(isset($_POST['template_id'])&& is_ajax()) {

			$template_id = intval($this->input->post('template_id'));
			$title = trim($this->input->post('title',true));
			$content = trim($this->input->post('content'));
			
			$keywords = trim($this->input->post('keywords',true));
			$desciption = trim($this->input->post('desciption',true));
			$author = trim($this->input->post('author',true));
			$thumb = trim($this->input->post('thumb',true));
			
			$source = trim($this->input->post('source',true));
			$more_url = trim($this->input->post('more_url',true));
			$menu_id = intval($this->input->post('menu_id',true));
		
			if($title=="")exit(json_encode(array('status'=>false,'tips'=>' 标题名称不能为空')));
			if(strlen($content)<10)exit(json_encode(array('status'=>false,'tips'=>' 页面内容不能少于10个字符')));
			if($title!=trim($datainfo['title'])&&!$this->_check_title($title))exit(json_encode(array('status'=>false,'tips'=>' 标题已经存在，请确定是否有重复内容')));
			$status = $this->Article_page_model->rePublish(
													array(
														'title'=>$title,
														'content'=>$content,
														'keywords'=>$keywords,
														'description'=>$desciption,
														'author'=>$author,
														'thumb'=>$thumb,
														'source'=>$source,
														'more_url'=>$more_url,
														'created'=>date("Y-m-d H:i:s"),
														'updated'=>date("Y-m-d H:i:s"),
														'user_id'=>$this->user_id,
														'page_id'=>$page_id,
														'template_id'=>$template_id,
														'menu_id'=>$menu_id
														));
			
			if($status)
				echo json_encode(array('status'=>true,'tips'=>"ok"));
			else
				echo json_encode(array('status'=>false,'tips'=>"false"));
				
		} else {

			$menu_type = isset($this->menus[$datainfo['menu_id']])?$this->menus[$datainfo['menu_id']]['menu_type']:$this->showmessage('分类不存在');
			$this->view('edit',array('menu_type'=>$menu_type,'require_js'=>true,'is_edit'=>true,'data_info'=>$datainfo,'select_categorys'=>$this->_get_category_option($datainfo['menu_id'],$menu_type)));
		}
	}
	
	function readonly($page_id=0)
	{
		$page_id = intval($page_id);
		$datainfo = $this->Article_page_model->get_one(array('page_id'=>$page_id));
		if(!$datainfo) $this->showmessage('分类信息不存在');
		redirect(site_url("/page/content/".$page_id));
	}
	
	
	/**
     * 上传附件
     * @param string $fieldName 字段名
     * @param string $controlId HTML控件ID
     * @param string $callbackJSfunction 是否返回函数
     * @return void
     */
	function upload($fieldName='article',$controlId='',$callbackJSfunction=false)
	{
		$isImage=true;
		if( isset($this->method_config['upload'][$fieldName]))
		{
			$fn = isset($_GET['CKEditorFuncNum']) ? intval($_GET['CKEditorFuncNum']) : '0';

			if(isset($_POST['dosubmit'])||$fn)
			{
				$upload_path = $this->method_config['upload'][$fieldName]['upload_path'];


				if($upload_path=='')die('缺少上传参数');

				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = $this->method_config['upload'][$fieldName]['upload_file_type'];
				$config['max_size'] = $this->method_config['upload'][$fieldName]['upload_size'];
				$config['overwrite']  = FALSE;
				$config['encrypt_name']=false;
				$config['file_name']=date('Ymdhis').random_string('nozero',4);

				dir_create($upload_path);//创建正式文件夹
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('upload'))
				{
					if($fn==1) die("上传失败:".$this->upload->display_errors());
					else
						$this->showmessage("上传失败:".$this->upload->display_errors());
				}
				$filedata =  $this->upload->data();

				$file_name = $filedata['file_name'];
				$file_size = $filedata['file_size'];
				$image_width = $isImage?$filedata['image_width']:0;
				$image_height =  $isImage?$filedata['image_height']:0;
				$uc_first_id=  ucfirst($controlId);

				if($fn==1)
				{
					echo mkhtml($fn, $this->method_config['upload'][$fieldName]['upload_url']."/".$filedata['file_name'],'');
				}
				else
					$this->showmessage("上传成功！",'','','',$callbackJSfunction?"window.parent.get{$uc_first_id}(\"$file_name\",\"$file_size\",\"$image_width\",\"$image_height\");":"$(window.parent.document).find(\"#$controlId\").val(\"$file_name\");$(\"#dialog\" ).dialog(\"close\")");


			}else
			{
				$this->view('upload',array('field_name'=>$fieldName,'control_id'=>$controlId,'upload_url'=>$this->method_config['upload'][$fieldName]['upload_url'],'is_image'=>$isImage,'hidden_menu'=>true));
			}
		}else
		{
			die('缺少上传参数');
		}
	}
	
	
	function _get_category_option($parent_id=0,$menu_type)
	{
		$parent_id =  intval($parent_id);
		$tree=$this->tree;
		$where = 'menu_type = "'.$menu_type.'"';
		$result = $this->Article_menu_model->select($where,'`menu_url`,`menu_type`,`menu_name`,`menu_id` as id,`menu_parent_id` as parent_id','','sort_order ASC,menu_id DESC');
	
		$array = array();
		foreach($result as $r) {
			//if($is_list&&!$r['menu_type']=="list")continue;
			$r['cname'] = $r['menu_name'];
			$r['menu_id'] = $r['id'];
			$r['selected'] = $r['menu_id'] == $parent_id ? 'selected' : '';
			
			//查找parent_id
			if($r['parent_id']!=0)
			{
				$parent_info = $this->Article_menu_model->get_one($where." and menu_id =".$r['parent_id']);
				if(!$parent_info)$r['parent_id']=0;
			}
			
			$array[] = $r;
		}
		
		$str  = "<option value='\$id' \$selected>\$spacer \$cname</option>";
		$tree->init($array);
		$select_categorys = $tree->get_tree(0, $str);
		
		return $select_categorys;
	}

	function position()
	{
		$pid = trim($this->input->get("pid"));
		if($pid=="")die("参数不能为空");

		if(isset($_POST['position']))
		{
			$positionArr =$this->input->post("position");
			$position = is_array($positionArr)?implode(",",$positionArr):$positionArr;

			$pid = explode(",",$pid);

			$where = $this->Article_page_model->to_sqls($pid, '', 'page_id');
			$status = $this->Article_page_model->update(array('position_id'=>$position),$where);
			if($status)
			{
				$this->showmessage("操作成功！",'','','',"window.parent.setdone()");

			}else
			{
				$this->showmessage('操作失败');
			}

		}else
			$this->view('position',array('require_js'=>true,'hidden_menu'=>true,'show_validator'=>true,'pid'=>$pid));
	}

}