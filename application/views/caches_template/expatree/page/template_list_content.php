<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php $attache_css[] = SKIN_PATH."article.css"; ?>
<?php include template('public','header_view'); ?>
<div class="bs-docs-header" id="content">
    <div class="container text-left">
        <h1><?php echo $data_info['title']?></h1>
        <p><?php echo $data_info['created']?></p>
    </div>
</div>
<div class="article">
    <div class="container ">

        <ul class="breadcrumb">
            <li>当前位置 ></li>
            <li><a href="<?php echo site_url()?>">首页</a> </li>
            <?php if($parent_menu_info):?><li><a href="<?php echo $parent_menu_info['menu_url'];?>"><?php echo $parent_menu_info['menu_name'];?></a></li><?php endif;?>
            <li class="active"><a href="<?php echo $cat_info['menu_url'];?>"><?php echo $cat_info['menu_name']?></a></li>
        </ul>

        <article>
            <div class="articleBox">
                <!--文章内容-->
                <?php echo $data_info['content']?>
                <!--文章内容-->
            </div>

        </article>

        <ul class="pager">
            <?php if($prev_info){?>
                <li><a href="<?php echo $prev_info['url']?>" >上一条</a></li>
            <?php }else{?>
            <?php }?>
            <?php if($next_info){?>
                <li><a href="<?php echo $next_info['url']?>">下一条 </a></li>
            <?php }else{?>
            <?php }?>
        </ul>

    </div>
</div>

<?php include template('public','footer_view'); ?>