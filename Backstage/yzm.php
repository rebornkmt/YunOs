<?php
header("Content-Type:text/html;Charset=UTF-8");// ����ҳ��ı�����
header("Content-Type:image/jpeg");// ֪ͨ������������jpeg��ʽ��ͼ��
$img = imagecreatetruecolor(150,30);//�������������ô�С  x��100  y��30
$bgcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));//���䱳����ɫ
//��Ӹ����ߣ��������ɫ
for($i=0;$i<3;$i++){
    $linecolor = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($img, mt_rand(0,150), mt_rand(0,50), mt_rand(0,150), mt_rand(0,50), $linecolor);
}
//��Ӹ��ŵ㣬��ѭ��25�Σ�������ɫ���
for($i=0;$i<25;$i++){
    $dotcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
    imagesetpixel($img, mt_rand(0,100), mt_rand(0,50), $dotcolor);
}
$rand_str = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm123456789";//��Ҫʹ�õ���֤��һЩ��ĸ������
$str_arr = array();   
for($i = 0;$i<4;$i++){    //�������4��ĸ������                            
    $pos = mt_rand(0,strlen($rand_str)-1);
    $str_arr[] = $rand_str[$pos];//��ʱ����
}
$x_start=150/4;//�����ַ�X��λ��
foreach ($str_arr as $key) {
    $fontcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
    imagettftext($img, 25, mt_rand(-15,15), $x_start, 50/2, $fontcolor, "C:/Windows/Fonts/ALGER.TTF", $key);//��ȡ�����ϵ�������ʽ
    $x_start +=20;//�����󵥸��ַ���X�� +20
}
imagefill($img, 0, 0, $bgcolor); ////�ѱ�����䵽ͼ��
imagejpeg($img);             // ���ͼ��
imagedestroy($img);          // ����ͼ��

?>