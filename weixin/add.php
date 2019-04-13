<?php 
session_start();
$user = $_SESSION['user'];
if(!($user == "admin")){
    header("location:index.html");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>修改微信号</title>
    <link rel="shortcut icon"href="favicon.ico">
    <link href="zui/css/zui.min.css" rel="stylesheet">
</head>
<body>
<style>
    .form-table{
        width: 300px;
        margin: 0 auto;
        padding-top: 200px;
    }
    .form-table textarea{
        width: 100%;
        height: 150px;
    }
    .form-table .input-control{
        padding-top: 20px;
    }
    #tishi{
        display: none;
    }
</style>
<form class="form-table" action="weixin.php" onsubmit="return check_weixin()" method="post">
    <div class="input-control">
        <p><span style="color: red;"><i class="icon icon-star"></i></span> 此处添加微信号，多个微信号之间用<span style="color: red;font-weight: 700;"> , </span>分隔。</p>
        <textarea id="post_weixin" name="weixin" class="form-control" placeholder="例如：微信1,微信2,微信3"></textarea>
    </div>
    <div class="input-control">
        <p>友情提示：最后一个微信号后边不要加逗号!!!</p>
        <button class="btn btn-block btn-primary">立即提交</button>
    </div>
    <div class="input-control" id="tishi">
        <div class="alert alert-danger with-icon">
            <i class="icon icon-times"></i>
            <div class="content">请确认输入的内容是否正确!!!</div>
        </div>
    </div>
</form>
<script src="zui/js/jquery.min.js"></script>
<script>
    function check_weixin() {
        let weixin = $("#post_weixin").val().trim();
        let len = weixin.length;
        let last_a = weixin.substring(len-1);
        if(last_a === ","){
            let cont = "最后不能以逗号结尾!!!";
            tishi(cont);
            return false;
        }else if(!last_a){
            let cont = "提交数据不能为空!!!";
            tishi(cont);
            return false;
        }
    }
    function tishi_hid() {
        $("#tishi").slideUp(800);
    }
    function tishi(cont) {
        $("#tishi .content").text(cont);
        $("#tishi").slideDown(800);
        setTimeout(tishi_hid,2500);
    }
</script>
</body>
</html>