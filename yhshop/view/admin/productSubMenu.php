<?php
$productSubNum = intval($action/10)%$userMainMenuNum;
$productArraySubNum=$userMainMenuNum-21;
//var_dump($productArraySubNum);
$productSubMenuName = array(
    array('가디건/집업', '자켓/코트', '점퍼/야상'),
    array('니트/조끼', '후드/맨투맨', '티셔츠'),
    array('셔츠', '블라우스'),
    array('슬랙스', '스키니', '숏팬츠', '데님팬츠'),
    array('스커트', '원피스'),
    array('백팩', '숄더백', '클러치/지갑'),
    array('단화/스니커즈/로퍼', '통쿱/워커', '샌들/슬리퍼', '양말'),
    array('모자', '시계', '안경', '벨트', '목도리', '쥬얼리')
);

$countNum=count($productSubMenuName[$productArraySubNum]);

for($cnt=0; $cnt<$countNum; $cnt++){
    $codenum = $userMainMenuNum*100 + $cnt*10 + 10;

    echo "<a href='../controller/mainCTL.php?action=$codenum' style='text-decoration: none'>";

    if ($productSubNum == $cnt+1)
        echo " [{$productSubMenuName[$productArraySubNum][$cnt]}] ";
    // ==echo " [".$subMenuName[$arrayNum][$cnt]."] ";

    //. 으로 연결
    else
        echo " {$productSubMenuName[$productArraySubNum][$cnt]} ";
    echo "</a>";
}

?>