<?php
include_once "../model/memberHandle.php";

switch ($action) {
    case 89: // 회원가입
        $user_nick = isset($_POST['user_nick']) ? $_POST['user_nick'] : false;
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : false;
        $user_pw = isset($_POST['user_pw']) ? $_POST['user_pw'] : false;
        $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : false;
        $user_tel1 = isset($_POST['user_tel1']) ? $_POST['user_tel1'] : false;
        $user_tel2 = isset($_POST['user_tel2']) ? $_POST['user_tel2'] : false;
        $user_tel3 = isset($_POST['user_tel3']) ? $_POST['user_tel3'] : false;
        $user_tel = $user_tel1 . $user_tel2 . $user_tel3;
        $user_add = isset($_POST['user_add']) ? $_POST['user_add'] : false;

        //exit(var_dump($user_id));
        //var_dump : 배열 안에 들어온 값 확인
        // 들어왔는지 안들어왔는지 확인하는방법 :  exit(var_dump($_POST));

        $rsc = insertMember($user_nick, $user_id, $user_pw, $user_name, $user_tel, $user_add);

        if($rsc) {
            header("location: ./mainCTL.php?action=100");
            exit();
        }
        else
            exit(var_dump($rsc));

        break;

    case 80: // 로그인
//exit();
        $MId = isset($_POST['MId']) ? $_POST['MId'] : null;
        $MPw = isset($_POST['MPw']) ? $_POST['MPw'] : null;
        //exit(var_dump($MId));
        $loginInfo = loginInfo($MId, $MPw);

        $_SESSION['MNick'] = $loginInfo['MNick'];
        $_SESSION['loginInfo'] = $loginInfo['loginInfo'];
        $_SESSION['MLevel'] = $loginInfo['MLevel'];

        if ($_SESSION['loginInfo']) {
            if ($loginInfo['MLevel'] == 99)
                $action = 1000;
            else
                $action = 100;
        }

        header("location: ./mainCTL.php?action=$action");

        exit();
        break;

    case 79 : //로그아웃
        unset($_SESSION['MNick']);
        unset($_SESSION['loginInfo']);
        unset($_SESSION['MLevel']);
        //exit(var_dump($_SESSION));

        $action = 100; // 다시 돌아감

        header("location: ./mainCTL.php?action=$action");

        exit();

        break;

    case 1000 :
        include_once "../model/commonLIB.php";

        $tableInfo = showMemberList(); // 테이블 줄 수 받기

        //exit();
        //echo $action;

        $getPageInfoNum = getPageInfo($tableInfo['memberRowNum'], $nowPage);
        //exit(var_dump($getPageInfoNum));

        $result = limitTable($tableInfo['sql'], $getPageInfoNum['limitFirstNum'], $getPageInfoNum['onePage']);
        $memberListArray=storeMemberList($result);
//exit(var_dump($productArray));

        $_SESSION['getPageInfoNum'] = $getPageInfoNum;
        $_SESSION['memberListArray'] = $memberListArray;
}

?>