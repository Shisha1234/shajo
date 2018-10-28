<?php include "header.php"; ?>
		<tr>
<?php include "left_side_bar.php"; ?>
			<td id = "main_content">
			<h4>BLOG VIEWS</h4>
			<span id = "">
				<?php
require_once "connection.php";
$sql_0 = "SELECT articleId, author_fullname, author_image, article_title, article_full_text, article_created_date FROM blog_articles WHERE article_display = 1 ORDER BY article_order DESC";
$result = $conn->query($sql_0);
if ($result->num_rows > 0) {
					// output data of each row
					// Printing the posted data
while($row = $result->fetch_assoc()) {
echo '<h3>'.$row["article_title"].'</h3>';
echo '<h5>Written by : '.$row["author_fullname"].' on '.date("jS F Y", strtotime($row["article_created_date"])).'
<a href = "delete_article.php?articleId='.$row["articleId"].'" onClick = "return confirm(\'Are you sure you want to delete this entry from the database?\')"><img src = "images/icons/delete.jpg" alt = "Delete" width = "20px" title = "Delete '.$row["article_title"].'" /></a>
<a href = "edit_article.php?articleId='.$row["articleId"].'"><img src = "images/icons/edit.png" alt = "Edit" width = "20px" title = "Edit '.$row["article_title"].'" /></a>
</h5>';
echo '<img src = "images/people/'.$row["author_image"].'" width = "80px" height = "90px" />';
echo '<p style = "text-align:justify;">'.$row["article_full_text"].'</p>';
					}
					} else {
					echo "0 results";
					}
					$conn->close();
					echo '<a href = "blog_form.php">Go Back</a>';
				?>
			</span>		
			</td>
		</tr>
<?php include "footer.php"; ?>