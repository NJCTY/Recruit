<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>招新管理员登录</title>
    <!-- Bootstrap -->
    <link href="/recruit/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/recruit/public/css/style.css" rel="stylesheet">
    <link href="/recruit/public/css/admin.css" rel="stylesheet">
</head>

<body>
    <div class="wrap">
        <div class="container" id="main">
            <!--logo图片-->
            <div class="logoImg">
                <img src="/recruit/public/images/logo.png" class="img-responsive center-block">
            </div>
            <!--信息填写界面导航-->
            <ul class="nav nav-tabs" id="tab-list" role="tablist">
                <li role="presentation" class="active first">
                    <a href="#" data-toggle="link" role="tab" aria-expanded="true"><span>登陆</span></a>
                </li>
            </ul>
            <!--信息填写界面面板-->
            <div class="tab-content">
                <!--登陆界面-->
                <div role="tabpannel" class="tab-pane active" id="sign-in">
                    <form role="form">
                        <div class="form-group">
                            <label id="identity">
                                <select class="form-control">
                                    <option value="1">部门管理员</option>
                                    <option value="2">社团管理员</option>
                                    <option value="3">超级管理员</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="studentId" class="form-control" id="inputUsername" placeholder="管理员账号" name="false">
                        </div>
                        <div class="form-group">
                            <input type="passWord" class="form-control" id="inputPassWord" placeholder="密码" name="false">
                        </div>
                    </form>
                    <!--信息提交按钮-->
                    <button type="button" class="btn btn-primary center-block" id="login">sign in</button>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <div class="footer">
        <div class="container bottom">
            <p class="test-muted">&copy; 校科协</p>
        </div>
    </div>
    <script src="/recruit/public/js/jquery-1.11.2.min.js"></script>
    <script src="/recruit/public/js/bootstrap.min.js"></script>
    <!--<script src="../../../../public/js/ajax.js"></script>-->
    <script>
    $(document).ready(function() {
        //array of judgement
        $("#login").click(function() {
            var data = {};
            data.identity = $("#identity select").val();
            data.username = $('#inputUsername').val();
            data.password = $('#inputPassWord').val();
            if (($("#inputUsername").attr("name") == "true") && ($("#inputPassWord").attr("name") == "true")) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('Admin/User/doLogin');?>",
                    data: data,
                    dataType: "json",
                    success: function(back) {
                        if (back.status == 1) {
                            location.href = "<?php echo U('Admin/Index/comctrl');?>";
                        } else {
                            alert(back.info);
                        }
                    },
                });
            } else {
                alert("请正确输入信息");
            }
        });


        //is input property id(login)
        $("#inputUsername").blur(function() {
            if ($(this).val().length == 0) {
                $(this).css("border-color", "#8B0000");
                $(this).attr("name", "false");
            } else {
                $(this).css("border-color", "#66afe9");
                $(this).attr("name", "true");
            }
        });
        //is input property password(login)
        $("#inputPassWord").blur(function() {
            if ($(this).val().length == 0) {
                $(this).css("border-color", "#8B0000");
                $(this).attr("name", "false");
            } else {
                $(this).css("border-color", "#66afe9");
                $(this).attr("name", "true");
            }
        });

    });

    </script>
</body>

</html>