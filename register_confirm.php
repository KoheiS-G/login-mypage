<?php
mb_internal_encoding("utf8");

//$_FILESは定義済みの変数であり、HTTP POSTメソッドで現在のスクリプトにアップロードされた項目の連想配列である。$_FILESにはPOSTメソッドでアップロードされたファイルの情報が含まれており、それらの情報を取り出すこともできる。$_FILES['XXXX']['tmp_name']はその一つであり、アップロードされたファイルがサーバー上で保存されているテンポラリファイルの名前という意味である。XXXXには任意の値が入る、今回ならばファイルをアップロードするフォームにはnameにpictureという値が入っているのでpictureと入力することで、pictureのテンポラリファイルの名前という意味になる。

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名）
$temp_pic_name = $_FILES['picture']['tmp_name'];//tmp_nameはサーバー上で仮保存されたテンポラリファイルの名前

//元のファイル名で画像ファイルを取得。事前に画像を格納する「image」という名前のフォルダを作成しておく必要あり
$original_pic_name = $_FILES['picture']['name'];//nameは元のファイル名
//DBに画像の相対パスを格納することで、出力する際に変数のみの記述で済む
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
//move_uploaded_fileはファイルシステム関数でPHPに標準で搭載されている関数である。アップロードされたファイルを新しい位置に移動する
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>入力確認</title>
    <link rel="stylesheet" type="text/css" href="./register_confirm.css">
</head>

<body>
    <header>
        <img src="./4eachblog_logo.jpg">
    </header>

    <main>
        <div class="confirm-wrapper">
            <div class="confirm">
                <h2>会員登録 確認</h2>
                <p class=para>こちらの内容で登録しても宜しいでしょうか？</p>
                <div class="entry">
                    <p>氏名：<?php echo $_POST['name']; ?></p>
                    <p>メール：<?php echo $_POST['mail']; ?></p>
                    <p>パスワード：<?php echo $_POST['password']; ?></p>
                    <!--画像だけは特殊な方法でpostされているので、アップロードしたファイルの情報が格納されている$_FILESを使う-->
                    <p>プロフィール写真：<?php echo $_FILES['picture']['name']; ?></p>
                    <p>コメント：<?php echo $_POST['comments']; ?></p>
                </div>
                <div class="button-wrapper">
                    <form action="register.php">
                        <input type="submit" class="button return" value="戻って修正する">
                    </form>
                    <form action="register_insert.php" method="post">
                        <input type="submit" class="button insert" value="登録する">
                        <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                        <!--DBに格納したいデータはアップロードされたファイルの相対パスなので、その情報が代入されている$path_filenameと記述する-->
                        <input type="hidden" value="<?php echo $path_filename ?>" name="path_filename">
                        <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>copyright © internous | 4each blog the which provides A to Z about programming</p>
    </footer>
</body>

</html>
