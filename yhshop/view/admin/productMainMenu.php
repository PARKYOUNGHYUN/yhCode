<?php
$productMenuName = array('아우터', '상의', '셔츠/블라우스', '데님/팬츠', '치마/원피스', '가방', '신발/양말', '액세서리');

$countNum=count($productMenuName);

for($cnt=0; $cnt<$countNum; $cnt++){
    $codenum = 2000 + $cnt*100 + 100;

    echo "<a href='../controller/mainCTL.php?action=$codenum' style='text-decoration: none'>";

    if ($userMainMenuNum == $cnt+21)
        echo " [{$productMenuName[$cnt]}] ";
    else
        echo " {$productMenuName[$cnt]} ";
    echo "</a>";
}
?>