Lesson3 それっぽいプログラム - ロバのみみblog -
===================================

ではさっそく**それっぽい**プログラムを書いてみたいと思います。
記事を送信したら表示してくれる。っていう便利プログラムです。

その名も「ロバのみみblog」。

っていうわけで、何を作らないといけないか、考えてみましょう

1. 入力する画面(HTML)
2. 出力結果(HTML)
3. どうやって出力結果を生成するのか(PHP)

今のところ、入力画面には暫定で[input.html](input.html)のようなHTMLを作ってみました。
誰が書いたのか、どんな記事なのか。

そして、出力結果は多分[output.html](output.html)のようなHTMLであればそれっぽい感じです。

というわでPHPでどうやってoutput.htmlのようなHTMLを作るのでしょうか…?

やらないといけないことは多分

1. input.htmlで入力された内容を「送信ボタン」が押されたらPHPがどうにかして理解する
2. PHPでprintを駆使してHTMLを作る

といった内容になると思います。

送信ボタンが押されたらPHPがデータを受け取る
--------------------------------

### どのPHPのプログラムに送信するのか

[input.html](input.html)の中に

```
<form action="blog.php" method="POST">
  <label for="name">お名前</label>
  <input type="text" id="name">
  <label for="article">記事本文</label>
  <text id="article"></text>
  <input type="submit">
</form>
```

と書かれた部分があります。この中の`<form action="**blog.php**"``と書かれた部分が
「送信ボタン」を押した時に入力された情報を受けとるプログラムになります。

あとは`<input type="text" id="name">`のidのところがPHPで受けとる時に「何のデータ」かを
判別する時に判断材料になるものです。今回の例だと「name」という名前のデータとPHPは判断してくれます。
あと`<text id="article"></text>`の部分で「article」という名前のデータをPHPは受けとることができます。

### PHPでデータを受けとる

PHPでデータを受け取るには

```
$_POST['名前']
```

という変数にデータが入っているので、それを使用します。

nameという名前のデータは`$_POST['name']`に、articleという名前のデータは`$_POST['article']`に
入っています。

ということは、そのまま

```
print($_POST['name']);
```

というプログラムを書けばそのまま表示されます。…ということは…

```
print("<!DOCTYPE html>");
print("<html>");
print("  <head>");
print("    <meta name="charset" content="UTF-8">");
print("    <title>ロバのみみblog 表示画面</title>");
print("  </head>");
print("  <body>");
print("    <h1>ロバのみみblog 表示画面</h1>");
print("    <h2>投稿者</h2>");
print("    <p>" . $_POST['name'] ."</p>");
print("    <h2>本文</h2>");
print("    <p>");
print($_POST['article']);
print("    </p>");
print("  </body>");
print("</html>");
```

と書けばOK!です!まずはやってみましょう!