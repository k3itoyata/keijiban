<?php
session_start();
require_once "../classes/UserLogic.php";

if (!$logout = filter_input(INPUT_POST, "logout")) {
    exit("不正なアクセスです");
}

//ログ委員しているか判断し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = UserLogic::checkLogin();

if (!$result) {
    exit("セッションが切れましたので、ログインし直してください");
}

//ログアウトをする
UserLogic::logout();

?>
<!DOCTYPE html>
<html lang="jn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logout.css">
    <title>ログアウト</title>
</head>

<body>
    <h2>ログアウト完了</h2>
    <p>ログアウトしました！</p>
    <a href="login_form.php">ログイン画面へ</a>
</body>

</html>