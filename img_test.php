<?php
// Output to browser
// header('Content-type: image/jpeg');

putenv('GDFONTPATH=' . realpath('.'));

$bg_filename = "img/tvshow_thumbnails/house_of_cards_v2.jpg";
$logo_filename = "img/title_fb_share.png";

$bg_image = imagecreatefromjpeg($bg_filename);
list($width, $height, $type, $attr) = getimagesize($bg_filename);

$logo_image = imagecreatefrompng($logo_filename);
list($logo_width, $logo_height, $logo_type, $logo_attr) = getimagesize($logo_filename);

imagecopy($bg_image, $logo_image, $width - $logo_width - 20, 20, 0, 0, $logo_width, $logo_height);

// Create a new image instance
// $bg_image = imagecreatetruecolor(300, 200);
$text_color = imagecolorallocate($logo_image, 255, 255, 255);

// // Make the background white
// imagefilledrectangle($bg_image, 0, 0, 290, 190, $white);


// Load the gd font and write 'Hello'

$font_size = 56;
$dimensions = imagettfbbox($font_size , 0, 'trebucbd.ttf', "236 Days Left");
$text_width = $dimensions[4] - $dimensions[0];

$a = imagettftext(
    $bg_image,
    $font_size,             // size
    0,              // angle
    ($width - $text_width) / 2,             // x
    $height - 50,   // y
    $text_color, 'trebucbd.ttf' , "236 Days Left");

imagefilledrectangle($bg_image, 20, $height - 35, $width - 40, $height - 31, $text_color);
    

imagejpeg($bg_image, "img_gen/xxxxx.jpg");
imagedestroy($bg_image);
?>