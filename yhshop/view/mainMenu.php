<?php
//전체메뉴를 관리해준다.
// 액션값 100번대 userMenu
// 액션값 1000번대 adminMenu
// adminMenu에서 상품관리를 누를 경우 상품메뉴 생성된다.

//나중에 로그인을 할 수 있게 되면 관리자와 유저 상태일 때를 나누어서 관리해줌


if ($MLevel == 99) {
    ?>
    <table width="70%" align="center">
        <tr>
            <td align="left"><?php include "./admin/mainMenu.php" ?></td>
        </tr>
    </table>
    <?php
} else {
    ?>

    <table width="70%" align="center">
        <tr>
            <td align="left"><?php include "./user/mainMenu.php" ?></td>
            <td align="center" width="10%"><?php include "./user/Q&AMenu.php" ?></td>
        </tr>
    </table>

<?php } ?>