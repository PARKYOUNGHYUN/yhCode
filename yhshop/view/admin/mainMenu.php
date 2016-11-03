<?php
$adminMenuNum = intval($action / 1000);
$adminArrayNum = $adminMenuNum-1;

$mainMenuName = array('회원정보관리', '상품관리', '구매관리', '결제관리', '배송관리', '매출관리', '게시판관리');

for ($cnt = 0; $cnt < count($mainMenuName); $cnt++) {
    $codenum = $cnt*1000+1000;

    echo "<a href='../controller/mainCTL.php?action=$codenum' style='text-decoration: none'>";

    if ($adminArrayNum == $cnt)
        echo " [{$mainMenuName[$cnt]}] ";
    else
        echo " {$mainMenuName[$cnt]} ";
}


?>