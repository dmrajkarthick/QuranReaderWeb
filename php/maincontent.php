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
	$submenu_key = $query['submenu'];
	$conn = db_connection();
	$result = getAllMainPageContent($conn, $table_name, $submenu_key);
	$conn = null;


	echo '<h3 align="center">'.$submenu_key.'</h3>';
	$sub_topic_title = "";
	foreach ($result as $key => $value) {

		if ($sub_topic_title != $value['SubTopicTitle']){
			$sub_topic_title = $value['SubTopicTitle'];
			echo '<div class="row">
		        <!-- Card Projects -->
		        <div class="col-md-8 col-md-offset-2">
		            <div class="card">
		                <div class="card-content">
		                    <b><p class="card-text">'.$value['SubTopicTitle'].'</p></b>
		                    <br>
				    		<b><p class="card-text">'.$value['SubTopicTitleTamil'].'</p></b>
		                </div>
		            </div>
		        </div>
		    </div>';
		}

		echo '<div class="row">
		        <!-- Card Projects -->
		        <div class="col-md-8 col-md-offset-2">
		            <div class="card">
		                <div class="card-action">
		                  	<a href="#" data-toggle="tooltip" title="Share"><span class="glyphicon glyphicon-share-alt"></span></a>
		                  	<a href="#" data-toggle="tooltip" title="Copy to Clipboard!"><span class="glyphicon glyphicon-copy"></span></a>
		                </div>
		                <hr>
		                <div class="card-content">
		                    <p class="tamil-card-text">'.$value['ContentTamil'].'</p>
		                    <br>
		                    <br>
				    		<p class="english-card-text">'.$value['ContentEnglish'].'</p>
				    		<hr>
				    		<p class="ref-card-text" id="reference_text"><b>Reference:</b> '.$value['Reference'].'</p>
		                </div>
		            </div>
		        </div>
		    </div>';
	}

?>
</div>

</body>
</html>
