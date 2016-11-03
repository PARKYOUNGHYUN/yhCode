<?php
//var_dump($boaderListArray);
//var_dump($commentListArray);

    //var_dump($MNick);
//var_dump($commentListArray["CNum"]) ?>

<table border="1" width="100%">
    <tr height="30">
        <td>제목 : <?php echo "{$boaderArray['subject']}"; ?></td>
        <td align="right">작성일 : <?php echo "{$boaderArray['regist_day']}"; ?></td>
    </tr>
    <tr height="30">
        <td>작성자 : <?php echo "{$boaderArray['nick']}"; ?></td>
        <td align="center">조회수 : <?php echo "{$boaderArray['hit']}"; ?></td>
    </tr>
    <tr>
        <td colspan="2">내용</td>
    </tr>
    <tr height="1000" valign="top">
        <td colspan="2"><?php echo "{$boaderArray['content']}"; ?></td>
    </tr>
    <?php
    if ($commentListArray) {
        for ($i = 0; $i < count($commentListArray); $i++) {
            echo "<tr height='30'><td>작성자 : {$commentListArray[$i]['MNick']}</td>
                              <td>작성일 : {$commentListArray[$i]['CDate']}</td></tr>";
            echo "<tr height='80'><td colspan='2'>{$commentListArray[$i]['Contents']}</td></tr>";

            if($commentListArray[$i]['MNick'] == $MNick)
                echo"<td colspan='2' align='right'>
                     <a href='../controller/mainCTL.php?action=2010&PNum='
                     methods='post' style='text-decoration: none'>↑삭제</a></td>";
        }

        //include_once(dirname(__FILE__) . "/../../pageNation.php");
//dirname(__FILE__). : 현재경로를 불러오는 함수`
        //$targetAction = $action;

        //pageNavigator($getPageInfoNum, $targetAction);

    }
    ?>
    <tr>
        <form action="../controller/mainCTL.php" method="POST">
            <td><textarea cols="100" rows="5" name="contents"></textarea></td>
            <td>
                <button type="submit" style="height: 70px; width: 100px;">확인</button>
                <input type="hidden" name="action" value="920">
                <input type="hidden" name="BNum" value="<?php echo "{$boaderArray['num']}"; ?>">
            </td>
        </form>
    </tr>
</table>
