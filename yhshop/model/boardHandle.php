<?php
include_once "ConnectDB.php";

function insertWriting($MNick, $BTitle, $BContent)
{
    dbConnect();

    $query = "INSERT INTO greet (nick, subject, content, regist_day) ";
    $query .= "VALUES ('{$MNick}', '{$BTitle}', '{$BContent}', now())";

    //exit(var_dump($query));

    $rsc = mysql_query($query); // 쿼리전송

    //exit(var_dump($rsc));
    //mysql_close();
    //return $rsc;
}

function insertComment($BNum, $MNick, $contents)
{
    dbConnect();

    $query = "INSERT INTO comment (BNum, MNick, Contents, CDate) ";
    $query .= "VALUES ('{$BNum}', '{$MNick}', '{$contents}', now())";

    //exit(var_dump($query));

    $rsc = mysql_query($query); // 쿼리전송

    // exit(var_dump($rsc));
    //exit(var_dump($rsc));
    //mysql_close();
    //return $rsc;
}

function showCommentList($BNum)
{
    //exit(var_dump($BNum));
    $sql = "SELECT count(*) FROM comment ";
    $sql .= "where BNum = {$BNum} ";
    $sql .= "order by CNum desc";

    dbConnect();
    //exit(var_dump($sql));
    $rsc = mysql_query($sql);
    //exit(var_dump($rsc));

    if ($rsc)
        $commentRowNum = mysql_result($rsc, 0, 0);
    else
        $commentRowNum = 0;

    $sql = "SELECT * FROM comment ";
    $rsc = mysql_query($sql);

    //$sql .= "order by CNum desc";

    $tableInfo['sql'] = $sql;
    $tableInfo['commentRowNum'] = $commentRowNum;
    $tableInfo['rsc'] = $rsc;

    //exit(var_dump($tableInfo));

    return $tableInfo;
}

function storeCommentList($result)
{
    //exit(var_dump($result));

    $cnt = 0;
    while ($resultArray = mysql_fetch_array($result)) {
        $commentArray[$cnt]['CNum'] = $resultArray['CNum'];
        $commentArray[$cnt]['BNum'] = $resultArray['BNum'];
        $commentArray[$cnt]['MNick'] = $resultArray['MNick'];
        $commentArray[$cnt]['Contents'] = $resultArray['Contents'];
        $commentArray[$cnt++]['CDate'] = $resultArray['CDate'];
    }

//exit(var_dump($rsc;
//exit(var_dump($commentArray));

    return $commentArray;
}

function findBoard($BNum)
{
    dbConnect();

    $sql = "update greet set hit=hit+1 ";
    $sql .= "where num = {$BNum}";

    //exit(var_dump($sql));

    mysql_query($sql);

    $sql = "SELECT * FROM greet ";
    $sql .= "where num = {$BNum}";

    //exit(var_dump($sql));
    $rsc = mysql_query($sql);

    $boardArray = mysql_fetch_array($rsc);

    //exit(var_dump($boardArray));
    return $boardArray;
}

function showBoardList()
{
    $sql = "SELECT count(*) FROM greet ";
    $sql .= "order by num desc";

    dbConnect();
    //exit(var_dump($sql));
    $rsc = mysql_query($sql);
    //exit(var_dump($rsc));

    if ($rsc)
        $productRowNum = mysql_result($rsc, 0, 0);
    else
        $productRowNum = 0;

    $sql = "SELECT * FROM greet ";
    $sql .= "order by num desc";

    $tableInfo['sql'] = $sql;
    $tableInfo['boaderRowNum'] = $productRowNum;

    //exit(var_dump($tableInfo));

    return $tableInfo;
}

function storeBoardList($result)
{
    //exit(var_dump($result));
    $cnt = 0;
    while ($resultArray = mysql_fetch_array($result)) {
        $boardArray[$cnt]['num'] = $resultArray['num'];
        $boardArray[$cnt]['id'] = $resultArray['id'];
        $boardArray[$cnt]['name'] = $resultArray['name'];
        $boardArray[$cnt]['nick'] = $resultArray['nick'];
        $boardArray[$cnt]['subject'] = $resultArray['subject'];
        $boardArray[$cnt]['content'] = $resultArray['content'];
        $boardArray[$cnt]['regist_day'] = $resultArray['regist_day'];
        $boardArray[$cnt]['hit'] = $resultArray['hit'];
        $boardArray[$cnt++]['is_html'] = $resultArray['is_html'];
    }

    //exit(var_dump($rsc));
    //exit(var_dump($boardArray));

    return $boardArray;
}