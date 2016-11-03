<?php //var_dump($productListArray);
//var_dump($getPageInfoNum["onePage"]);
?>
    <table border="1" width="100%" height="100%">
        <?php
        $row = intval(count($productListArray)/5)*3;
        $x = 0;
        //exit();
        for ($i = 1; $i <= $row; $i++) {
            echo "<tr align='center'>";
            for ($j = $x; $j < $x + 5; $j++) {
                if ($i % 3 == 1)
                    echo "<td height='200'>
                          <a href='../controller/mainCTL.php?action=800&productNum={$productListArray[$j][0]}' style='text-decoration: none'>
                          <img src='../img/PSImage/{$productListArray[$j][7]}'></a></td>";
                //echo "<td height='200'><img src='../img/PSImage/P_2015-12-12_P10056.jpg'></td>";

                else if ($i % 3 == 2)
                    echo "<th height='30'>
                          <a href='../controller/mainCTL.php?action=800&productNum={$productListArray[$j][0]}' style='text-decoration: none'>
                          {$productListArray[$j][3]}</a></th>";

                else if ($i % 3 == 0)
                    echo "<td height='30'>
                          <a href='../controller/mainCTL.php?action=800&productNum={$productListArray[$j][0]}' style='text-decoration: none'>
                          {$productListArray[$j][5]}</a></td>";
            }
            echo "</tr>";

            if ($i % 3 == 0)
                $x += 5;
            //echo"$x";
        }
        ?>
    </table>
<?php
if ($productListArray) {
// 페이지 네비게이션 모듈
    include_once(dirname(__FILE__) . "/../../pageNation.php");
//dirname(__FILE__). : 현재경로를 불러오는 함수
    $targetAction = $action;

    pageNavigator($getPageInfoNum, $targetAction);
}

?>