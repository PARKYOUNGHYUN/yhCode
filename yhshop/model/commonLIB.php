<?php
function getPageInfo($productRowNum, $nowPage){
    //exit(var_dump($nowPage));
    $getNum['productRowNum'] = $productRowNum;
    $getNum['nowPage'] = $nowPage;
    $getNum['onePage'] = 20;
    //5의 배수로 지정
    $getNum['oneBlock'] = 10;

    $getNum['pageNum'] = ceil($getNum['productRowNum']/$getNum['onePage']);
    $getNum['blockNum'] = ceil($getNum['pageNum']/$getNum['oneBlock']);
    $getNum['nowBlock'] = ceil($getNum['nowPage']/$getNum['oneBlock']);

    $getNum['startBlock'] = ($getNum['nowBlock']-1) * $getNum['oneBlock'] +1;
    $getNum['lastBlock'] = $getNum['startBlock'] + $getNum['oneBlock'] -1;

    if($getNum['lastBlock']>=$getNum['pageNum'])
        $getNum['lastBlock']=$getNum['pageNum'];

    $getNum['limitFirstNum'] = ($getNum['nowPage']-1) * $getNum['onePage'] ;
    //exit(var_dump($getNum));
    return $getNum;
}

function limitTable($sql, $limitFirstNum, $onePage) // 테이블을 잘라서 리턴해주는 함수
{
    $sql .= " limit {$limitFirstNum}, {$onePage}";

//exit(var_dump($sql));
$result = mysql_query($sql);

//exit(var_dump($result));
//exit(var_dump($productArray));
mysql_close();
return $result;
}
?>