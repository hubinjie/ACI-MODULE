<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> 内容列表
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class="btn " href="<?php echo base_url($folder_name.'/article/add/'.$menu_type)?>"> <span class="glyphicon glyphicon-plus"></span> 新增 </a>
            </div>
            <div class='badge'><?php echo count($data_list)?> 条记录</div>
        </div>
    </div>
    <div class="panel-filter">
        <form class="form-inline " role="form" method="get">
            <div class="form-group ">
                <div class="btn-group">
                    <a class="btn btn-default <?php echo $menu_type == 'list' ? 'active' : '' ?>"  href="<?php echo base_url($folder_name.'/article/index/list') ?>">文章类</a>
                    <a class="btn btn-default <?php echo $menu_type == 'page' ? 'active' : '' ?>"  href="<?php echo base_url($folder_name.'/article/index/page') ?>">单页类</a>
                </div>
            </div>
            <div class="form-group ">
                <label for="keyword"><strong>分类：</strong></label>
                <select name="menu_id" class=" form-control">
                    <option value="">==不限==</option>
                    <?php echo $select_categorys; ?>
                </select>

                <label for="keyword"><strong>关键词：</strong></label>
                <input class="form-control" type="text" name="keyword" value="<?php echo $keyword ?>" id="keyword"
                       placeholder="请输入关键词"/>

                <button type="submit" name="dosubmit" value="搜索" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> </button>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <form id="formlist" name="formlist" method="post">
                    <table class="table table-radius table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>页面标题</th>
                            <th>页面分类</th>
                            <th>最后修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($data_list) foreach ($data_list as $k => $v): ?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $v['page_id'] ?>" name="pid[]"/></td>
                                <td><?php echo $v['title'] ?><br/><?php echo position_labes($v['position_id']) ?></td>
                                <td><?php echo $v['category'] ?></td>
                                <td><?php echo $v['updated'] ?></td>
                                <td>
                                    <?php aci_ui_a($folder_name, 'article', 'edit', $v['page_id'], ' class="btn btn-default btn-xs"', '<span class="glyphicon glyphicon-edit"></span> 修改') ?>
                                    <?php aci_ui_a($folder_name, 'article', 'readonly', $v['page_id'], ' class="btn btn-default btn-xs" target="_blank"', '<span class="glyphicon glyphicon-share-alt"></span> 预览') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
        </form>
    </div>
    <div class="panel-footer">

        <?php if ($data_list): ?>
            <div class="tab-control">
                <div class="pull-left">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" id="reverseBtn" onclick="ReverseChecked('pid[]')">
                            <span class="glyphicon glyphicon-ok"></span> 反选
                        </button>
                        <?php aci_ui_button($folder_name, 'article', 'delete', ' type="button" id="deleteBtn"  class="btn btn-default" ', '<span class="glyphicon glyphicon-remove"></span> 删除勾选') ?>
                        <?php aci_ui_button($folder_name, 'article', 'position', ' type="button" id="positionBtn"  class="btn btn-default" ', '<span class="glyphicon glyphicon-bookmark"></span> 推荐至...') ?>

                    </div>
                </div>
                <div class="pull-right">
                    <?php echo $pages ?>
                </div>
            </div>
        <?php else:?>
            <div align="center">暂时数据...</div>
        <?php endif; ?>

    </div>
</div>
<script language="javascript" type="text/javascript">
    var folder_name ="<?php echo $folder_name;?>";
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']);
    });
</script>