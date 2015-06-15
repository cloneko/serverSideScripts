Lesson2 とりあえず書いてみるよ
===================================

PHPのお約束
-----------------------------------

PHPのプログラムを書く時には必ず1行目に`<?php`を書く必要があります。

1行目に`<?php`と書いてあることで、「このファイルはPHPのコードが書かれてるんだー」って
コンピューターが判断するために記述します。おまじないだと思ってください。

ちなみに教科書の88ページには「?>」で終わると書いてあります。
昔のPHPは必ず「?>」で終わる必要がありましたが、最近のPHPの開発においては
必要がなければ「?>」を書かないことのほうが多いので、省略しています。

途中で書いてある内容をそのまま表示したい!ということがたまにあるので
その時には「?>」を使用します。


ただ単に何かを表示するだけの簡単なプログラム
-----------------------------------

よくある**Hello world**って奴です。

```
<?php
print("なんとかかんとか");
```

printという命令(正しく言うと関数)を使用することで「なんとかかんとか」って表示してくれます。
また、命令の最後には「**;**」を書いてあげることで、**1つの命令の終わりですよ!**っていう意味になります。

`print("なんとかかんとか");`を2回書くと2回表示されます。

PHPの場合は

```
print("なんとかかんとか");print("なんとかかんとか");
```

と同じ行に書いても

```
print("なんとかかんとか");
print("なんとかかんとか");
```

と別の行に分けて書いても大丈夫です。
もちろん10回同じ命令をしたければ10回書けば10回実行してくれます。100回なら100回です。

難しく考えず、書いたら書いただけ実行してくれる。っていうのがプログラムの
基本的な考え方です。

もちろん楽するための方法は用意されていますが、今のところはこんな感じで。

### 課題1 自分の好きな言葉を出力してみよう

**なんとかかんとか**の部分を書き換えて自分の好きな「食べ物」の名前を出力してみよう。

それができたら、printを2回使って好きな「食べ物」と「飲み物」の名前を出力してみよう。


文字を扱う
-----------------------------------

PHPにおいては**文字**を扱いたい場合、**""**か**''**でくくってあげる必要があります。

最初のうちは""でくくるようにしておいたほうがいいと思います。


変数というハコ
-----------------------------------

プログラムではよく「変数」というものを使います。
これは何かというと、*一時的にデータを格納しておくハコ*とよく説明されます。

よく使われる例でいえば

```
<?php
print("なんとかかんとか");
print("なんとかかんとか");
```

の「なんとかかんとか」を別の文字(今回は「ほげほげ」)にしたいって思った時に

```
<?php
print("ほげほげ");
print("ほげほげ");
```

って書き換えばいいのですが、この「なんとかかんとか」っていう部分が100箇所とか10000箇所とか
あったらそれ全部漏れなく書き換えるのは多分大変です。

その時に変数っていうのを使うと便利です。変数の名前は必ず「$」から始めます。
また、$の次の文字は必ずアルファベットか_(アンダースコア)から始めないといけないルール
になっています。

```
<?php
$moji = "なんとかかんとか";
print($moji);
print($moji);
```

とやると$mojiの中に入っている文字を表示してくれます。
これから$mojiの中に文字を入れるところを直すだけで何回でも同じ内容を表示してくれるようになります。

四則演算(足し算・引き算・かけ算・割り算)
-----------------------------------


|日本語|小学校で習った書き方|PHPの場合|
|:----:|:------------------:|:-------:|
|足し算| + | + |
|引き算| - | - |
|かけ算| × | * |
|割り算| ÷ | / |

なので

```
<?php
print(1 + 1);
```

をすると`2`が表示されます。

```
<?php
print(1 * 1);
```

だと`1`が表示されます。

また変数に計算結果を入れておくこともできます。

```
<?php
$result = 1 + 1;
print($result);
```

とやっても大丈夫です。

また、小学校でも勉強しましたが、四則演算には優先順位があり、かけ算・割り算が
優先され、足し算・引き算よりあとに計算されます。
先に足し算・引き算を計算したい場合は**()**でくくってあげてください。



文字をくっつける
-----------------------------------

1という文字と1という文字を足し算すると…当然?2になります。
(これはPHPだからなので、PHP以外のプログラミング言語でもそうなるとは限りません)

たとえば

```
<?php
print("1" + "1");
```
を実行すると「2」が表示されます。文字と文字を足してるんだから「11」にしてほしい!と
思うかもしれません。(え?思わないし、そもそも文字と文字を足し算とか何いってるんだって??)

PHPでは文字と文字をくっつける時には「.」を使います。なので11と表示したい場合は

```
<?php
print("1" . "1");
```

とすると「11」と表示されるようになります。

このような計算の優先順位は
[PHPの公式サイトの「演算子の優先順位」のページ](http://php.net/manual/ja/language.operators.precedence.php)
に書かれてますが…ちょっと見辛い…

コメント
-----------------------------------

さっき書いた

```
<?php
$result = 1 + 1;
print($result);
```

ってコードですが、これくらいのものなら何やってるかすぐわかりますが、
どんどん複雑なプログラムを書いていくと、何やってんのかさっぱりわからないコードを
書いていくことがあります。

そんな時に、このコードは何をやっているんだ!っていうのを**人間がわかるように**説明を
書いてあげると親切です(自分にとっても、他の人にとっても)。
そこで「コメント」という機能をつかいます。

```
<?php
$result = 1 + 1; // ここは1+1をやっている
print($result);  // 計算結果を表示している
```

という風に`//`から右側の部分はプログラムとしては無視され、何を書いても大丈夫ということになっています。

`//`ではなく`#`で書くこともできます。

```
<?php
$result = 1 + 1; // ここは1+1をやっている
# print($result);  // 計算結果を表示している
// print($result);  // 計算結果を表示している
```
とやると、計算はするが、表示はしない。というプログラムになります。

また、特定の範囲をまとめてコメントする時に行の始めに全部`#`から始めるのは
めんどくさいという方のために`/*`から始まり`*/`で終わるところまで全部コメントという書き方も
あります。

```
<?php
$result = 1 + 1; // ここは1+1をやっている
/*
print($result);  // 計算結果を表示している
print($result);  // 計算結果を表示している
print($result);  // 計算結果を表示している
*/
```

とすれば大丈夫です。でも、見た目的に
```
<?php
$result = 1 + 1; // ここは1+1をやっている
/*
 * ここから先は自分で考えてみてね。
 * ヒントはちょっと前にやった「print」っていう奴だよ!
 * がんばってね!
 */
```

のように書く人が多いです。

まとめ
------------------------------------

これだけのことを理解していれば最低限のプログラムを書くことができます。
いろいろ便利な書き方や覚えないといけないことはたくさんありますが、まずこの

* 表示
* 変数(と、変数にデータを格納する代入の`=`)
* 四則演算とか文字結合のための演算子
* コメント

の4つについてしっかり使いこなしましょう(この辺は「見りゃわかるよ!」ですって。失礼しました…)