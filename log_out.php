<?php

session_start();
//すべてのセッションを削除することでログアウト機能になる
session_destroy();

header("Location:login.php");

?>