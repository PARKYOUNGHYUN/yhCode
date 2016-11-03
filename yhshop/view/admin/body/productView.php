<?php //var_dump($productListArray) ?>

    <table width="100%" border="1">
        <tr height="40">
            <td colspan="10"><a href="../controller/mainCTL.php?action=2900" methods='post'
                                style='text-decoration: none'>
                    상품정보입력</a></td>
        </tr>
        <tr>
            <th>순번</th>
            <th>카테고리</th>
            <th>상품코드</th>
            <th>상품명</th>
            <th>재고량</th>
            <th>가격</th>
            <th>대표이미지</th>
            <th>썸네일 이미지</th>
            <th>수정</th>
            <th>삭제</th>
        </tr>
        <?php
        $cnt = 0;
        foreach ($productListArray as $productListRow) {
            ?>
            <tr align="center">
                <?php
                foreach ($productListRow as $productListKey => $productListValue) {
                    ?>
                    <td>
                        <?php
                        echo "$productListValue"
                        ?>
                    </td>
                    <?php
                }
                ?>
                <td><a href='../controller/mainCTL.php?action=2010&PNum=<?php echo $productListArray[$cnt]['0']; ?>'
                       methods='post' style='text-decoration: none'>●</a></td>
                <td><a href='../controller/mainCTL.php?action=2030&PNum=<?php echo $productListArray[$cnt]['0']; ?>'
                       methods='post' style='text-decoration: none'>●</a></td>
            </tr>
            <?php
            $cnt++;
        }
        ?>
    </table>

<?php
if ($productListArray) {
// 페이지 네비게이션 모듈
    include_once(dirname(__FILE__) . "/../../pageNation.php");
//dirname(__FILE__). : 현재경로를 불러오는 함수`
    $targetAction = $action;

    pageNavigator($getPageInfoNum, $targetAction);
}

?>