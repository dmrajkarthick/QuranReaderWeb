<?php
	$conn = db_connection();
	$result = getAllBookDetails($conn);
	$conn = null;

	echo '<div class="row">';
	foreach ($result as $key => $value) {
   		
   		$image_loc = './media/'.$value['BookName'].'.jpg';
   		$book_image_tag = '<img class="bookimg" src="'.$image_loc.'" alt="'.$value['BookName'].'" name="'.$value['DispEnglish'].'"/>';
   		
   		echo '<div id="book_col" class="col-md-3">'.$book_image_tag;
   		echo '<br/>';
   		echo $value['DispEnglish'];
   		echo '</div>';
		//print_r($value['BookName']);
	}
	echo '</div>';
	
?>