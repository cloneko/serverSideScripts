めんどくさいことを簡単に書こう
========================

これまで書いてきた中でいくつかめんどくさいことがあると思います。

特にLesson4の[view.php](../Lesson4/view.php)と[add.php](../Lesson4/add.php)で
データベースの設定やTwigの設定をそれぞれ書かないといけないあたりは
めんどくさいことの筆頭です。

2つならまだいいですが、3つ、4つ…と増えていくと編集し忘れなどのミスも起きるし
いいことがありません。できれば一箇所にまとめて書ければうれしい…と思いませんか?

require_onceを使おう
-----------------------

ここで同じ表記であれば別のファイルに書いておいてそれを読み込むことで
同じコードを書かなくてすむrequire_onceの出番です。

[view.php](../Lesson4/view.php)と[add.php](../Lesson4/add.php)で共通の

```php
<?php
require '../lib/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register(); // Twigを使う時のおまじない
$loader = new Twig_Loader_Filesystem('./templates'); // Twigで使用するテンプレートファイルを格納する場所

// Twigの設定
$twig = new Twig_Environment($loader, array(
    'cache' => 'cache'
));

// データを追加してみる…前にデータベースの設定いろいろやる。
// 教科書だと159ページ参照
$host = 'localhost';
$dbname = 'blog';
$charset = 'utf8';
$user = 'root';
$password = '';
$driver = 'mysql';
$connection = sprintf("%s:host=%s;dbname=%s;charset=%s",$driver,$host,$dbname,$charset);
$dbh = new PDO($connection,$user,$password);
// エラーが起きたら例外を投げる…
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

を[config.php](config.php)という別のファイルに書いておきます。

あとはadd.phpとview.phpに書いてあった上記の部分を消して

```php
require_once 'config.php';
```

と書くと、コードがすっきりします。

|Lesson4|Lesson5|
|-------|-------|
|[add.php](../Lesson4/add.php)|[add.php](../Lesson5/add.php)|
|[view.php](../Lesson4/view.php)|[view.php](../Lesson5/view.php)|
|-------|[config.php](../Lesson5/config.php)|

どっちが見やすいですか?

また、データベースの設定をgithubとかにpushしておきたくない時とかにconfig.phpだけを
.gitignoreに追加しておくと、プログラムはgithubで管理できるけど、データベースとかの設定は
githubに置かなくて済むといったメリットもあります。

複数のデータをTwigで一気に表示する
------------------------------------

今のところ一つのblogの記事を一つの画面で表示する。っていうことしかしていませんが、
blogの場合、記事を書いていけば、記事は一つではなくなります。

そういった場合、「記事の一覧」ってのがほしくなりますが、一つひとつデータを取ってきて
あったら表示、なかったら表示しない。ってことをやるのもめんどくさいです。

なので「ある分だけ表示の処理をする」っていう方法を使います。

[view.php](view.php)ではidを指定して1つの記事だけを取得していますが、
idの指定をしなければ登録されているblogの記事すべてが取得できるようになります。

また、`$stmt->fetch`だと1つのデータしか取得できませんでしたが、
`$stmt->fetchAll`にするとデータが複数ある場合は複数のデータがまとまった状態で
取得することができます。

実際に[list.php](list.php)を実行してみると登録された記事がすべて表示されています。

var_dumpを使用してデータが取得できていることを確認したら、Twigを使用して表示してみます。

Twigで「何回も」同じ方法で表示する時の書き方はちょっと特殊です。

[list.php](list.php)で、

```php
print($twig->render('list.tpl',array('articles'=>$data)));
```

と、articlesというところに配列に入ったデータを直接入れてます。
実際に表示する時にはその中から「id」「article」「create_date」などを分解してあげないといけません。

その時にこのようにかきます。

```
{% for article in articles %}
<tr>
  <td>{{article.create_date}}</td>
  <td>{{article.article}}</td>
  <td><a href="#">リンク</a><td>
</tr>
{% endfor %}
```

一行目の`{% for article in articles %}`はarticlesの中がからっぽになるまで、
articleという名前で下の処理(`{% endfor %}`まで)を行ないなさい。という意味です。

articleの中には「id」「article」「create_date」が入っているのでそれを表示しなさい。
という意味になります。

なお、このやり方自体は教科書の174ページにforeachとechoを使用する方法で書かれていますが
テンプレートエンジン(Twig)を使用したほう効率もいいので是非こちらのやり方で覚えてください。

ここまで確認できたら再度input.htmlから記事を入力して、list.phpにアクセスし、
記事が増えていっていることを確認しましょう。

### 課題1

今の状態では「リンク」のところをクリックしても何もしないようになっています。
view.phpにリンクして、クリックした記事が表示されるようにテンプレートを書いてみてください。

### 課題2

現時点でのlist.tplはテーブルになっていますが、それを`<ul><li></ul>`を使ったものに書き換えなさい。
