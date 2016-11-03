<?php
include_once "ConnectDB.php";

function insertMember($user_nick, $user_id, $user_pw, $user_name, $user_tel, $user_add){
    dbConnect();

    $query = "INSERT INTO member (user_nick, user_id, user_pw, user_name, user_tel, user_add) ";
    $query .= "VALUES ('{$user_nick}', '{$user_id}', '{$user_pw}', '{$user_name}', '{$user_tel}', '{$user_add}')";

    //exit(var_dump($query));

    $rsc = mysql_query($query); // 쿼리전송

    //exit(var_dump($rsc));
    //mysql_close();
    return $rsc;
}

function loginInfo($MId, $MPw)
{
    // if(□)에서 □가 실행되지 않는 경우
    //1. 값이 null인경우,
    //2. 값이 false인 경우
    //3. !를 사용할 때

    dbConnect();

    $query = "select * from member where user_id='{$MId}'";

    $rsc = (mysql_query($query)); // 쿼리전송
    //exit(var_dump($rsc));
    //$rsc = (mysqli_query(db_connect(), $query)); // 쿼리전송
    $member = mysql_fetch_array($rsc);
//exit(var_dump($member));
    if ($member) {
        $query = "select * from member ";
        $query .= "where user_id='{$MId}' and user_pw='{$MPw}'";
        //exit(var_dump($query)); //쿼리 확인

        $rsc = (mysql_query($query)); // 쿼리전송
        $member = mysql_fetch_array($rsc);

        if ($member) {
            $loginInfo['loginInfo'] = 1;
            $loginInfo['MNick'] = $member['user_nick'];
            $loginInfo['MLevel'] = $member['user_level'];
        } else
            $loginInfo['loginInfo'] = -1;
    } else
        $loginInfo['loginInfo'] = -2;
    //exit(var_dump($loginInfo));

    return $loginInfo;
}

function showMemberList()
{
    $sql = "SELECT * FROM member ";
    $sql .= "where user_level != 99 order by num desc";

    dbConnect();
    //exit(var_dump($sql));
    $rsc = mysql_query($sql);
    //exit(var_dump($rsc));
    $memberRowNum = mysql_num_rows($rsc);

    $tableInfo['sql'] = $sql;
    $tableInfo['memberRowNum'] = $memberRowNum;

    //exit(var_dump($tableInfo));

    return $tableInfo;
}

function storeMemberList($result){
    //exit(var_dump($result));

    $cnt = 0;
    while($resultArray=mysql_fetch_array($result)){
        $memberArray[$cnt]['MNum'] = $resultArray['num'];
        $memberArray[$cnt]['MNick'] = $resultArray['user_nick'];
        $memberArray[$cnt]['MId'] = $resultArray['user_id'];
        $memberArray[$cnt]['MPw'] = $resultArray['user_pw'];
        $memberArray[$cnt]['MName'] = $resultArray['user_name'];
        $memberArray[$cnt]['MTel'] = $resultArray['user_tel'];
        $memberArray[$cnt]['MAdd'] = $resultArray['user_add'];
        $memberArray[$cnt++]['MLevel'] = $resultArray['user_level'];
    }
    //exit(var_dump($memberArray));
    return $memberArray;
}