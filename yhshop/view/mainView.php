<?php
include "./header.php";

//style="border:solid 2px #CCCCCC"
//표 테이블 색깔줄때

?>

<html>
<body>
<table border="1" width="100%" height="35%">
    <tr height="13%">
        <td><?php include "./login.php" ?></td>
        <td width="15%"><?php include "./search.php" ?></td>
    </tr>
    <tr height="70%" align="center">
        <td colspan="2"><?php include "./title.php" ?></td>
    </tr>
    <tr>
        <td width="85%" colspan="2"><?php include "mainMenu.php" ?></td>
    </tr>
</table>

<!-- 서브메뉴는 게시판 작성,회원가입, 회원가입완료, 관리자, 상품보기를 누를 때 보이지 않음 -->
<?php
if ($action != 900 && intval($action / 9) != 10 && $userMainMenuNum !=29 && intval($action/100)!=8) {
    ?>
    <table border="1" width="80%" height="25%" align="center">
    <?php if ($action < 900) { ?>
        <tr height="60%" align="center">
            <td><?php echo "$userMainMenuName[$userMenuArrayNum]"; ?></td>
        </tr>
        <tr align="center">
            <td><?php include "./user/subMenu.php" ?></td>
        </tr>
        </table>
    <?php } elseif (intval($action / 1000) == 2) { ?>
        <table border="1" width="80%" height="10%" align="center">
            <tr align="center" style="vertical-align: top">
                <td><?php include "./admin/productMenu.php" ?></td>
            </tr>
        </table>
    <?php } ?>
    <table border="1" width="80%" height="45" align="center">
        <tr align="right">
            <td colspan="2"><?php include "range.php" ?></td>
        </tr>
    </table>
    <?php
}
?>

<table border="1" width="80%"align="center">
    <tr style="vertical-align: top">
        <td colspan="2"><?php include "mainBody.php" ?></td>
    </tr>
    <tr height="10%">
        <td colspan="2"><?php include "Copyright.php" ?></td>
    </tr>
</table>
</body>
</html>