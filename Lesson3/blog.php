<?php
print("<!DOCTYPE html>");
print("<html>");
print("<head>");
print("<meta name="charset" content="UTF-8">");
print("<title>ロバのみみblog 表示画面</title>");
print("</head>");
print("<body>");
print("<h1>ロバのみみblog 表示画面</h1>");
print("<h2>投稿者</h2>");
print("<p>" . $_POST['name'] ."</p>");
print("<h2>本文</h2>");
print("<p>");
print($_POST['article']);
print("</p>");
print("</body>");
print("</html>");
