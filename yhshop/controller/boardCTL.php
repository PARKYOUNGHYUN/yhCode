<?php
include_once "../model/boardHandle.php";
include_once "../model/commonLIB.php";
//exit();
$BNum = isset($_REQUEST['BNum']) ? $_REQUEST['BNum'] : 2;
$contents = isset($_POST['contents']) ? $_POST['contents'] : false;
//exit(var_dump($BNum));
switch ($action) {
    case 910 :

        $boaderListArray = findBoard($BNum);
        $tableInfo = showCommentList($BNum);

        //$getPageInfoNum = getPageInfo($tableInfo['commentRowNum'], $nowPage);
        //exit(var_dump($getPageInfoNum));

        //$result = limitTable($tableInfo['sql'], $getPageInfoNum['limitFirstNum'], $getPageInfoNum['onePage']);
        //exit(var_dump($result));
        $commentListArray = storeCommentList($tableInfo['rsc']);
//exit(var_dump($commentListArray));

        $_SESSION['getPageInfoNum'] = $getPageInfoNum;
        $_SESSION['commentListArray'] = $commentListArray;
//exit(var_dump($boaderListArray));
        $_SESSION['boaderArray'] = $boaderListArray;

        //exit();

        break;

    case 920 :
        $MNick = $_SESSION['MNick'];

        $contents = isset($_POST['contents']) ? $_POST['contents'] : false;

        insertComment($BNum, $MNick, $contents);

        $tableInfo = showCommentList($BNum);

        //$getPageInfoNum = getPageInfo($tableInfo['commentRowNum'], $nowPage);
        //exit(var_dump($getPageInfoNum));

        //$result = limitTable($tableInfo['sql'], $getPageInfoNum['limitFirstNum'], $getPageInfoNum['onePage']);
        //exit(var_dump($result));
        $commentListArray = storeCommentList($tableInfo['rsc']);
//exit(var_dump($commentListArray));

        $_SESSION['getPageInfoNum'] = $getPageInfoNum;
        $_SESSION['commentListArray'] = $commentListArray;

        header("location: ./mainCTL.php?action=910");
        //exit(var_dump($commentListArray));
        exit();
        //


        break;

    case 980 :
        $MNick = $_SESSION['MNick'];

        $BTitle = isset($_POST['BTitle']) ? $_POST['BTitle'] : false;
        $BContent = isset($_POST['BContent']) ? $_POST['BContent'] : false;

        insertWriting($MNick, $BTitle, $BContent);

        header("location: ./mainCTL.php?action=900");
        exit();

        break;

    //exit(var_dump($rsc));

    default :
        $tableInfo = showBoardList();

        if ($tableInfo['boaderRowNum'] != 0) {
            $getPageInfoNum = getPageInfo($tableInfo['boaderRowNum'], $nowPage);
            //exit(var_dump($getPageInfoNum));

            $result = limitTable($tableInfo['sql'], $getPageInfoNum['limitFirstNum'], $getPageInfoNum['onePage']);
            //exit(var_dump($result));
            $boaderListArray = storeBoardList($result);
//exit(var_dump($result));

            $_SESSION['getPageInfoNum'] = $getPageInfoNum;
            $_SESSION['boaderListArray'] = $boaderListArray;
            $_SESSION['boaderRowNum'] = $tableInfo['boaderRowNum'];

            //exit(var_dump($tableInfo));
        }
}
