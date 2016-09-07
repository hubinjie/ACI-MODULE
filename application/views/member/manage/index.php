<?php defined('BASEPATH') or exit('No permission resources.'); ?>
 <h2 class="page-header">欢迎使用ACI模块自动生成器</h2>
<div class="article">

        <div class="list-group">
                    <?php if($data_list)foreach($data_list as $k=>$v):?>
                        <a href="<?php echo $v['url']?>" target="_blank" class="list-group-item"><?php echo $k+1?>. &nbsp;&nbsp;<span class="date pull-right"><?php echo $v['created']?></span> <?php echo $v['title']?></a>
                    <?php endforeach;?>

        </div>
</div>
<script language="javascript" type="text/javascript">
  require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
    require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/empty.js']);
 });
</script>
