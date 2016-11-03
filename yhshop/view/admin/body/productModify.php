상품정보입력
<?php var_dump($productInfo) ?>
<table align="center" width="80%" border="1">
    <form action="../controller/mainCTL.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>카테고리</td>
            <td><?php echo $productInfo['PCategory']; ?></option>
            </td>
        </tr>
        <tr>
            <td>상품코드</td>
            <td><?php echo $productInfo['PCode']; ?></td>
        </tr>
        <tr>
            <td>상품명</td>
            <td><input type="text" name="PName" value="<?php echo $productInfo['PName']; ?>"></td>
        </tr>
        <tr>
            <td>재고량</td>
            <td><input type="text" name="PStock" value="<?php echo $productInfo['PStock']; ?>"></td>
        </tr>
        <tr>
            <td>상품가격</td>
            <td><input type="text" name="PPrice" value="<?php echo $productInfo['PPrice']; ?>"></td>
        </tr>
        <tr>
            <td>대표이미지</td>
            <td><input type="file" name="PImage"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="등록">
                <input type="hidden" name="action" value="2020">
            </td>
        </tr>
    </form>
</table>