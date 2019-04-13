<?php
header("Content-type: text/html; charset=utf-8");
$weixin = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $weixin = post_input($_POST['weixin']);
    if(isset($weixin)){
        $file = "weixin.txt";
        if(is_writable($file))
        {
            file_put_contents("weixin.txt", $weixin);
            $url = $_SERVER['HTTP_REFERER'];
            $url = preg_replace('/\/weixin\/add.php/', '', $url);
            print('修改成功<br>三秒后自动跳转。');
            header("refresh:3;url=$url");
        }
        else
        {
            echo ("$file 不可写入!请修改权限后重试!");
            $url = $_SERVER['HTTP_REFERER'];
            header("refresh:3;url=$url");
        }

    }else{
        echo "请检查提交的数据";
    }
}
//过滤提交信息;
function post_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}