<?php
require_once "connection.php";
if(isset($_POST["record_blog_details"])){
	// Variable declaration
	$author_fullname = htmlspecialchars($_POST["author_fullname"]);
	$article_title = htmlspecialchars($_POST["article_title"]);
	$article_full_text = addslashes($_POST["article_full_text"]);
	$article_display = htmlspecialchars($_POST["article_display"]);
	$article_order = htmlspecialchars($_POST["article_order"]);

	$target = "images/people/";
	$target = $target . basename($_FILES["author_image"]["name"]);
	if(move_uploaded_file($_FILES["author_image"]["tmp_name"], $target)) {
		$author_image = basename( $_FILES["author_image"]["name"]);
		}else {
		$author_image = "default.png";	
		}
	//Query inserting data into the blog_articles table
	$sql = "INSERT INTO blog_articles (author_fullname, article_title, article_full_text, author_image, article_display, article_order, article_created_date, article_last_update)VALUE ('$author_fullname', '$article_title', '$article_full_text', '$author_image', '$article_display', '$article_order', now(), now())";

	//Query to verify new record was created successfully in the blog_articles table
	if ($conn->query($sql) === TRUE) {
		// echo "New record created successfully";
		@header("Location: blog_views.php");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
if(isset($_POST["update_blog_details"])){
	// Variable declaration
	$articleId = htmlspecialchars($_POST["articleId"]);
	$author_fullname = htmlspecialchars($_POST["author_fullname"]);
	$article_title = htmlspecialchars($_POST["article_title"]);
	$article_full_text = addslashes($_POST["article_full_text"]);
	$article_display = htmlspecialchars($_POST["article_display"]);
	$article_order = htmlspecialchars($_POST["article_order"]);
	
	$target = "images/people/";
	$target = $target . basename($_FILES["author_image"]["name"]);
	if(move_uploaded_file($_FILES["author_image"]["tmp_name"], $target)) {
		$author_image = basename( $_FILES["author_image"]["name"]);
		}else {
		$author_image = $_POST["author_photo"];
		}
	//Query updating existing data in the blog_articles table
	$update_sql = "UPDATE blog_articles SET author_fullname = '$author_fullname', article_title = '$article_title', article_full_text = '$article_full_text', author_image = '$author_image', article_display = '$article_display', article_order = '$article_order', article_last_update = now() WHERE articleId = '$articleId' LIMIT 1";
	//Query to verify the record was updated successfully in the blog_articles table
	if ($conn->query($update_sql) === TRUE) {
		// echo "Record updated successfully";
		@header("Location: blog_views.php");
		exit();
	} else {
		echo "Error: " . $update_sql . "<br>" . $conn->error;
	}
}
?>