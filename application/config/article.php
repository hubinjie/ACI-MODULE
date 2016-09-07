<?php

$config['article']['menu_types'] = array(
                                        "list"=>array(
                                                "caption"=>'新闻动态',
                                                "template"=>
                                                    array(
                                                        array('template_list','基础模板'),
                                                    )
                                        ),
                                        "page"=>array(
                                            "caption"=>'单页',
                                            "template"=> array(
                                                array('template_list','基础模板'),
                                            )
                                        ),
                       );


$config['article']['upload'] = array(
    'article'=>array('upload_size'=>1024,'upload_file_type'=>'jpg|png|gif','upload_path'=>UPLOAD_PATH.'article','upload_url'=>UPLOAD_URL.'article'),
);

$config['article']['page_template'][1] = array('caption'=>'==基础模板==','value'=>'1');

$config['article']['position'][1] = array('caption'=>'默认位置');