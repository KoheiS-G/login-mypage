<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//mypage.php以外からのアクセスはすべてlogin_error.phpにリダイレクト
if(empty($_POST['from_mypage'])){
    header('Location:login_error.php');
}
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>マイページ編集</title>
    <link rel="stylesheet" type="text/css" href="./mypage.css">
</head>

<body>
    <header>
        <div class="header-wrapper">
            <div class="top"><a class="btn" href="register.php">新規登録画面</a></div>
            <div class="logo"><img src="./4eachblog_logo.jpg"></div>
            <div class="log-out"><a class="btn" href="./log_out.php">ログアウト</a></div>
        </div>
    </header>

    <main>
        <div class="mypage-wrapper">
            <div class="container">
                <h2>会員情報</h2>
                <div class="gleeting">
                    <?php echo "こんにちは！　".$_SESSION['name']."さん" ?>
                </div>
                <div class="profile-container">
                    <div class="profile_pic">
                        <img src="<?php echo $_SESSION['picture'] ?>">
                    </div>
                    <div class="status">
                        <div class="info">
                            <p>氏名：<input type="text" class="formbox" name="name" value="<?php echo $_SESSION['name'] ?>" form="form-form"></p>
                        </div>
                        <div class="info">
                            <p>メールアドレス：<input type="text" class="formbox" name="mail" value="<?php echo $_SESSION['mail'] ?>" form="form-form"></p>
                        </div>
                        <div class="info">
                            <p>パスワード：<input type="text" class="formbox" name="password" value="<?php echo $_SESSION['password'] ?>" form="form-form"></p>
                        </div>
                    </div>
                </div>
                <div class="comments">
                    <textarea rows="5" name="comments" form="form-form"><?php echo $_SESSION['comments'] ?></textarea>
                </div>
                <div class="edit">
                    <input type="submit" class="btn" href="./mypage_update.php" value="この内容に変更する" form="form-form">
                </div>
                <form id="form-form" action="mypage_update.php" method="post"></form>
            </div>
        </div>
    </main>

    <footer>
        <p>copyright © internous | 4each blog the which provides A to Z about programming</p>
    </footer>
</body>

</html>
