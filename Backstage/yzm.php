<?php
header("Content-Type:text/html;Charset=UTF-8");// 设置页面的编码风格
header("Content-Type:image/jpeg");// 通知浏览器输出的是jpeg格式的图像
$img = imagecreatetruecolor(150,30);//创建画布并设置大小  x轴100  y轴30
$bgcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));//分配背景颜色
//添加干扰线，随机背景色
for($i=0;$i<3;$i++){
    $linecolor = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($img, mt_rand(0,150), mt_rand(0,50), mt_rand(0,150), mt_rand(0,50), $linecolor);
}
//添加干扰点，并循环25次，背景颜色随机
for($i=0;$i<25;$i++){
    $dotcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
    imagesetpixel($img, mt_rand(0,100), mt_rand(0,50), $dotcolor);
}
$rand_str = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm123456789";//需要使用到验证的一些字母和数字
$str_arr = array();   
for($i = 0;$i<4;$i++){    //随机生成4字母和数字                            
    $pos = mt_rand(0,strlen($rand_str)-1);
    $str_arr[] = $rand_str[$pos];//临时交换
}
$x_start=150/4;//单个字符X轴位置
foreach ($str_arr as $key) {
    $fontcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
    imagettftext($img, 25, mt_rand(-15,15), $x_start, 50/2, $fontcolor, "C:/Windows/Fonts/ALGER.TTF", $key);//获取本机上的字体样式
    $x_start +=20;//遍历后单个字符沿X轴 +20
}
imagefill($img, 0, 0, $bgcolor); ////把背景填充到图像
imagejpeg($img);             // 输出图像
imagedestroy($img);          // 销毁图像

?>