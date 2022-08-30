<?php


if (isset($_POST['personal_name'])) {
    $name = $_POST['personal_name'];
}
if (isset($_POST["contents"])) {
    $text = $_POST["contents"];
}
$db = new mysqli('localhost', 'root', 'root', 'みんなの掲示板');
$stmt = $db->prepare('INSERT INTO hako (name, mes) VALUES (?, ?)');
$stmt->bind_param('ss', $name, $text);
$stmt->execute();


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css">
    <title>Document</title>
</head>

<body>
    <header id=head1>
        <h2>みんなの掲示板</h2>
        <ul class="headmain">
            <li class="headmenu"><a href="./public/mypage.php">HOME</a></li>
            <li class="headmenu"><a href="./post.php">POST</a></li>
        </ul>
    </header>
    <br><br><br><br>
    <main id=postmain>
        <form method="POST" action="">
            <label>NAME</label>
            <input required type="text" name="personal_name"><br><br>
            <label>CONTENTS</label><textarea name="contents" rows="8" cols="40" required>
            </textarea><br><br>

            <input type="submit" name="btn1" value="POST">
        </form>


    </main>
</body>

</html>