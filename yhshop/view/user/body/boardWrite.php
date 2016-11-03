<table border="1" width="100%" height="30%">
    <form action="../controller/mainCTL.php" method="POST">
        <tr>
            <td align="center">제목</td>
            <td><input type="text" name="BTitle" style="width:500px;"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><textarea cols="135" rows="50" name="BContent"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="작성완료">
                <input type="hidden" name="action" value="980">
            </td>
        </tr>
    </form>
</table>
