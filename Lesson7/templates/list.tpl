<!DOCTYPE html>
<html>
  <head>
    <meta name="charset" content="UTF-8">
    <title>にわとりblog 記事一覧</title>
  </head>
  <body>
    <header>
      <h1>にわとりblog 記事一覧</h1>
    </header>
    <table>
      <thead>
        <tr>
          <th>作成日</th><th>内容</th><th>リンク</th>
        </tr>
      </thead>
      <tbody>
        {% for article in articles %}
        <tr>
          <td>{{article.create_date}}</td>
          <td>{{article.article}}</td>
          <td><a href="view.php?id={{article.id}}">リンク</a><td>
        </tr>
        {% endfor %}
      </tbody>
    </table>
  </body>
</html>
