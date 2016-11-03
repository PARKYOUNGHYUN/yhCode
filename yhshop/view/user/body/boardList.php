<?php
//var_dump($boaderListArray)?>

    <table width="100%" border="1">
        <tr>
            <td colspan="5">총 <?php echo "$boaderRowNum"; ?>개의 게시물이 있습니다.</td>
        </tr>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
            <th>조회</th>
        </tr>
        <?php
        for ($i = 0; $i < count($boaderListArray); $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                if ($j == 0)
                    echo "<td align='center'>{$boaderListArray[$i]['num']}</td>";
                elseif ($j == 1)
                    echo "<td align='center'><a href='../controller/mainCTL.php?action=910&BNum={$boaderListArray[$i]['num']}'>
                                {$boaderListArray[$i]['subject']}</a></td>";
                elseif ($j == 2)
                    echo "<td align='center'>{$boaderListArray[$i]['nick']}</td>";
                elseif ($j == 3)
                    echo "<td align='center'>{$boaderListArray[$i]['regist_day']}</td>";
                else
                    echo "<td align='center'>{$boaderListArray[$i]['hit']}</td>";
            }
            echo "</tr>";
        }
        //var_dump($loginInfo);
        if ($loginInfo == 1) {
            ?>
            <tr>
                <td colspan="5"><a href='../controller/mainCTL.php?action=990'>글쓰기</a></td>
            </tr>
            <?php
        }
        ?>
    </table>

<?php
if ($boaderListArray) {
// 페이지 네비게이션 모듈
    include_once(dirname(__FILE__) . "/../../pageNation.php");
//dirname(__FILE__). : 현재경로를 불러오는 함수`
    $targetAction = $action;

    pageNavigator($getPageInfoNum, $targetAction);
}

?>