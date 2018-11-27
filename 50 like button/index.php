<?php
include 'core/init.php';

?>

<!doctype html>
<head>
    <title>Article</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<a href="index.php?stran=db" >Database OOP connect</a>

<div id="db">
<?php
if (isset ($_GET['stran'])){
	
	$stran = $_GET['stran'];
	include_once($stran.'.php');
	}
?>
</div>

<?php



$articles = get_articles();
if (count($articles) == 0) {
    echo 'Sorry, there are no articles!';
    
} else {
    
        echo '<ul>';
    foreach($articles as $article) {
		if($article['article_likes']== 0){
			$article['article_likes']=0;
			}
        
        echo '<li><p><div id="text">',$article['article_title'] ,'</div></p><p><a class="like" href="#" onclick="like_add(',$article['article_id'],');">Like</a> <span id="article_',$article['article_id'],'_likes">',$article['article_likes'],'</span> people like this <a class="unlike" href="#" onclick="unlike_add('.$article['article_id'].');">Unlike</a></p></li>';
    }
    echo '</ul>';
    
}

?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/like.js"></script>


</body>
</html>