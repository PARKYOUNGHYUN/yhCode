<?php
session_start();
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 100;
$nowPage = isset($_REQUEST['nowPage']) ? $_REQUEST['nowPage'] : 1;
//exit(var_dump($BNum));

//상품테이블을 사용하는 액션들
//사용자 액션일 때 & 관리자상태에서 상품관리할 때
if(intval($action/1000)==2 || intval($action/100)<=8)
    //exit($action);
    include "./productCTL.php";

if($action<90 || $action==1000)
    include "./memberCTL.php";


if(intval($action/100)==9)
    include "./boardCTL.php";

//exit(var_dump($action));
header("location: ../view/mainView.php?action=$action");
?>