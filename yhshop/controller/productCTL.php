<?php
include_once "../model/productHandle.php";
include_once "../model/fileHandle.php";
include_once "../model/commonLIB.php";

switch ($action) {
    case 2910 :
        $PImagePath = "../img/PImage/";
        $PSImagePath = "../img/PSImage/";
        $PSImgWidth = 190;
        $PSImgHeight = 230;
        $fileMaxSize = 1500000;

        $product['PCategory'] = isset($_POST['PCategory']) ? $_POST['PCategory'] : false;
        $product['PCode'] = isset($_POST['PCode']) ? $_POST['PCode'] : false;
        $product['PName'] = isset($_POST['PName']) ? $_POST['PName'] : false;
        $product['PStock'] = isset($_POST['PStock']) ? $_POST['PStock'] : false;
        $product['PPrice'] = isset($_POST['PPrice']) ? $_POST['PPrice'] : false;

        $imgInfo['name'] = isset($_FILES['PImage']['name']) ? $_FILES['PImage']['name'] : null;
        $imgInfo['tmp_name'] = isset($_FILES['PImage']['tmp_name']) ? $_FILES['PImage']['tmp_name'] : null;
        $imgInfo['type'] = isset($_FILES['PImage']['type']) ? $_FILES['PImage']['type'] : null;
        $imgInfo['size'] = isset($_FILES['PImage']['size']) ? $_FILES['PImage']['size'] : null;
        $imgInfo['error'] = isset($_FILES['PImage']['error']) ? $_FILES['PImage']['error'] : null;
        //exit(var_dump($time));
//print_r($_FILES);
        //exit(var_dump($imgInfo));

        if ($imgInfo['name'] && $imgInfo['error'] == 0) {
            $imgFileType = pathinfo($imgInfo['name'], PATHINFO_EXTENSION); //이미지 파일 확장자 추출

            //exit(var_dump($imgFileType));

            $uploadError = identifyImage($imgInfo, $fileMaxSize, $imgFileType); // 확장자가 맞는지 크기는 크지않은지 확인해 주는 함수

            if (!$uploadError) {
                $findPNum = insertProduct($product); // 에러가 없을 때 상품을 등록하고 이미지를 출력하기 위해 상품에 대한 정보출력
                //exit(var_dump($productInfo));
                $productInfo = showProductList($findPNum);

                $cut = explode(" ", $productInfo['PDate']); //' '를 기준으로 자르고 앞에 잘린것을 가져옴
                $day = $cut[0];

                $imgName = "{$day}_{$productInfo['PCode']}.$imgFileType"; // 이미지 파일 이름

                $PImagePath = "{$PImagePath}{$imgName}"; // 이미지 경로
                $PSImagePath = "{$PSImagePath}P_{$imgName}"; // 썸네일 경로지정

//exit(var_dump($PSImagePath));
                $uploadResult = productImageUpload($imgInfo['tmp_name'], $PImagePath); //이미지 업로드를 도와주는 함수
                //exit(var_dump($imageName));

                if ($uploadResult) {
                    uploadPSIMage($PImagePath, $PSImagePath, $imgFileType, $PSImgWidth, $PSImgHeight);
                    insertImage($findPNum, $imgName); // pimage와 psimage의 이미지의 이름을 바꾸어주는 함수
                }

                header("location: ./mainCTL.php?action=2000");
                exit();

            } else {
                $_session['uploadError'] = $uploadError;
                header("location: ./mainCTL.php?action=2900");
                exit();
            }
        }
        //exit(var_dump($uploadError));

        break;

    case 2010;
        $PNum = isset($_REQUEST['PNum']) ? $_REQUEST['PNum'] : null;
        //exit(var_dump($PNum));

        $productInfo = showProductList($PNum);
        $_SESSION['productInfo'] = $productInfo;

        $action = 2020;
        //exit();

        //exit(var_dump($productInfo));

        break;

    case 2020;
        $productInfo = $_SESSION['productInfo'];
        $product['PName'] = isset($_POST['PName']) ? $_POST['PName'] : false;
        $product['PStock'] = isset($_POST['PStock']) ? $_POST['PStock'] : false;
        $product['PPrice'] = isset($_POST['PPrice']) ? $_POST['PPrice'] : false;
        //exit(var_dump($product['PName']));
        $product['PImage'] = isset($_FILES['PImage']) ? $_FILES['PImage'] : false;

        //exit(var_dump($product));

        if ($product['PImage']) {
            //exit(var_dump($product['PImage']));
            $imgInfo['name'] = isset($_FILES['PImage']['name']) ? $_FILES['PImage']['name'] : null;
            $imgInfo['tmp_name'] = isset($_FILES['PImage']['tmp_name']) ? $_FILES['PImage']['tmp_name'] : null;
            $imgInfo['type'] = isset($_FILES['PImage']['type']) ? $_FILES['PImage']['type'] : null;
            $imgInfo['size'] = isset($_FILES['PImage']['size']) ? $_FILES['PImage']['size'] : null;
            $imgInfo['error'] = isset($_FILES['PImage']['error']) ? $_FILES['PImage']['error'] : null;

            if ($imgInfo['name'] && $imgInfo['error'] == 0) {
                $PImagePath = "../img/PImage/";
                $PSImagePath = "../img/PSImage/";
                $PSImgWidth = 190;
                $PSImgHeight = 230;
                $fileMaxSize = 1500000;

                $imgFileType = pathinfo($imgInfo['name'], PATHINFO_EXTENSION); //이미지 파일 확장자 추출

                //exit(var_dump($imgFileType));

                $uploadError = identifyImage($imgInfo, $fileMaxSize, $imgFileType); // 확장자가 맞는지 크기는 크지않은지 확인해 주는 함수

                if (!$uploadError) {
                    $PImagePath = "{$PImagePath}{$productInfo['PImage']}"; // 이미지 경로
                    $PSImagePath = "{$PSImagePath}{$productInfo['PSImage']}"; // 썸네일 경로지정

                    $rsc = delectImage($PImagePath, $PSImagePath);
//exit(var_dump($result));

                    if ($rsc) {
                        //exit(var_dump($rsc));
                        $productInfo = productModify($product, $productInfo['PNum']); // 에러가 없을 때 상품을 수정하고 이미지를 출력하기 위해 상품에 대한 정보출력
                        //exit(var_dump($productInfo));

                        $cut = explode(" ", $productInfo['PDate']); //' '를 기준으로 자르고 앞에 잘린것을 가져옴
                        $day = $cut[0];

                        $imgName = "{$day}_{$productInfo['PCode']}.$imgFileType"; // 이미지 파일 이름

                        $PImagePath = "{$PImagePath}{$imgName}"; // 이미지 경로
                        $PSImagePath = "{$PSImagePath}P_{$imgName}"; // 썸네일 경로지정

//exit(var_dump($PSImagePath));
                        $uploadResult = productImageUpload($imgInfo['tmp_name'], $PImagePath); //이미지 업로드를 도와주는 함수
                        //exit(var_dump($imageName));

                        if ($uploadResult) {
                            uploadPSIMage($PImagePath, $PSImagePath, $imgFileType, $PSImgWidth, $PSImgHeight);
                            insertImage($findPNum, $imgName); // pimage와 psimage의 이미지의 이름을 바꾸어주는 함수
                        }

                        header("location: ./mainCTL.php?action=2000");
                        exit();
                    }
                } else {
                    $_session['uploadError'] = $uploadError;
                    header("location: ./mainCTL.php?action=2020");
                    exit();
                }
            }
        } else
            productModify($product, $productInfo['PNum']);
        //exit(var_dump($product['PImage']));


        $action = 2000;
        //exit();

        //exit(var_dump($productInfo));

        break;

    case 2030:
        $PImagePath = "../img/PImage/";
        $PSImagePath = "../img/PSImage/";

        $PNum = isset($_REQUEST['PNum']) ? $_REQUEST['PNum'] : null;
//exit(var_dump($PNum));
        $productInfo = showProductList($PNum);

        if($productInfo['PImage']){
            $PImagePath = "{$PImagePath}{$productInfo['PImage']}"; // 이미지 경로
            $PSImagePath = "{$PSImagePath}{$productInfo['PSImage']}"; // 썸네일 경로지정

            $result=delectImage($PImagePath, $PSImagePath);
        }

            $result = deleteProduct($PNum);

            if ($result) {
                header("location: ./mainCTL.php?action=2000");
                exit();
            }
        break;

    case 800;
        $productNum = isset($_REQUEST['productNum']) ? $_REQUEST['productNum'] : null;
        $result = selectProductView($productNum);
        $productArray = storeProductList($result);

        $_SESSION['productListArray'] = $productArray;
        //exit(var_dump($productArray[0][0]));

        break;

    default :
        if ($action >= 2000)
            //exit($action);
            $productNum = $action - 2000;
        else
            $productNum = $action;
        //exit(var_dump($action));

        if ($productNum > 0) {
            $topCategoryNum = intval($productNum / 100) - 1;
            $bottomCategoryNum = intval(($productNum % 100) / 10);
            //exit(var_dump($topCategoryNum));
            //exit(var_dump($productNum));

            $PCategoryArray = array(
                array('O', 'O1', 'O2', 'O3'),
                array('T', 'T1', 'T2', 'T3'),
                array('B', 'B1', 'B2'),
                array('P', 'P1', 'P2', 'P3', 'P4'),
                array('S', 'S1', 'S2'),
                array('B', 'B1', 'B2', 'B3'),
                array('F', 'F1', 'F2', 'F3', 'F4'),
            );

            $PCategory = $PCategoryArray[$topCategoryNum][$bottomCategoryNum] . "%";
            $tableInfo = getProductRowNum($PCategory);
        } else
            $tableInfo = getAllProductRowNum();


        //exit(var_dump($tableInfo));
        $getPageInfoNum = getPageInfo($tableInfo['productRowNum'], $nowPage);


//exit(var_dump($getPageInfoNum));
        $result = limitTable($tableInfo['sql'], $getPageInfoNum['limitFirstNum'], $getPageInfoNum['onePage']);
        $productListArray = storeProductList($result);
//exit(var_dump($result));

        $_SESSION['getPageInfoNum'] = $getPageInfoNum;
        $_SESSION['productListArray'] = $productListArray;


        //exit(var_dump($_SESSION['productListArray']));

        break;
}


?>