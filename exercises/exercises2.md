課題
====================

下記条件を満たす画像を投稿できる掲示板を作りなさい。


1つの投稿に対して1つの画像を載せれるようにすること。

投稿には
* (多分必要になると思われる)投稿ID(AIでいいよ)
* 投稿者名
* 画像
* 投稿者コメント
* 投稿日
* 削除用パスワード
の情報を保持しておくこと。

また、この投稿にコメントができるようにすること。
(コメントは複数人から複数のコメントが行なえるようにすること)

コメントは下記の内容を保持すること
* コメントID
* どの投稿IDかを識別する情報
* 投稿者名
* コメント
* 投稿日

表示するページ
---------------------------

下記の内容を表示するページを作ること

* 記事一覧
  * タイトル
  * 投稿者名
  * 投稿日
* 記事投稿画面
* 投稿された記事をそれぞれ表示する奴
  * タイトル・投稿者名・投稿日・投稿された画像
  * コメント(全部)
  * この画面でコメントできるように
  * パスワード入れたら削除できるのもここ

制作条件&評価基準
================================

作り方により評価が変動します。

### 動作環境による評価基準

下記の順番で高得点になります。

1. CakePHPを使用して作成
2. Twig/クラス化して作成
3. その他(この課題の点数としては半分も無いです)

提出期限は2015年8月25日23:59まで。

提出方法はgithubにアップするか、zipファイルにして送ること。
その際にCREATE TABLEした内容がわかるような情報を含めること。
(例のごとく、データベースのパスワードがわかるようにはしないでください)

提出期限を過ぎても受け取りますが減点します(遅れれば遅れるほど減点されます)
