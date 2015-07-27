<!DOCTYPE html>
<html>
  <head>
    <meta name="charset" content="UTF-8">
    <title>にわとりblog 確認画面</title>
  </head>
  <body>
    <h1>にわとりblog 確認画面</h1>
    <h2>投稿者</h2>
    <p>{{name}}</p>
    <h2>本文</h2>
    <p>
      {{article|nl2br}}
    </p>
    で、投稿しますがよろしいですか?
    <form action="add.php" method="POST">
	     <input type="submit" value="はい">
       <input type="button" value="前の画面に戻る" onClick="history.back()">
    </form>
  </body>
</html>
