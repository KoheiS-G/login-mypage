<?php
session_start();
//issetで$_SESSIONにidが格納されていればログイン状態とみなし、マイページにリダイレクトする
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ログイン</title>
    <link rel="stylesheet" type="text/css" href="./login.css">
</head>

<body>
    <header>
        <div class="header-wrapper">
            <div class="register"><a class="btn" href="./register.php">新規登録画面</a></div>
            <div class="logo"><img src="./4eachblog_logo.jpg"></div>
            <div class="login"><a class="btn" href=./login.php>ログイン画面</a></div>
        </div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="container">
                <div class="error">
                    <p>メールアドレスまたはパスワードが間違っています</p>
                </div>
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" name="mail" value="<?php if(isset($_COOKIE['login_keep'])){echo $_COOKIE['mail'];} ?>" required>
                    <!--cookieにメールアドレスが保存されていれば自動入力-->
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="formbox" size="40" name="password" value="<?php if(isset($_COOKIE['login_keep'])){echo $_COOKIE['password'];} ?>" required>
                    <!--cookieにパスワードが保存されていれば自動入力-->
                </div>
                <div class="login_status">
                    <label>
                        <input type="checkbox" class="checkbox" name="login_keep" value="login_keep" <?php if(isset($_COOKIE['login_keep'])){echo "checked='checked'";} ?> >
                        <!--ログイン状態を保持する情報がcookieにあれば自動的にチェックが入る-->
                        <span class="checkbox-parts">ログイン状態を保持する</span>
                    </label>
                </div>
                <div class="submit">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
            </div>
        </form>
    </main>

    <footer>
        <p>copyright © internous | 4each blog the which provides A to Z about programming</p>
    </footer>
</body>

</html>
