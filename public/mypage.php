<?php
session_start();
require_once "../classes/UserLogic.php";
require_once "../functions.php";

//ログ委員しているか判断し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION["login_err"] = "ユーザー登録をしてログインをしてください";
    header("Location: signup_form.php");
    return;
}

$login_user = $_SESSION["login_user"];

$db = new mysqli('localhost', 'root', 'root', 'みんなの掲示板');
$stmt = $db->prepare('SELECT * FROM hako order by id desc');
$stmt->bind_result($id, $name, $mes, $date);
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="jn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mypage.css">
    <title>マイページ</title>
</head>

<body>
    <header id=head1>
        <h2>みんなの掲示板</h2>
        <ul class="headmain">
            <li class="headmenu"><a href="./mypage.php">HOME</a></li>
            <li class="headmenu"><a href="../post.php">POST</a></li>




        </ul>
    </header>
    <br>
    <h2>プロフィール</h2>
    <p>ログインユーザー：<?php echo h($login_user["name"]) ?></p>
    <p>メールアドレス：<?php echo h($login_user["email"]) ?></p>
    <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="logout">

    </form>
    <br>

    <main>
        <br><br><br>
        <h2>test</h2>
        <?php while ($stmt->fetch()) : ?>
            <p>
                <?php echo $name ?>
                <?php echo $mes ?>
                <?php echo $date ?>
                <hr>
            </p>
        <?php endwhile; ?>
        <p></p>
    </main>

    <footer>
        <br>
        <a href="./mypage.php">
            <h2 class="hedder-logo">TOP</h2>
        </a>
        <p>&copy; 2022/07/30 KEITO YATA</p>
    </footer>


</html>