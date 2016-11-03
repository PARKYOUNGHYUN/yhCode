<?php
function pageNavigator($getPageInfoNum, $targetAction){
    // 페이징 표시 부분

    //$pageInfo = isset($_SESSION['pageInfo'])?$_SESSION['pageInfo']:null;

    echo "<table width='300' align='center'><tr>";

    // 처음페이지 이동
    echo "<td width='30'>";
    if($getPageInfoNum['nowPage'] == 1)
        echo "△";
    else
        echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage=1'>▲</a>";

    echo "</td>";


    // 이전 블럭으로 이동
    echo "<td width='30'>";
    if($getPageInfoNum['nowBlock'] == 1){
        echo "◇";
    }else{
        $getPageInfoNum['preNowBlock']=$getPageInfoNum['startBlock']-$getPageInfoNum['oneBlock'];
        echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$getPageInfoNum['preNowBlock']}'>◆</a>";
    }
    echo "</td>";

    // 이전 페이지 이동
    echo "<td width='30'>";
    if($getPageInfoNum['nowPage'] == 1){
        echo "◁";
    }else{
        $prePageNum = $getPageInfoNum['nowPage']-1;
        echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$prePageNum}'>◀</a>";
    }
    echo "</td>";

    //현재 블럭의 페이지 표시
    for( $cnt = $getPageInfoNum['startBlock']; $cnt <= $getPageInfoNum['lastBlock']; $cnt++ ){
        echo "<td width='30'>";
        if( $cnt == $getPageInfoNum['nowPage'])
            echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$cnt}' style='text-decoration: none'>[{$cnt}]</a>";
        else
            echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$cnt}' style='text-decoration: none'>{$cnt}</a>";
        echo "</td>";
    }

    // 다음 페이지 이동
    echo "<td width='30'>";
    if($getPageInfoNum['nowPage'] == $getPageInfoNum['pageNum']){
        echo "▷";
    }else{
        $nextPageNum = $getPageInfoNum['nowPage']+1;
        echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$nextPageNum}'>▶</a>";
    }
    echo "</td>";

    // 다음 블럭으로 이동
    echo "<td width='30'>";
    if($getPageInfoNum['nowBlock'] == $getPageInfoNum['blockNum']){
        echo "◇";
    }else{
        $getPageInfoNum['nextBlock']=$getPageInfoNum['startBlock']+$getPageInfoNum['oneBlock'];
        echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$getPageInfoNum['nextBlock']}'>◆</a>";
    }
    echo "</td>";

    // 마지막 페이지 이동
    echo "<td width='30'>";
    if($getPageInfoNum['nowPage'] == $getPageInfoNum['pageNum']){
        echo "▽";
    }else{
        echo "<a href='../controller/MainCTL.php?action={$targetAction}&nowPage={$getPageInfoNum['pageNum']}'>▼</a>";
    }
    echo "</td>";

    echo "</tr></table>";

    //echo "<hr/>";
    //var_dump($pageInfo);



}

?>