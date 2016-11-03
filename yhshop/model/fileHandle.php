<?php
function delectImage($PImagePath, $PSImagePath) // 파일 삭제
{
    $result = unlink($PImagePath);

    if ($result) {
        $result = unlink($PSImagePath);
        if($result)
            $result=true;
    }

    return $result;
}
function identifyImage($imgInfo, $fileMaxSize, $imgFileType) // 파일에 대한 에러 검사
{
    $uploadError = null;

    //가짜파일인가?
    if(!getimagesize($imgInfo["tmp_name"]))
        $uploadError = -1;
    // 파일의 크기가 큰가?
    else if ($imgInfo["size"] > $fileMaxSize)
        $uploadError = -2;
    // 이미지 파일 포맷이 jpg, jpeg, png, gif 인가?
    elseif ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif" )
        $uploadError = -3;
//exit(var_dump($uploadError));
    return $uploadError; //에러리턴
}


function productImageUpload($tmp_name, $PImagePath) //이미지 업로드를 도와주는 함수
{
    //exit(var_dump($PImagePath));

    $uploadResult=(move_uploaded_file($tmp_name, $PImagePath));

    //exit(var_dump($imageFile));
    return $uploadResult;
}

function uploadPSIMage($PImagePath, $PSImagePath, $imgFileType, $PSImgWidth, $PSImgHeight){
    // 이미지 소스 파일을 읽어 온다.
    if( $imgFileType == "jpg" || $imgFileType == "jpeg"){
        $imgSource = imagecreatefromjpeg($PImagePath);
    }elseif ( $imgFileType == "png") {
        $imgSource = imagecreatefrompng($PImagePath);
    }else{
        $imgSource = imagecreatefromgif($PImagePath);
    }


    $width = imagesx($imgSource);
    $height = imagesy($imgSource);
    //exit(var_dump($width));
    $createImg = imagecreatetruecolor($PSImgWidth, $PSImgHeight);
    imagecopyresampled($createImg, $imgSource, 0, 0, 0, 0, $PSImgWidth, $PSImgHeight, $width, $height);

    if( $imgFileType == "jpg" || $imgFileType == "jpeg"){
        imagejpeg($createImg, $PSImagePath);
    }elseif ( $imgFileType == "png") {
        imagepng($createImg, $PSImagePath);
    }else{
        imagegif($createImg, $PSImagePath);;
    }

    //exit(var_dump($createImg));

}
?>