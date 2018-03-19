<?php
ini_set('php_gd2.dll', 1);
$path = "../example.jpg"; // 圖片所在網址
$type = getimagesize($path); // 取得圖片資訊
switch($type[2]){ // 判斷圖片的類型
    case 1 : $img_type = "gif"; break;  
    case 2 : $img_type = "jpeg"; break;  
    case 3 : $img_type = "png"; break;  
}
header("Content-type: image/" . $img_type); // 設定圖檔格式

if ($img_type == "jpeg"){
    $src_im = imagecreatefromjpeg($path);

    imagejpeg($src_im); //輸出調整大小後的圖像
}


imagedestroy($src_im);
?>
