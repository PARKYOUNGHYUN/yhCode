<?php //var_dump($memberListArray)?>

    <table width="100%" border="1">
        <tr>
            <th>순번</th>
            <th>ID</th>
            <th>비밀번호</th>
            <th>이름</th>
            <th>전화번호</th>
            <th>주소</th>
            <th>레벨</th>
        </tr>
        <?php
        foreach ($memberListArray as $memberListRow) {
            ?>
            <tr align="center">
                <?php
                foreach ($memberListRow as $memberListKey => $memberListValue) {
                    ?>
                    <td>
                        <?php
                        echo "$memberListValue"
                        ?>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>

<?php
if ($memberListArray) {
// 페이지 네비게이션 모듈
    include_once (dirname(__FILE__)."/../../pageNation.php");
//dirname(__FILE__). : 현재경로를 불러오는 함수`
    $targetAction = $action;

    pageNavigator($getPageInfoNum, $targetAction);
}

?>

