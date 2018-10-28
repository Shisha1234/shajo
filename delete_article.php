<?php
require_once "connection.php";
if (isset($_GET["articleId"])){
$articleId = $_GET["articleId"];

$del_art = "DELETE FROM blog_articles WHERE articleId = '$articleId' LIMIT 1";
	
	if ($conn->query($del_art) === TRUE) {
		// echo "New record created successfully";
		@header("Location: blog_views.php");
		exit();
	}
}
?>