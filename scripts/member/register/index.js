define(function (require) {
    var $ = require('jquery');
    var aci = require('aci');
    require('bootstrap');
    require('bootstrapValidator');
    require('message');

        $('#validateform').bootstrapValidator({
            message: '输入项不能为空',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                inputUserName: {
                    validators: {
                        notEmpty: {
                            message: '请输入用户名'
                        },
                        stringLength: {
                            min: 5,
                            max: 20,
                            message: '用户名长度为5到20个字符之间'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            message: '用户名只接受英文数字及下划线'
                        }
                    }
                },
                inputPassword: {
                    validators: {
                        notEmpty: {
                            message: '请输入密码'
                        },
                        stringLength: {
                            min: 6,
                            max: 20,
                            message: '密码为6-20个字符，请使用字母加数字或下划线组合密码'
                        },
                        identical: {
                            field: 'confirmPassword',
                            message: '两次密码输入不一样'
                        },
                        different: {
                            field: 'inputUserName',
                            message: '密码不能和用户名一样'
                        }
                    }
                },
                confirmPassword:{
                    validators: {
                        notEmpty: {
                            message: '确认密码不能为空'
                        },
                        identical: {
                            field: 'inputPassword',
                            message: '两次密码输入不一样'
                        },
                        different: {
                            field: 'inputUserName',
                            message: '密码不能和用户名一样'
                        }
                    }
                },
                inputAgree:{
                    validators: {
                        notEmpty: {
                            message: '需要先接受协议才能进行注册'
                        }
                    }
                }


            }
        }).on('success.form.bv', function(e) {

            e.preventDefault();
            $("#dosubmit").attr("disabled","disabled");
            $.scojs_message('正在登录，请稍候...', $.scojs_message.TYPE_WAIT);

            $.ajax({
                type: "POST",
                url: $("#validateform").attr("action"),
                data:  $("#validateform").serialize(),
                success:function(response){
                    var dataObj=jQuery.parseJSON(response);
                    if(dataObj.status)
                    {
                        $.scojs_message('注册成功，请重新登录...', $.scojs_message.TYPE_OK);
                        aci.GoUrl(dataObj.next_url,1);
                    }else
                    {
                        $.scojs_message(dataObj.tips, $.scojs_message.TYPE_ERROR);
                        $("#dosubmit").removeAttr("disabled");
                    }
                },
                error: function (request, status, error) {
                    $.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
                    $("#dosubmit").removeAttr("disabled");
                }
            });

        }).on('error.form.bv',function(e){
            $.scojs_message('输入项不能为空', $.scojs_message.TYPE_ERROR);$("#dosubmit").removeAttr("disabled");
        });


    });
