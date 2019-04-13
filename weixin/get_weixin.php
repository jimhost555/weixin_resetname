<?php
$weixin = file_get_contents("weixin.txt");
?>
var weixins = "<?php echo $weixin ?>";
var wei_arr = weixins.split(",");
var number = wei_arr.length;
var index = Math.floor(Math.random()*number);
var weixin = wei_arr[index];