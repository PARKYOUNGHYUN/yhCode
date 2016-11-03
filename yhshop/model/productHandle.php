<?php
include_once "ConnectDB.php";

function insertProduct($product)
{
    dbConnect();

    $sql = "INSERT INTO product (PCategory, PCode, PName, PStock, PPrice, PDate) ";
    $sql .= "VALUES ('{$product['PCategory']}', '{$product['PCode']}', '{$product['PName']}', ";
    $sql .= "'{$product['PStock']}', '{$product['PPrice']}', now())";

    //exit(var_dump($sql));

    mysql_query($sql); // 쿼리전송
    $findPnum = mysql_insert_id();
    //exit(var_dump($findPnum));

    return $findPnum;
}

function deleteProduct($PNum){
    $sql = "delete product from product ";
    $sql .= "Where PNum = '{$PNum}'";

    $result = mysql_query($sql);

    //exit(var_dump($result));

    return $result;
}

function showProductList($findPnum){
    dbConnect();

    $sql = "select * from product ";
    $sql .= "where PNum = '{$findPnum}'";
    //exit(var_dump($sql));
    $result = mysql_query($sql);
//exit(var_dump($result));

    $productInfo = mysql_fetch_array($result);
    //exit(var_dump($productArray));
    //exit(var_dump($productInfo));

    return $productInfo;
}


function insertImage($PNum, $imgName)
{ // pimage와 psimage의 이미지의 이름을 바꾸어주는 함수
    //exit(var_dump($PSImage));
    $sql = "UPDATE product SET PImage = '{$imgName}', PSImage = 'P_{$imgName}' ";
    $sql .= "Where PNum = '{$PNum}'";

    //exit(var_dump($sql));
    mysql_query($sql);
    //exit(var_dump($result));
}

function productModify($productArray, $PNum)
{
    dbConnect();
    //exit(var_dump($productArray));

    $sql = "update product set PName = '{$productArray['PName']}', PStock = {$productArray['PStock']}, ";
    $sql.="PPrice = {$productArray['PPrice']}, PDate=now() ";
    $sql .= "where PNum = {$PNum}";
    //exit(var_dump($sql));
    $result=mysql_query($sql);

    if($result){
        $sql = "select * from product ";
        $sql .= "where PNum = '{Pnum}'";
        //exit(var_dump($sql));
        $result = mysql_query($sql);
//exit(var_dump($result));

        $productInfo = mysql_fetch_array($result);
        //exit(var_dump($productArray));
        //exit(var_dump($productInfo));

        return $productInfo;
    }
}

function getAllProductRowNum()
{
    $sql = "SELECT count(*) FROM product ";
    $sql .= "order by PNum desc";

    dbConnect();
    //exit(var_dump($sql));
    $rsc = mysql_query($sql);
    //exit(var_dump($rsc));

    if ($rsc)
        $productRowNum = mysql_result($rsc, 0, 0);

    $sql = "SELECT * FROM product ";
    $sql .= "order by PNum desc";

    $tableInfo['sql'] = $sql;
    $tableInfo['productRowNum'] = $productRowNum;

    //exit(var_dump($tableInfo));

    return $tableInfo;
}

function getProductRowNum($PCategory)
{

    $sql = "SELECT count(*) FROM product ";
    $sql .= "WHERE PCategory like '{$PCategory}' ";
    $sql .= "order by PNum desc";

    dbConnect();
    //exit(var_dump($sql));
    $rsc = mysql_query($sql);
    //exit(var_dump($rsc));

    $productRowNum = mysql_result($rsc, 0, 0);

    $sql = "SELECT * FROM product ";
    $sql .= "WHERE PCategory like '{$PCategory}' ";
    $sql .= "order by PNum desc";

    $tableInfo['sql'] = $sql;
    $tableInfo['productRowNum'] = $productRowNum;

    //exit(var_dump($tableInfo));

    return $tableInfo;
}

function storeProductList($result) // 자른 테이블을 배열에 저장해주는 함수
{
    //exit(var_dump($result));
    $cnt = 0;
    while ($resultArray = mysql_fetch_array($result)) {
        $productArray[$cnt]['0'] = $resultArray['PNum'];
        $productArray[$cnt]['1'] = $resultArray['PCategory'];
        $productArray[$cnt]['2'] = $resultArray['PCode'];
        $productArray[$cnt]['3'] = $resultArray['PName'];
        $productArray[$cnt]['4'] = $resultArray['PStock'];
        $productArray[$cnt]['5'] = $resultArray['PPrice'];
        $productArray[$cnt]['6'] = $resultArray['PImage'];
        $productArray[$cnt++]['7'] = $resultArray['PSImage'];
    }

    //exit(var_dump($rsc));
    //exit(var_dump($productArray));

    return $productArray;
}

function selectProductView($productNum){
    $sql = "SELECT * FROM product ";
    $sql .= "WHERE PNum = '{$productNum}'";
    dbConnect();
    //exit(var_dump($sql));
    //$rsc = mysql_query($sql);
    //exit(var_dump($rsc));

    $result = mysql_query($sql);

    //exit(var_dump($result));

    return $result;
}

?>