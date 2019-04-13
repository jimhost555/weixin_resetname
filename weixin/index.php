<?php
header("Content-type: text/html; charset=utf-8");
$name = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = post_input($_POST["name"]);
    $pass = post_input($_POST["pass"]);
    if($name == 'admin' && $pass == "123456")
    {
        session_start();
        $_SESSION['user']="admin";
        header("location:add.php");
    }else{
        header("location:index.html");
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