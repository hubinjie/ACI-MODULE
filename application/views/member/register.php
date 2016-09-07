{template 'member','header'}
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo base_url()?>" ><div class="tsLogo "></div></a>
            </div>
            <div class="col-md-6">
                <a href="<?php echo base_url('member/login')?>" class="btn btn-default pull-right">登 录 </a>
            </div>
        </div>
    </div>
</div>
<div class="container">


    <form class="form-signin" role="form" action="<?php echo current_url()?>"   method="post" id="validateform"  name="validateform">
        <div class="form-signin-header"> <i class="glyphicon glyphicon-user"></i> 注册用户 </div>
        <div class="form-signin-body">

            <div class="form-group">
                <span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" id="inputUserName" name="inputUserName" class="form-control" placeholder="请输入输入用户名"   autofocus>
            </div>

            <div class="form-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password"  name="inputPassword" id="inputPassword" class="form-control" placeholder="请输入输入密码"  >
            </div>

            <div class="form-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password"  name="confirmPassword" id="confirmPassword"  class="form-control" placeholder="请重复输入密码"   required>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked="checked" name="inputAgree" id="inputAgree" value="1"> 我已阅读协议，知悉并认可协议条款
                        </label><a target="_blank" href="<?php echo  site_url('st/confer')?>">用户使用协议</a>
                    </div>
                </div>
            </div>

            <button class="btn  btn-primary btn-block" type="submit">注册</button>
        </div>
    </form>
    </div>
<script language="javascript" type="text/javascript">
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']);
    });
</script>
{template 'member','footer'}