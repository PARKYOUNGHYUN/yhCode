상품정보입력

<table align="center" width="80%" border="1">
    <form action="../controller/mainCTL.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>카테고리</td>
            <td><select name="PCategory">
                    <option>선택</option>
                    <option value="O1">가디건/집업(O1)</option>
                    <option value="O2">자켓/코트(O2)</option>
                    <option value="O3">점퍼/야상(O3)</option>
                    <option value="T1">니트/조끼(T1)</option>
                    <option value="T2">후드/맨투맨(T2)</option>
                    <option value="T3">티셔츠(T3)</option>
                    <option value="B1">셔츠(B1)</option>
                    <option value="B2">블라우스(B2)</option>
                    <option value="P1">슬랙스(P1)</option>
                    <option value="P2">스키니(P2)</option>
                    <option value="P3">숏팬츠(P3)</option>
                    <option value="P4">데님팬츠(P4)</option>
                    <option value="S1">스커트(S1)</option>
                    <option value="S2">원피스(S2)</option>
                    <option value="B1">백팩(B1)</option>
                    <option value="B2">숄더백(B2)</option>
                    <option value="B3">클러치/지갑(B3)</option>
                    <option value="F1">단화/스니커즈/로퍼(F1)</option>
                    <option value="F2">통쿱/워커(F2)</option>
                    <option value="F3">샌들/슬리퍼(F3)</option>
                    <option value="F4">양말(F4)</option>
            </td>
        </tr>
        <tr>
            <td>상품코드</td>
            <td><input type="text" name="PCode"  placeholder="카테고리+번호"></td>
        </tr>
        <tr>
            <td>상품명</td>
            <td><input type="text" name="PName"></td>
        </tr>
        <tr>
            <td>재고량</td>
            <td><input type="text" name="PStock"></td>
        </tr>
        <tr>
            <td>상품가격</td>
            <td><input type="text" name="PPrice"></td>
        </tr>
        <tr>
            <td>대표이미지</td>
            <td><input type="file" name="PImage" value="찾아보기"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="등록">
                <input type="hidden" name="action" value="2910">
            </td>
        </tr>
    </form>
</table>