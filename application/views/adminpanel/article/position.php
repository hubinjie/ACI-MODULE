<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<form method="post" action="<?php echo current_url()."?pid=".$pid?>">
<div class="form-group">
  <label class="col-sm-2 control-label">请选择推荐位：</label>
  <div class="col-sm-9">
          <?php echo position_options();?>
  </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">保存</button>
    </div>
  </div>
</form>