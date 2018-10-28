<?php
require_once "connection.php";
if (isset($_GET["articleId"])){
$articleId = $_GET["articleId"];
$spot_articleid = "SELECT author_fullname, article_title, article_full_text, author_image, article_display, article_order FROM blog_articles WHERE articleId = '$articleId' LIMIT 1";
$result_articleid = $conn->query($spot_articleid);
$row_articleid = $result_articleid->fetch_assoc();
?>
<?php include "header.php"; ?>
		<tr>
<?php include "left_side_bar.php"; ?>
			<td id = "main_content">
			<h4>EDIT BLOG FORM</h4>
			<span id = "">
				<form action = "process_blog_details.php" method = "POST" enctype = "multipart/form-data" >
					<label>Full Name : <span style = "color: #ff0000;">&#42;</span></label><br />
					<input type = "text" class = "input_width" name = "author_fullname" value = "<?php echo $row_articleid["author_fullname"];?>" required = "" autofocus /><br />
					<label>Article Title : <span style = "color: #ff0000;">&#42;</span></label><br />
					<input type = "text" class = "input_width" name = "article_title" value = "<?php echo $row_articleid["article_title"];?>" required = "" /><br />
					<label>Author Photo : </label><br />
					<input type = "file" class = "input_width" name = "author_image" /><br />
					<label>Full Text Article : <span style = "color: #ff0000;">&#42;</span></label><br />
					<textarea name = "article_full_text" cols = "60" rows = "5" required = "" ><?php echo $row_articleid["article_full_text"]; ?></textarea><br />
					<label>Display Article : <span style = "color: #ff0000;">&#42;</span></label><br />
					<input type = "radio" name = "article_display" <?php if ($row_articleid["article_display"] == "1") {echo "checked"; } ?> value = "1" />Yes
					<input type = "radio" name = "article_display" <?php if ($row_articleid["article_display"] == "0") {echo "checked"; } ?>value = "0" />No
					<br />
					<label>Arrangement Order Article : <span style = "color: #ff0000;">&#42;</span></label><br />
					<select class = "input_width" name = "article_order">
						<option value = "<?php echo $row_articleid["article_order"]; ?>"><?php echo $row_articleid["article_order"]; ?></option>
						<?php						
						$spot_last_id = "SELECT COUNT(articleId) AS max_order FROM blog_articles" ;
						$spot_last_id_result = $conn->query($spot_last_id);
						$spot_last_id_row = $spot_last_id_result->fetch_assoc();
						$next_order = $spot_last_id_row["max_order"];
						for($co = 1; $co<=$next_order; $co++){
						$cont_order = '<option value = "'.$co.'">'.$co.'</option>';
						echo $cont_order;
						}
						?>
					</select>
					<br /><br />
					<input type = "reset" value = "Clear All" />
					<input type = "submit" name = "update_blog_details" value = "Update Details" />
					<input type = "hidden" name = "articleId" value = "<?php echo $articleId; ?>" />
					<input type = "hidden" name = "author_photo" value = "<?php echo $row_articleid["author_image"]; ?>" />
				</form>	
			</span>		
			</td>
		</tr>
<?php include "footer.php"; ?>
<?php
}
?>
