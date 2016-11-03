<?php
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 100;

$userMainMenuNum = intval($action / 100);
$userSubMenuNum = intval($action % 100);


session_start();

$loginInfo=isset($_SESSION['loginInfo']) ? $_SESSION['loginInfo'] : null;
$MNick=isset($_SESSION['MNick']) ? $_SESSION['MNick'] : null;
$MLevel=isset($_SESSION['MLevel']) ? $_SESSION['MLevel'] : null;
// 로그인

$getPageInfoNum = $_SESSION['getPageInfoNum'];

$productListArray = isset($_SESSION['productListArray']) ? $_SESSION['productListArray'] : null;
$productInfo = isset($_SESSION['productInfo']) ? $_SESSION['productInfo'] : null;

$memberListArray = isset($_SESSION['memberListArray']) ? $_SESSION['memberListArray'] : null;

$boaderListArray = isset($_SESSION['boaderListArray']) ? $_SESSION['boaderListArray'] : null;
$boaderArray = isset($_SESSION['boaderArray']) ? $_SESSION['boaderArray'] : null;
$boaderRowNum = isset($_SESSION['boaderRowNum']) ? $_SESSION['boaderRowNum'] : null;

$commentListArray = isset($_SESSION['commentListArray']) ? $_SESSION['commentListArray'] : null;


//exit(var_dump($getPageInfoNum))

?>