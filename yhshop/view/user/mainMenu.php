<table width="100%">
    <tr>
        <td>카테고리</td>
        <td><?php
            $userMainMenuName = array('아우터', '상의', '셔츠/블라우스', '데님/팬츠', '치마/원피스', '가방', '신발/양말');
            //exit(var_dump($userMainMenuNum));

            $userMenuArrayNum = $userMainMenuNum - 1;

            for ($cnt = 0; $cnt < count($userMainMenuName); $cnt++) {
                $codeNum = $cnt * 100 + 100;

                if ($userMenuArrayNum == $cnt) {
                    echo "<a href='../controller/mainCTL.php?action={$codeNum}' style='text-decoration: none'>";
                    echo " [{$userMainMenuName[$cnt]}] ";
                    echo "</a>";
                } else {
                    echo "<a href='../controller/mainCTL.php?action={$codeNum}' style='text-decoration: none'>";
                    echo " {$userMainMenuName[$cnt]} ";
                    echo "</a>";
                }
            }

            ?></td>
    </tr>
</table>
