define(function (require) {
            var $ = require('jquery');
            var aci = require('aci');
            require('bootstrap');
            require('jquery-ui-dialog-extend');
            require('validationEngine');
            require('message');


        $("#validateform").validationEngine();

        $("#validateform").submit(function( event ) {
            event.preventDefault();
            if($("#validateform").validationEngine('validate'))
            {
                $("#dosubmit").attr("disabled","disabled");

                $.ajax({
                    type: "POST",
                    url: is_edit?SITE_URL+"module/datasource/edit/"+m_id+"/"+id:SITE_URL+"module/datasource/add_by_type/"+m_id+"/"+id,
                    data:  $("#validateform").serialize(),
                    success:function(response){
                        var dataObj=jQuery.parseJSON(response);
                        if(dataObj.status)
                        {
                            window.location.href=SITE_URL+'module/datasource/index/'+m_id;
                        }else
                        {
                            alert(dataObj.tips);
                            $("#dosubmit").removeAttr("disabled");
                        }
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        $("#dosubmit").removeAttr("disabled");
                    }
                });
            }else
            {
                $("#dosubmit").removeAttr("disabled");
            }


        });

    });
