<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php $attache_css[] = SKIN_PATH."article.css"; ?>
<?php include template('public','header_view'); ?>
<div class="bs-docs-header" id="content">
    <div class="container text-left">
        <h1><?php echo $cat_info['menu_name']?></h1>
        <p><?php echo $cat_info['menu_desc']?></p>
    </div>
</div>
<div class="article">
    <div class="container">
        <ul class="breadcrumb">
            <li>当前位置 </li>
            <li><a href="<?php echo site_url()?>">首页</a> </li>
            <?php if($parent_menu_info):?><li><a href="<?php echo $parent_menu_info['menu_url'];?>"><?php echo $parent_menu_info['menu_name'];?></a></li><?php endif;?>
            <li class="active"><?php echo $cat_info['menu_name']?></li>
        </ul>
        <div class="article">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if($data_list)foreach($data_list as $k=>$v):?>
                                <div class="media">
                                    <?php if($v['thumb']):?>
                                        <div class="media-left media-middle">
                                            <a href="<?php echo $v['url']?>" target="_blank">
                                                <img class="media-object" src="<?php echo $v['thumb']?>" alt="...">
                                            </a>
                                        </div>
                                    <?php endif;?>
                                    <div class="media-body">
                                        <h4 class="media-heading"><i> </i><span class="date pull-right"><?php echo $v['created']?></span><a href="<?php echo $v['url']?>" target="_blank"><?php echo $v['title']?></a></h4>
                                    </div>
                                </div>
                            <?php endforeach;?>

                            <div class="gap-15"></div>
                            <div class="b_pager">
                                <?php echo $pages;?>
                            </div>
                            <div class="gap-15"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include template('public','footer_view'); ?>
