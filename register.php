<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" type="text/css" href="./register.css">
</head>
    
<body>
    <header>
        <div class="header-wrapper">
            <!--ボタン部分にはbtnという共通のクラスを与え管理しやすくしている-->
            <!--aタグはデフォルトでインライン要素なので制限がある、そのためdivで囲むことでブロック要素にしてその制限を解除している-->
            <div class="top"><a class="btn" href="register.php">新規登録画面</a></div>
            <div class="logo"><img src="./4eachblog_logo.jpg"></div>
            <div class="login"><a class="btn" href=./login.php>ログイン画面</a></div>
        </div>
    </header>
    
    <main>
        <!--ファイルをアップロードするときは必ずenctype="multipart/form-data"を記述すること、でなければアップロードが機能しない-->
        <!--methodのpostとgetの違いは送信される値がURLに表示されるかどうか、postは表示されない-->
        <form action="register_confirm.php" method="post" enctype="multipart/form-data">
            <div class="form_contents">
                <h2>会員登録</h2>
                <div class="name">
                    <div class="hissu">必須</div><label>氏名</label><br>
                    <!--requiredと記述すると当該フォームを必須入力項目にできる。未入力であれば既定のエラーメッセージを表示する-->
                    <input type="text" class="formbox" size="40" name="name" required>
                </div>
                <div class="mail">
                    <div class="hissu">必須</div><label>メールアドレス</label><br>
                    <!--バリデーションもここで記入する。条件と異なる値を入力するとフォーム画面でエラーメッセージが表示される-->
                    <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="password">
                    <div class="hissu">必須</div><label>パスワード</label><br>
                    <!--後にスクリプトを使用するため、ここでclassの他にidも設定する。classとidの違いは重複可能かどうかであり、idは重複不可-->
                    <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>
                <div class="password">
                    <div class="hissu">必須</div><label>パスワード確認</label><br>
                    <!--パスワード確認欄にも同様にidを設定する。ここで関数を呼び出し、入力された値がpasswordのそれと同一かどうかをチェックする-->
                    <!--oninputは入力時に発生するイベントである。今回はConfirmPasswordという関数を呼び出しており、引数にはこのタグの値を意味するthisを記述-->
                    <input type="password" class="formbox" size="40" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)">
                </div>
                <div class="picture">
                    <label>プロフィール写真</label><br>
                    <!--ファイルのアップロード上限を設定する。ちなみにこの記述ではファイル上限を超えたファイルをアップロードしたとき、警告も失敗した旨も表示されずにアップロードが失敗するだけなので注意-->
                    <!--max_file_sizeは必ずtype="file"の前に置くこと-->
                    <input type="hidden" name="max_file_size" value="1000000"/>
                    <input type="file" name="picture" size="40"/>
                </div>
                <div class="comments">
                    <label>コメント</label><br>
                    <textarea rows="5" cols="45" name="comments"></textarea>
                </div>
                <div class="toroku">
                    <input type="submit" class="submit_button" size="35" value="登録する">
                </div>
            </div>
        </form>
    </main>
    
    <footer>
        <p>copyright © internous | 4each blog the which provides A to Z about programming</p>
    </footer>
    
    <!--JavaScript部分。ConfirmPasswordという関数を作ってパスワードとパスワード確認で入力された値が同一かどうかを比較演算子を用いてチェックする-->
    <script>
        function ConfirmPassword(confirm){
            var input1 = password.value;
            var input2 = confirm.value;
            if(input1 !=input2){
                confirm.setCustomValidity("パスワードが一致しません。");
            } else {
                confirm.setCustomValidity("");
            }
        }
    </script>
</body>

</html>
