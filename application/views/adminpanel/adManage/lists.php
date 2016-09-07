<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> 内容列表
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class="btn " href="<?php echo base_url($folder_name.'/'.$controller_name.'/add/')?>"> <span class="glyphicon glyphicon-plus"></span> 新增 </a>
            </div>
            <div class='badge'><?php echo count($data_list)?> 条记录</div>
        </div>
    </div>
    <div class="panel-filter">
        <form class="form-inline" role="form" method="get">
            <div class="form-group">
                <label for="keyword">关键词</label>
                <input class="form-control" type="text" name="keyword"  value="<?php echo isset($data_info['keyword'])? $data_info['keyword']:"";?>" id="keyword" placeholder="请输入关键词"/></div>
            <div class="form-group">
                <label for="position">位置</label>

                    <select class="form-control "  name="position"  id="position"><option value="">==不限==</option><option value='homepage'
                            <?php if(isset($data_info['position'])&&($data_info['position']=='homepage')) { ?> selected="selected" <?php } ?>              >首页</option>
                    </select>
            </div>
            <button type="submit" name="dosubmit" value="搜索" class="btn btn-success">搜索...</button></form>
        </form>
    </div>
    <div class="panel-body">
        <form id="formlist" name="formlist" method="post">
            <table class="table table-hover dataTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th   nowrap="nowrap">广告名称</th>
                    <th   nowrap="nowrap">位置</th>
                    <th   nowrap="nowrap">图片</th>
                    <th   nowrap="nowrap">链接</th>
                    <th   nowrap="nowrap">打开方式</th>
                    <th   nowrap="nowrap">开始时间</th>
                    <th   nowrap="nowrap">结束时间</th>
                    <th   nowrap="nowrap">创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data_list as $k=>$v):?>
                    <tr>
                        <td><input type="checkbox" name="pid[]" value="<?php echo $v['admanage_id']?>" /></td>
                        <td><?php echo $v['admanage_name']?></td>
                        <td><?php echo $v['position']?></td>
                        <td><img src="<?php echo SITE_URL?>uploadfile/ads/<?php echo $v['pic']?>" width="100" /></td>
                        <td><?php echo $v['link']?></td>
                        <td><?php echo $v['target']?></td>
                        <td><?php echo $v['begin_date']?></td>
                        <td><?php echo $v['end_date']?></td>
                        <td><?php echo $v['created']?></td>
                        <td>
                            <a href="<?php echo base_url($folder_name.'/'.$controller_name.'/edit/'.$v['admanage_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                            <button type="button" class="btn btn-default btn-xs delete-btn" value="<?php echo $v['admanage_id'];?>"><span class="glyphicon glyphicon-remove"></span> 删除</button>

                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </form>
    </div>
    <div class="panel-footer">

        <?php if ($data_list): ?>
                <div class="pull-left">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" id="reverseBtn"><span class="glyphicon glyphicon-ok"></span> 反选</button>
                        <button type="button" id="deleteBtn"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
                    </div>
                </div>
                <div class="pull-right">
                    <?php echo $pages;?>
                </div>
        <?php else:?>
            <div align="center">暂时数据...</div>
        <?php endif; ?>

    </div>
</div>
<script language="javascript" type="text/javascript">
    var folder_name = "<?php echo $folder_name?>";
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/lists.js']);
    });
</script>