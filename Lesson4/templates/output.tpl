<!DOCTYPE html>
<html>
  <head>
    <meta name="charset" content="UTF-8">
    <title>にわとりblog 表示画面</title>
  </head>
  <body>
    <h1>にわとりblog 表示画面</h1>
    <h2>投稿者</h2>
    <p>{{name}}</p>
    <h2>投稿日</h2>
    <p>{{create_date}}</p>
    <h2>本文</h2>
    <p>
      {{article|nl2br}}
    </p>
  </body>
</html>
