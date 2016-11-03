<?php //var_dump($productListArray[0][6]) ?>
<table border="1" width="100%">
    <tr align="center">
        <td rowspan="3" width="500"><?php echo"<img src='../img/PImage/{$productListArray[0][6]}' width=500 height='350'>"; ?></td>
        <td>상품명</td><td><?php echo "{$productListArray[0][3]}"; ?></td>
    </tr>
    <tr align="center">
        <td>가격</td><td><?php echo "{$productListArray[0][5]}"; ?></td>
    </tr>
    <tr align="center">
        <td>재고량</td><td><?php echo"{$productListArray[0][4]}"; ?></td>
    </tr>
</table>
