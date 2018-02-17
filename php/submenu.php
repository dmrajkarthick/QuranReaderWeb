<?php
	include './header.php';
	include './dboperations.php';	
	include '../util/constants.php';
?>
<div class="container">
<?php 
	
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$parts = parse_url($url);
	parse_str($parts['query'], $query);

	$table_name = $book_table_name_map[$query['bookid']];
	$conn = db_connection();
	$result = getAllSubmenuItems($conn, $table_name);
	$conn = null;

	foreach ($result as $key => $value) {
		$submenu_tag = '<button bookid="'.$query['bookid'].'" type="button" class="btn btn-default btn-lg btn-block submenu_button" >'.$value['MainTitle'].'</button>';
		echo '<div class="row" >'.$submenu_tag;
   		echo '</div>';
   	}
?>
</div>

</body>
</html>
