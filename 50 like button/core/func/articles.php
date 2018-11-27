<?php

function get_articles() {
    
    $articles = array();
    
    $query = mysql_query("SELECT article_id, article_title, article_likes FROM articles");
    while ($row = mysql_fetch_assoc($query)) {
        
        $articles[] = array(
        
        'article_id' => $row['article_id'],
        'article_title' => $row['article_title'],
        'article_likes' => $row['article_likes']
        );
      }
      
      return $articles;
}

?>