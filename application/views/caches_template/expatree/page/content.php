<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php include template('public','header_view'); ?>
<div class="bs-docs-header" id="content">
    <div class="container text-left">
        <h1>微信公众号内容采集</h1>
        <p>只需要输入选中微信公众号即可一次性保存所有文章内容及图片到本地。</p>
    </div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-3">
    	<div class="mt-panel">
        <div class="panel panel-default">
          <div class="panel-heading"><?php echo $cat_info['menu_name']?></div>
          <div class="panel-body">
           <?php if($data_list)foreach($data_list as $k=>$v):?>
            <a href="<?php echo $v['url']?>"><?php echo $v['title']?></a><br/>
           <?php endforeach;?>
          </div>
        </div>
        </div>
    	
    </div>
    <div class="col-md-9">
    
        <div class="rich_media_inner ">
          <h2 class="rich_media_title"><?php echo $data_info['title']?></h2>
            <hr/>
            <article class="rich_media_meta_list">
                <p ><div class="pull-right">发布时间：<span class="glyphicon glyphicon-time"></span> <?php echo $data_info['created']?> </div></p><br/>
                <?php echo $data_info['content']?>
            </article>
        </div>
    </div>
</div>
</div>
<script language="javascript" type="text/javascript">require(['<?php echo SITE_URL?>scripts/page/index.js']); </script>
<?php include template('public','footer_view'); ?>
