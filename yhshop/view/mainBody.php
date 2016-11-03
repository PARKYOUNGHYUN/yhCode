<?php
if ($MLevel == 99) {
    if (intval($action / 1000) == 2) {
        if ($action == 2900) // 상품등록
            include "./admin/body/productInsert.php";
        elseif ($action == 2020) // 상품등록
            include "./admin/body/productModify.php";
        else
            include "./admin/body/productView.php";
    } elseif (intval($action / 1000) == 1) {
        include "./admin/body/memberView.php";
    }

} else {
//상품이미지 보여줄 때
//한페이지로 보여주는 것이 가능하다.
    if ($action >= 100 && $action <= 740) // 상품보여주기
        include "./user/body/productListView.php";

    else if ($action == 900) //qna 게시판
        include "./user/body/boardList.php";

    elseif ($action == 910)
        include "./user/body/boardView.php";

    elseif ($action == 990)
        include "./user/body/boardWrite.php";

    elseif ($action == 90 || $action == 89) // 회원가입 회원가입 완료
        include "user/body/join.php";

    elseif ($action == 800)
        include "./user/body/productView.php";
}
?>