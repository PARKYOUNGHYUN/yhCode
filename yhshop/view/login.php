<?php

//var_dump($loginInfo);

if ($loginInfo == 1) {
echo $MNick?>님 안녕하세요
    <a href="../controller/MainCTL.php?action=79" method="POST">
    <input type='submit' value='로그아웃' name='logout'></a>

<?php if ($MLevel != 99) { ?>
    <input type='submit' value='정보수정' name='info_correction'>
    <input type='submit' value='장바구니' name='cart'>
<?php
}} else{
?>
    <table>
        <tr>
            <form action="../controller/mainCTL.php?action=80" method="post">
                <td>아이디 <input type="text" name="MId">
                    패스워드 <input type="password" name="MPw">
                    <input type="submit" value="로그인">
                </td>
                <td>
                    <a href="../controller/mainCTL.php?action=90" methods='post' style='text-decoration: none'>
                        아직 회원이 아니신가요?</a>
                </td>
            </form>
        </tr>
    </table>
<?php
}

if ($loginInfo == -1)
    echo "비밀번호가 틀렸습니다.";
else if ($loginInfo == -2)
    echo "존재하지않는 회원입니다.";
?>