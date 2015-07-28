<?php
class Blog {

  var $dbh;

  function __construct(){
    include_once('config.php');
    // blogの機能は基本的にデータベースを使用するので、コンストラクターでDBに接続しておく
    $this->dbh = new PDO(CONNECTION,DBUSER,DBPASSWORD);
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return true;
  }

  function getArticle($id){
    $query = 'SELECT id,article,author,create_date,update_date FROM articles WHERE id = :id';
    $stmt = $this->dbh->prepare($query);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  function getArticles(){
    $query = 'SELECT id,article,author,create_date,update_date FROM articles';
    $stmt = $this->dbh->prepare($query);
    $stmt->execute();
    // fetchAllを実行すると登録されているすべての情報を配列で返してくれるよ
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  function addArticle($article,$author,$create_date,$update_date){
    $query = 'INSERT INTO articles(article,author,create_date,update_date)
     VALUES (:article,:author,:create_date,:update_date)';
    // SQLが実行可能な状態にしておく
    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':article', $article,PDO::PARAM_STR);
    $stmt->bindParam(':author', $author,PDO::PARAM_STR);
    $stmt->bindParam(':create_date',$create_date ,PDO::PARAM_STR);
    $stmt->bindParam(':update_date',$update_date ,PDO::PARAM_STR);
    // 実 行 ! !
    return $stmt->execute();
  }

  function __destruct(){
    unset($this->dbh);
    return true;
  }
}
