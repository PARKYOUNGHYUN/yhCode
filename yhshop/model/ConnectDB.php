<?php
define("ADDR", "localhost");
define("conID", "root");
define("conPW", "1234");
define("dbName", "project");

// DB선택은 꼭 해주어야한다!
function dbConnect()
{
    mysql_connect(ADDR, conID, conPW);
    //exit(var_dump($result));
    mysql_query("set names utf8");
    //exit($result);
    mysql_select_db(dbName);
}

?>