<?php
$userSubMenuName = array(
    array('가디건/집업', '자켓/코트', '점퍼/야상'),
    array('니트/조끼', '후드/맨투맨', '티셔츠'),
    array('셔츠', '블라우스'),
    array('슬랙스', '스키니', '숏팬츠', '데님팬츠'),
    array('스커트', '원피스'),
    array('백팩', '숄더백', '클러치/지갑'),
    array('단화/스니커즈/로퍼', '통쿱/워커', '샌들/슬리퍼', '양말'),
);

for ($cnt = 0; $cnt < count($userSubMenuName[$userMenuArrayNum]); $cnt++) {
    $codeNum = $userMainMenuNum * 100 + $cnt * 10 + 10;

    if ($userSubMenuNum == $cnt * 10 + 10) {
        echo "<a href='../controller/mainCTL.php?action={$codeNum}' style='text-decoration: none'>";
        echo " [{$userSubMenuName[$userMenuArrayNum][$cnt]}] ";
        echo "</a>";
    }
    else {
        echo "<a href='../controller/mainCTL.php?action={$codeNum}' style='text-decoration: none'>";
        echo " {$userSubMenuName[$userMenuArrayNum][$cnt]} ";
        echo "</a>";
    }
}

?>