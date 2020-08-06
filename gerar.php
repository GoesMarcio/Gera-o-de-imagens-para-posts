<?php

$image = imagecreatetruecolor( 594, 596 );
if(isset($_POST['background'])){
    $background = imagecreatefrompng('assets/'.$_POST["background"]);
}else{
    $background = imagecreatefrompng('assets/bg_roxo.png');
}
$background2 = imagecreatefrompng('assets/bg_amarelo.png');
$logo = imagecreatefrompng('assets/logo.png');
$MAX_W = 510;
$MAX_H = 410;

$errors = array();

// parte usuario
$filename = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;
if($filename){
    switch($filename["type"]){
        case "image/png": 
            $img_post = imagecreatefrompng($filename["tmp_name"]);
            break;
        case "image/jpeg": 
            $img_post = imagecreatefromjpeg($filename["tmp_name"]);
            break;
        case "image/gif": 
            $img_post = imagecreatefromgif($filename["tmp_name"]);
            break;
        default:
            $errors['format'] = "Formato ".$filename["type"]." não permitido!";
    }
}else{
    $filename["tmp_name"] = 'assets/acai.jpg';
    $img_post = imagecreatefromjpeg($filename["tmp_name"]);
}

if(isset($_POST["texto"])){
    $texto = $_POST["texto"];
    $descricao = $_POST["descricao"];
    $color_font = imagecolorallocate($image, 255, 255, 255);
    $color_font2 = imagecolorallocatealpha($image, 255, 255, 255, 50);
}else{
    $texto = "Este é o nosso produto mais vendido: um açaí.";
    $descricao = "Você pode escolher até 6 acompanhamentos!\nFaça seu pedido online agora!";
    $color_font = imagecolorallocate($image, 255, 255, 255);
    $color_font2 = imagecolorallocatealpha($image, 255, 255, 255, 50);
}


list($width, $height) = getimagesize($filename["tmp_name"]);
$new_width = $width;
$new_height = $height;

if($new_width > $MAX_W){
    $new_height = ($MAX_W / $new_width) * $new_height;
    $new_width = $MAX_W;
}

if($new_height > $MAX_H){
    $new_width = ($MAX_H / $new_height) * $new_width;
    $new_height = $MAX_H;
}

if(sizeof($errors)){
    echo json_encode($errors);
}else{
    // montagem da imagem
    //header("Content-Type: image/png");

    //imagecopy($image_original, $novaimagem, left, top, initial_width, initial_height, final_width, final_height);
    imagecopy($image, $background, 0, 0, 0, 0, 594, 596);
    imagecopyresized($image, $logo, 410, 9, 0, 0, 176, 70, 527, 211);
    //imagecopyresized($image, $background2, 42, 94, 0, 0, $MAX_W, $MAX_H, 594, 596); //area que a imagem pode ocupar
    imagecopyresized($image, $img_post, (594 - $new_width)/2, 94 + ((410 - $new_height)/2), 0, 0, $new_width, $new_height, $width, $height);

    imagettftext($image, 14, 0, 57, 530 - ((410 - $new_height)/4), $color_font, "assets/Roboto-Regular.ttf", $texto);
    imagettftext($image, 11, 0, 57, 550 - ((410 - $new_height)/4), $color_font2, "assets/Roboto-Regular.ttf", $descricao);

    $name_imagem = "media/post_".time().".png";
    imagepng($image, $name_imagem);

    $dados['status'] = "success";
    $dados['imagem'] = $name_imagem;

    echo json_encode($dados);
}
?>