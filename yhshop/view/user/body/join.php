<table border="1" width="100%" height="30%">
    <form action="../controller/mainCTL.php" method="POST">
        <tr>
            <td align="center">닉네임</td>
            <td><input type="text" name="user_nick"></td>
        </tr>
        <tr>
            <td align="center">아이디</td>
            <td><input type="text" name="user_id"> 띄어쓰기 없이 영/숫자 6~10자</td>
        </tr>
        <tr>
            <td align="center">비밀번호</td>
            <td><input type="password" name="user_pw"> 띄어쓰기 없이 영/숫자 6~15자</td>
        </tr>
        <tr>
            <td align="center">이름</td>
            <td><input type="text" name="user_name"></td>
        </tr>
        <tr>
            <td align="center">휴대전화</td>
            <td><select name="user_tel1">
                    <option>선택</option>
                    <option value="noSelect">없음</option>
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="017">017</option>
                </select> -
                <input type="text" size="4" name="user_tel2" maxlength="4"> -
                <input type="text" size="4" name="user_tel3" maxlength="4"></td>
        </tr>
        <tr>
            <td align="center">주소</td>
            <td><input type="text" name="user_add" size="70"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="등록">
                <input type="hidden" name="action" value="89">
            </td>
        </tr>
    </form>
</table>
