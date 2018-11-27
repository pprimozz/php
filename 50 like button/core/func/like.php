<?php

function article_exists($article_id){
    $article_id = (int)$article_id;
    return (mysql_result(mysql_query("SELECT COUNT(article_id) FROM articles WHERE article_id = $article_id "), 0) == 0) ? false: true ;
}

function previously_liked($article_id){
    $article_id = (int)$article_id;
    return (mysql_result(mysql_query("SELECT COUNT(article_id) FROM likes WHERE user_id = ".$_SESSION['user_id']." AND article_id = $article_id"), 0) == 0) ? false: true ;
    
}

function like_count($article_id){
    $article_id = (int)$article_id;
    return (int)mysql_result(mysql_query("SELECT article_likes FROM articles WHERE article_id = $article_id "), 0, 'article_likes');
       
}

function add_like($article_id){
    
    $articlee_id = (int)$article_id;
    mysql_query("UPDATE articles SET article_likes = article_likes + 1 WHERE article_id = $articlee_id");
    mysql_query("INSERT INTO likes (user_id, article_id) VALUES(".$_SESSION['user_id'].", $articlee_id)");
}

function unlike_add($article_id){
	
$query = mysql_query("SELECT article_likes FROM articles WHERE article_id = $article_id ");
while ($rows = mysql_fetch_array($query)){
	
	$result = $rows['article_likes'];
	}
	if ($result>0) {
mysql_query("UPDATE articles SET article_likes = article_likes - 1 WHERE article_id = $article_id");
	} else {}
}

?>