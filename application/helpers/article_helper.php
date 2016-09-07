<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('mt_base_module_url'))
	{
		function mt_base_module_url($v){
			if($v=="page")
			{
				return "page";
			}
			
			if($v=="list")
			{
				return "list";
			}
			
			if($v=="product")
			{
				return "product";
			}
			
			return "st";
		}
	}
	
	if(!function_exists('template_list_options'))
	{
		function template_list_options($defaultValue=''){

			$CI = & get_instance();
			$CI->config->load('article');
			$articleConfig = $CI->config->item('article');
			$options = $articleConfig['page_template'];

			$_html="";
			foreach($options as $k=>$v)
			{
				if($defaultValue == $v['value'])
					$_html .="<option value=\"{$v['value']}\" selected=\"selected\">{$v['caption']}</option>";
				else
					$_html .="<option value=\"{$v['value']}\" >{$v['caption']}</option>";
			}
			
			return $_html;
		}
	}
	
	if(!function_exists('position_options'))
	{
		function position_options($defaultValue=''){

			$CI = & get_instance();
			$CI->config->load('article');
			$articleConfig = $CI->config->item('article');
			$options = $articleConfig['position'];

			
			$_html="";
			foreach($options as $k=>$v)
			{
				if($defaultValue == $k)
					$_html .="<div class=\"checkbox\"><label><input type=\"checkbox\" name='position[]' checked=\"checked\" value=\"{$k}\">{$v['caption']}</label></div>";
				else
					$_html .="<div class=\"checkbox\"><label><input type=\"checkbox\" name='position[]' value=\"{$k}\" >{$v['caption']}</label></div>";
			}
			$_html .="<div class=\"checkbox\"><label><input type=\"checkbox\" name='position' value=\"0\" >不推荐任何位置</label></div>";

			
			return $_html;
		}
	}
	
	if(!function_exists('position_labes'))
	{
		function position_labes($pos=''){
			
			
			$posArr = explode(",",$pos);
			$CI = & get_instance();
			$CI->config->load('article');
			$articleConfig = $CI->config->item('article');
			$options = $articleConfig['position'];

			$_html="";
			foreach($posArr as $k=>$v)
			{
				if(isset($options[$v]))
					$_html .="<label class=\"label label-default\">{$options[$v]['caption']}</label> ";
			}

			
			return $_html;
		}
	}
	
	
	
	
	if(!function_exists('show_article_image'))
	{
		function show_article_image($img)
		{
			return  show_photo(UPLOAD_URL.'article/'.$img);
		}
	}
	
	if(!function_exists('show_'))
	{
		function type_id($defaultValue=''){
		}
	}
	
	if(!function_exists('template_name'))
	{
		function template_name($template_id=1){
			$options[1] ='help_category';
			$options[2] ='news_category';
			$options[3] ='news_category';
			$options[4] ='page_category';
			$options[5] ='content';
			
			return isset($options[$template_id])?$options[$template_id]:"category";
		}
	}
	
	if(!function_exists('download_images_from_html'))
	{
		function download_images_from_html($content){
			
			$regex ='/<img(.*?)data-type="(jpeg|png|gif|jpg)"/i';
			
			if (preg_match_all($regex, $content,$match)){
				
				if(is_array($match[2]))
				{
					$regex ='/<img(.*?)data-src="(.*?)(?=")"/i';
					if (preg_match_all($regex, $content,$match2)){
						
						if(is_array($match2[2]))
						{
							foreach($match2[2] as $k=>$v)
							{
								$match[2][$k] = isset($match[2][$k])?$match[2][$k]:"jpg";
								$local_img = save_wximg_by_url($v,$match[2][$k]);
								$local_img = str_replace("\\","/",$local_img);
								
								$content = str_replace($v,$local_img,$content);
								$content = str_replace("data-src","src",$content);
							}
						}
					}
				} 
			}
			
			return $content;
				
		}
	}
	
	//只下载微信
	if(!function_exists('save_wximg_by_url'))
	{
		function save_wximg_by_url($url,$suffix,$savePath='',$overWrite = true)
		{
		
			$pos = strpos($url,"http://mmbiz.qpic.cn");
			
			if($pos==0)
			{
				if(trim($savePath)=="")$savePath = UPLOAD_TEMP_PATH.date('Y/md').'/';
				dir_create($savePath);
				
				$imgSavePath = $savePath.random_string('alnum', 6).date("Hi").".".$suffix;
				
				
				if (is_file($imgSavePath)&&$overWrite) {
					 unlink($imgSavePath);
				}else
				{
					
					
					// 1. 初始化  
					$ch = curl_init();  
					// 2. 设置选项，包括URL  
					curl_setopt($ch, CURLOPT_URL, $url);  
					curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
					curl_setopt($ch, CURLOPT_HEADER, 0);  
					// 3. 执行并获取HTML文档内容  
					$data = curl_exec($ch);  
					// 4. 释放curl句柄  
					curl_close($ch);  
		
					 if(! write_file($imgSavePath, $data))
					 {
						 return NULL;
					 }
					
				}
				return str_replace(UPLOAD_TEMP_PATH,UPLOAD_TEMP_URL,$imgSavePath);
			}else
			{
				return $url;
			}
		}
	}
	
	
	
